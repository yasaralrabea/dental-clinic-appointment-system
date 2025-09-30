<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function find($id)
    {
        return User::find($id);
    }

    public function update($user, array $data)
    {
        $user->fill($data);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();
        return $user;
    }

    public function promoteToAdmin($user)
    {
        $user->role = 'admin';
        $user->save();
        return $user;
    }

    public function delete($user)
    {
        return $user->delete();
    }
}
