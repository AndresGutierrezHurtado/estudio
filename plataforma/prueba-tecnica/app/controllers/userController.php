<?php

class UserController
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
}
