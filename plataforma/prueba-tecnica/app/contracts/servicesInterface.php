<?php

interface IAuthService
{
    public function register($data): bool;
    public function login($email, $password): bool;
    public function logout(): void;
}

interface ITaskService
{
    public function getTasksByUser($userId, $filters = [], $sort): array | null;
    public function createTask($data): bool;
    public function updateTask($taskId, $data): bool;
    public function deleteTask($taskId): bool;
}
