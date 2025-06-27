<?php

interface IAuthService
{
    public function register($data);
    public function login($email, $password);
    public function logout();
}

interface ITaskService
{
    public function getTasksByUser($userId, $filters = [], $sort);
    public function createTask($data);
    public function updateTask($taskId, $data);
    public function deleteTask($taskId);
}
