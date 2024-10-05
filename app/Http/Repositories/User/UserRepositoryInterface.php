<?php

namespace App\Http\Repositories\User;

interface UserRepositoryInterface
{
    public function getAll();
    public function find($id);
    public function store($data);
    public function update($data, $id);
    public function delete($id);
}
