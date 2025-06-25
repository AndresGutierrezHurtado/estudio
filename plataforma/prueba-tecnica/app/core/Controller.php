<?php

class Controller
{
    protected $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }
}
