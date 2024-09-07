<?php

class Controller
{
    protected $conn;
    protected $userModel;
    protected $productModel;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
        $this->userModel = new User($conn);
        $this->productModel = new Product($conn);
    }
}
