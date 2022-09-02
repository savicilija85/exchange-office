<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface
{
    public function getOneUser(int $id): Model;
    public function updateUser(int $id, array $data): Model;
}
