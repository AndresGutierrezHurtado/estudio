<?php

class UserRepository implements IUserRepository
{
    private $conn;
    private $database;

    public function __construct(IDatabase $database)
    {
        $this->database = $database;
        $this->conn = $this->database->getConnection();
    }

    public function get()
    {
        $sql = "SELECT * FROM users";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM users WHERE user_id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() === 0) {
            return null;
        }

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    public function getByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE user_email = :email";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() === 0) {
            return null;
        }

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    public function add($data)
    {
        $sql = "INSERT INTO users (user_nickname, user_email, user_password) VALUES (:nickname, :email, :pass)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nickname', $data['nickname']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':pass', $data['password']);
        $stmt->execute();

        $result = $stmt->rowCount();

        if ($result > 0) {
            return true;
        }

        return false;
    }

    public function update($id, $data)
    {
        $sql = "UPDATE users SET user_nickname = :nickname, user_email = :email, user_password = :pass WHERE user_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nickname', $data['nickname']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':pass', $data['pass']);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $result = $stmt->rowCount();

        if ($result > 0) {
            return true;
        }

        return false;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM users WHERE user_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $result = $stmt->rowCount();

        if ($result > 0) {
            return true;
        }

        return false;
    }
}
