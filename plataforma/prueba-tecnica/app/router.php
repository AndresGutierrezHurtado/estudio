<?php

class Router
{
    private $controller;
    private $method;

    public function __construct()
    {
        $this->matchRoute();
    }

    public function matchRoute()
    {
        $url = explode("/", URL);
        $this->controller = !empty($url[0]) ? $url[0] : 'page';
        $this->method = !empty($url[1]) ? $url[1] : 'Home';
        $this->controller = $this->controller . 'Controller';
    }

    public function run()
    {
        $controller = null;
        $db = new Database();

        switch ($this->controller) {
            case 'pageController':
                $taskRepository = new TaskRepository($db);
                $taskService = new TaskService($taskRepository);

                $controller = new $this->controller($taskService);
                break;
            case 'authController':
                $userRepository = new UserRepository($db);
                $authService = new AuthService($userRepository);

                $controller = new $this->controller($authService);
                break;
            case 'taskController':
                $taskRepository = new TaskRepository($db);
                $taskService = new TaskService($taskRepository);

                $controller = new $this->controller($taskService);
                break;
        }

        $method = $this->method;
        $controller->$method();
    }
}
