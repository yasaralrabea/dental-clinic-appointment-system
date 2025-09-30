<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class ProfileService
{
    public function updateProfile($user, $validatedData)
    {
        $user->fill($validatedData);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return $user;
    }

    public function deleteProfile($user)
    {
        if ($user->role === 'admin') {
            return ['success' => false, 'message' => 'لا يمكنك حذف الادمن.'];
        }

        Auth::logout();

        $user->delete();

        session()->invalidate();
        session()->regenerateToken();

        return ['success' => true];
    }
}
