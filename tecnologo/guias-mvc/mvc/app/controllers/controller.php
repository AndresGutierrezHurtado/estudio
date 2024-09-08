<?php

class Controller
{
    protected $conn;
    protected $userModel;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
        $this->userModel = new User($conn);
    }
}
