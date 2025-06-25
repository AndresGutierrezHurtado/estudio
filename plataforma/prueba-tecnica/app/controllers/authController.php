<?php

class AuthController extends Controller
{

    public function __construct(PDO $conn)
    {
        parent::__construct($conn);
    }

    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE user_email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() === 0) {
            header("Location: /page/home/?error=invalidCredentials");
            exit;
        }

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!password_verify($password, $user['user_password'])) {
            header("Location: /page/home/?error=invalidCredentials");
            exit;
        }

        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user'] = $user;

        header("Location: /page/dashboard");
    }

    public function logout()
    {
        session_destroy();
        
        header("Location: /page/home/?success=loggedOut");
        exit;
    }
}
