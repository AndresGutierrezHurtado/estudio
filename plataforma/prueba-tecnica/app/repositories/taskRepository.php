<?php

class TaskRepository implements ITaskRepository
{
    private $conn;
    private $database;

    public function __construct(IDatabase $database)
    {
        $this->database = $database;
        $this->conn = $this->database->getConnection();
    }

    public function get(): array | null
    {
        $sql = "SELECT * FROM tasks";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $tasks;
    }

    public function getById($id): array | null
    {
        $sql = "SELECT * FROM tasks WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $task = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() === 0) {
            $this->database->closeConnection();
            return null;
        }

        return $task;
    }

    public function add($data): int
    {
        $sql = "INSERT INTO tasks (task_user_id, task_title, task_description, task_due_date, task_priority) VALUES (:user_id, :title, :description, :due_date, :priority)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $data['user_id']);
        $stmt->bindParam(':title', $data['task_title']);
        $stmt->bindParam(':description', $data['task_description']);
        $stmt->bindParam(':due_date', $data['task_due_dater']);
        $stmt->bindParam(':priority', $data['task_priority']);
        $stmt->execute();

        if ($stmt->rowCount() === 0) {
            return -1;
        }

        return $this->conn->lastInsertId();
    }

    public function update($id, $data): bool
    {
        $sql = "UPDATE tasks SET task_title = :title, task_description = :descr, task_due_date = :due_date, task_priority = :prio WHERE task_id = :task_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':task_id', $id);
        $stmt->bindParam(':title', $data['task_title']);
        $stmt->bindParam(':descr', $data['task_description']);
        $stmt->bindParam(':due_date', $data['task_due_date']);
        $stmt->bindParam(':prio', $data['task_priority']);

        $stmt->execute();

        if ($stmt->rowCount() === 0) {
            return false;
        }

        return true;
    }

    public function delete($id): bool
    {
        $sql = "DELETE FROM tasks WHERE task_id = :task_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':task_id', $id);
        $stmt->execute();

        $sql2 = "DELETE FROM files WHERE file_task_id = :task_id";
        $stmt2 = $this->conn->prepare($sql2);
        $stmt2->bindParam(':task_id', $id);
        $stmt2->execute();

        if ($stmt->rowCount() === 0) {
            return false;
        }

        return true;
    }

    public function addFile($taskId, $relativePath): bool
    {
        $sql = "INSERT INTO files (file_task_id, file_path) VALUES (:task_id, :file_path)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':task_id', $taskId);
        $stmt->bindParam(':file_path', $relativePath);
        $stmt->execute();

        if ($stmt->rowCount() === 0) {
            return false;
        }

        return true;
    }

    public function getTasksByUserId($userId, $filters = [], $sort): array
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
