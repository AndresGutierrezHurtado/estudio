<?php

class TaskController
{
    private $taskService;

    public function __construct(ITaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function create()
    {
        try {
            $data = $_POST;
            $data['user_id'] = $_SESSION['user_id'];

            $result = $this->taskService->createTask($data);

            if ($result) {
                header("Location: /page/dashboard/?success=taskCreated");
            }
        } catch (Exception $e) {
            header("Location: /page/dashboard/?error=" . $e->getMessage());
        }
    }

    public function update()
    {
        try {
            $data = $_POST;
            $data['user_id'] = $_SESSION['user_id'];

            $result = $this->taskService->updateTask($data['task_id'], $data);

            if ($result) {
                header("Location: /page/dashboard/?success=taskUpdated");
            }
        } catch (Exception $e) {
            header("Location: /page/dashboard/?error=" . $e->getMessage());
        }
    }

    public function delete()
    {
        try {
            $result = $this->taskService->deleteTask($_POST['task_id']);

            if ($result) {
                header("Location: /page/dashboard/?success=taskDeleted");
            }
        } catch (Exception $e) {
            header("Location: /page/dashboard/?error=" . $e->getMessage());
        }
    }
}
