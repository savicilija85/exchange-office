<?php


namespace App\Repositories\Eloquent;


use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements UserRepositoryInterface
{

    public function getOneUser(int $id): Model
    {
        return User::findOrFail($id);
    }

    public function updateUser(int $id, array $data): Model
    {
        $user = User::findOrFail($id);
        $user->email = $data['email'];
        $user->save();
        return $user;
    }
}
