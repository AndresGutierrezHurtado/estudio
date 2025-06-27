<?php

class Router
{
    private $controller;
    private $method;
    private $service;

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
            case 'authController':
                $userRepository = new UserRepository($db);
                $authService = new AuthService($userRepository);

                $controller = new $this->controller($authService);
                break;
            default:
                $controller = new $this->controller($db->getConnection());
                break;
        }

        $method = $this->method;
        $controller->$method();
    }
}
