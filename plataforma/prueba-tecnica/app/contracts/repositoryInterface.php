<?php

interface IRepository
{
    public function get();
    public function getById($id);
    public function add($data);
    public function update($id, $data);
    public function delete($id);
}

interface IUserRepository extends IRepository
{
    public function getByEmail($email);
}

interface ITaskRepository extends IRepository
{
    public function addFile($taskId, $relativePath): bool;
    public function getTasksByUserId($userId, $filters = [], $sort): array;
}
