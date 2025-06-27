<?php

class AuthService implements IAuthService
{
    private $repository;

    public function __construct(IUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function register($data): bool
    {
        $existingUser = $this->repository->getByEmail($data['email']);

        if ($existingUser) {
            throw new Exception("El email ya está en uso", 400);
        }

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        $result = $this->repository->add($data);

        if (!$result) {
            throw new Exception("Error al registrar el usuario", 500);
        }

        return true;
    }

    public function login($email, $password): bool
    {
        $user = $this->repository->getByEmail($email);

        if (!$user) {
            throw new Exception("Usuario no encontrado", 404);
        }

        if (!password_verify($password, $user['user_password'])) {
            throw new Exception("Contraseña incorrecta", 401);
        }

        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user'] = $user;

        return true;
    }

    public function logout(): void
    {
        session_destroy();
        header("Location: /page/home/?success=loggedOut");
    }
}
