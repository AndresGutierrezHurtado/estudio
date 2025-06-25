<?php

class PageController extends Controller
{

    public function __construct(PDO $conn)
    {
        parent::__construct($conn);
    }

    public function home()
    {
        $title = "Inicio";
        $content = __DIR__ . "/../views/pages/welcome.view.php";

        if (isset($_SESSION['user'])) {
            header("Location: /page/dashboard");
            exit;
        }

        require_once(__DIR__ . "/../views/layouts/app.layout.php");
    }

    public function register()
    {
        $title = "Registro";
        $content = __DIR__ . "/../views/pages/register.view.php";

        require_once(__DIR__ . "/../views/layouts/app.layout.php");
    }

    public function dashboard()
    {
        $title = "Dashboard";
        $content = __DIR__ . "/../views/pages/dashboard.view.php";

        // Get filter and sort parameters
        $filters = [
            'priority' => $_GET['priority'] ?? '',
            'status' => $_GET['status'] ?? '',
            'search' => $_GET['search'] ?? '',
            'date_from' => $_GET['date_from'] ?? '',
            'date_to' => $_GET['date_to'] ?? ''
        ];

        // Fetch tasks for the current user with filters and sorting
        $taskController = new TaskController($this->conn);
        $tasks = $taskController->getTasksByUser($_SESSION['user_id'], $filters, $_GET['sort'] ?? 'task_priority:DESC');

        // Get filter options for the view
        $filterOptions = [
            'priorities' => ['alta', 'media', 'baja'],
            'statuses' => ['pending', 'completed', 'overdue']
        ];

        require_once(__DIR__ . "/../views/layouts/app.layout.php");
    }
}
