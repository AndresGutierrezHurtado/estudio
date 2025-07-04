<?php

class Database implements IDatabase
{
    private $conn;
    public static $instance;

    public function __construct()
    {
        if (self::$instance) {
            return self::$instance;
        }
        try {
            $this->connect();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function connect()
    {
        $this->conn = new PDO("mysql:host=" . DB_HOSTNAME . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);

        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function closeConnection()
    {
        $this->conn = null;
    }
}
