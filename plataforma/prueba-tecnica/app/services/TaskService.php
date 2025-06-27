<?php

class TaskService implements ITaskService
{
    private $taskRepository;

    public function __construct(ITaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function getTasksByUser($userId, $filters = [], $sort): array | null
    {
        $result = $this->taskRepository->getTasksByUserId($userId, $filters, $sort);

        return $result;
    }

    public function createTask($data): bool
    {
        $result = $this->taskRepository->add($data);

        if ($result !== -1 && isset($_FILES['files'])) {
            $this->handleFileUploads($result, $_FILES['files']);
        }

        return $result !== -1;
    }

    public function updateTask($taskId, $data): bool
    {
        $result = $this->taskRepository->update($taskId, $data);

        if ($result && isset($_FILES['files'])) {
            $this->handleFileUploads($taskId, $_FILES['files']);
        } else if (!$result) {
            throw new Exception("Error al actualizar la tarea", 500);
        }

        return $result;
    }

    public function deleteTask($taskId): bool
    {
        return $this->taskRepository->delete($taskId);
    }

    private function handleFileUploads($taskId, $files)
    {
        $uploadDir = __DIR__ . '/../../public/uploads/';
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'application/pdf', 'text/plain', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];

        for ($i = 0; $i < count($files['name']); $i++) {
            if ($files['error'][$i] === UPLOAD_ERR_OK) {
                $fileName = $files['name'][$i];
                $fileType = $files['type'][$i];
                $fileTmpName = $files['tmp_name'][$i];

                if (!in_array($fileType, $allowedTypes)) {
                    continue;
                }

                $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
                $uniqueFileName = uniqid() . '_' . time() . '.' . $fileExtension;
                $filePath = $uploadDir . $uniqueFileName;

                if (move_uploaded_file($fileTmpName, $filePath)) {
                    $relativePath = 'public/uploads/' . $uniqueFileName;
                    $this->taskRepository->addFile($taskId, $relativePath);
                }
            }
        }
    }
}
