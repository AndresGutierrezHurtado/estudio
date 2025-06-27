<?php

class AuthController
{
    private $authService;

    public function __construct(IAuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login()
    {
        try {
            $result = $this->authService->login($_POST['email'], $_POST['password']);

            if ($result) {
                header("Location: /page/dashboard/?success=Sesión iniciada correctamente");
                exit;
            }
        } catch (Exception $e) {
            header("Location: /page/home/?error=" . $e->getMessage());
            exit;
        }
    }

    public function logout()
    {
        try {
            $this->authService->logout();
        } catch (Exception $e) {
            header("Location: /page/home/?error=" . $e->getMessage());
            exit;
        }
    }
}
