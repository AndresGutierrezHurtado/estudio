<?php

class UserController extends Controller
{
    public function __construct(PDO $conn)
    {
        parent::__construct($conn);
    }

    public function register()
    {
        $data = $_POST;
        $nickname = $data['username'];
        $email = $data['email'];
        $password = $data['password'];

        // check if email is already in use
        $sql = "SELECT * FROM users WHERE user_email = :email OR user_nickname = :nickname";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':nickname', $nickname);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            header("Location: /page/register?error=existentUser");
            exit;
        }

        $sql = "INSERT INTO users (`user_nickname`, `user_email`, `user_password`) VALUES (:nickname, :email, :pass)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':nickname', $nickname);
        $stmt->bindParam(':pass', password_hash($password, PASSWORD_DEFAULT));
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            header("Location: /page/register/?success=registered");
        } else {
            header("Location: /page/register.?error=errorRegister");
        }
    }
}
