<?php

class AuthController
{
    private $authService;

    public function __construct(IAuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register()
    {
        try {
            $data = $_POST;

            $result = $this->authService->register($data);

            if ($result) {
                header("Location: /page/home/?success=registered");
                exit;
            }
        } catch (Exception $e) {
            header("Location: /page/register/?error=" . $e->getMessage());
            exit;
        }
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
