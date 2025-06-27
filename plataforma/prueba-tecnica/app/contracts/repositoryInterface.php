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
