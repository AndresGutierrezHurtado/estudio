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
        require_once(__DIR__ . "/controllers/$this->controller.php");
    }

    public function run()
    {
        $database = new Database();
        $conn = $database->getConnection();

        if (isset($_SESSION["user_id"])) {
            $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = :id");
            $stmt->bindParam(':id', $_SESSION["user_id"]);
            $stmt->execute();

            $_SESSION["user"] = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        $controller = new $this->controller($conn);
        $method = $this->method;
        $controller->$method();
    }
}
