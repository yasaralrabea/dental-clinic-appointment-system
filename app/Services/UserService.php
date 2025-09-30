<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserService
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getAuthUser()
    {
        return Auth::user();
    }

    public function updateProfile($request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $request->user()->id,
            'age' => 'required|integer|min:1',
            'n_id' => 'required|string|max:20',
        ]);

        return $this->userRepo->update($request->user(), $validated);
    }

    public function promoteUser($id)
    {
        $user = $this->userRepo->find($id);
        return $this->userRepo->promoteToAdmin($user);
    }

    public function deleteUser($id)
    {
        $user = $this->userRepo->find($id);
        return $this->userRepo->delete($user);
    }

    public function getUser($id)
    {
        return $this->userRepo->find($id);
    }
}
