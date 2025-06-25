<?php

class TaskController extends Controller
{
    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function create()
    {
        // transaction
        $this->conn->beginTransaction();

        try {
            $userId = $_SESSION['user_id'];
            $title = $_POST['task_title'];
            $description = $_POST['task_description'];
            $dueDate = $_POST['task_due_date'];
            $priority = $_POST['task_priority'];

            $sql = "INSERT INTO tasks (task_user_id, task_title, task_description, task_due_date, task_priority) VALUES (:user_id, :title, :description, :due_date, :priority)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':due_date', $dueDate);
            $stmt->bindParam(':priority', $priority);

            if ($stmt->execute()) {
                $taskId = $this->conn->lastInsertId();

                if (isset($_FILES['files']) && !empty($_FILES['files']['name'][0])) {
                    $this->handleFileUploads($taskId, $_FILES['files']);
                }

                $this->conn->commit();
                header("Location: /page/dashboard/?success=taskCreated");
            }
        } catch (PDOException $e) {
            $this->conn->rollBack();
            header("Location: /page/dashboard/?error=taskCreationFailed");
        }
    }

    public function update()
    {
        $taskId = $_POST['task_id'];
        $title = $_POST['task_title'];
        $description = $_POST['task_description'];
        $dueDate = $_POST['task_due_date'];
        $priority = $_POST['task_priority'];

        $sql = "UPDATE tasks SET task_title = :title, task_description = :description, task_due_date = :due_date, task_priority = :priority WHERE task_id = :task_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':task_id', $taskId);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':due_date', $dueDate);
        $stmt->bindParam(':priority', $priority);

        if ($stmt->execute()) {
            if (isset($_FILES['files']) && !empty($_FILES['files']['name'][0])) {
                $this->handleFileUploads($taskId, $_FILES['files']);
            }

            header("Location: /page/dashboard/?success=taskUpdated");
        } else {
            header("Location: /page/dashboard/?error=taskUpdateFailed");
        }
    }

    public function delete()
    {
        $taskId = $_POST['task_id'];

        $this->deleteFiles($taskId);

        $sql = "DELETE FROM tasks WHERE task_id = :task_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':task_id', $taskId);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            header("Location: /page/dashboard/?success=taskDeleted");
        } else {
            header("Location: /page/dashboard/?error=taskDeletionFailed");
        }
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
                    $sql = "INSERT INTO files (file_task_id, file_path) VALUES (:task_id, :file_path)";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bindParam(':task_id', $taskId);
                    $stmt->bindParam(':file_path', $relativePath);
                    $stmt->execute();
                }
            }
        }
    }

    private function deleteFiles($taskId)
    {
        $sql = "SELECT file_path FROM files WHERE file_task_id = :task_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':task_id', $taskId);
        $stmt->execute();

        $files = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($files as $file) {
            $filePath = __DIR__ . '/../../public/' . $file['file_path'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $sql = "DELETE FROM files WHERE file_task_id = :task_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':task_id', $taskId);
        $stmt->execute();
    }

    public function getTasksByUser($userId, $filters = [], $sort)
    {
        $sql = "SELECT t.*, GROUP_CONCAT(f.file_path) as files 
                FROM tasks t 
                LEFT JOIN files f ON t.task_id = f.file_task_id 
                WHERE t.task_user_id = :user_id";

        $params = [':user_id' => $userId];

        // Apply filters
        if (!empty($filters['priority'])) {
            $sql .= " AND t.task_priority = :priority";
            $params[':priority'] = $filters['priority'];
        }

        if (!empty($filters['status'])) {
            switch ($filters['status']) {
                case 'completed':
                    $sql .= " AND t.task_completed = 1";
                    break;
                case 'pending':
                    $sql .= " AND t.task_completed = 0 AND t.task_due_date >= CURDATE()";
                    break;
                case 'overdue':
                    $sql .= " AND t.task_completed = 0 AND t.task_due_date < CURDATE()";
                    break;
            }
        }

        if (!empty($filters['search'])) {
            $sql .= " AND (t.task_title LIKE :search OR t.task_description LIKE :search)";
            $params[':search'] = '%' . $filters['search'] . '%';
        }

        if (!empty($filters['date_from'])) {
            $sql .= " AND t.task_due_date >= :date_from";
            $params[':date_from'] = $filters['date_from'];
        }

        if (!empty($filters['date_to'])) {
            $sql .= " AND t.task_due_date <= :date_to";
            $params[':date_to'] = $filters['date_to'];
        }

        $sql .= " GROUP BY t.task_id";

        // Apply sorting
        $allowedSortFields = ['task_title', 'task_priority', 'task_due_date', 'task_created_at', 'task_completed'];
        $sort = explode(':', $sort);

        $sql .= " ORDER BY t.{$sort[0]} {$sort[1]}";

        $stmt = $this->conn->prepare($sql);

        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
