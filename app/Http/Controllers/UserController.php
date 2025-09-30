<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function edit()
    {
        $info = $this->userService->getAuthUser();
        return view('profile.user_edit', compact('info'));
    }

    public function update(Request $request)
    {
        $this->userService->updateProfile($request);
        return Redirect::route('user.edit')->with('status', 'profile-updated');
    }

    public function promote($id)
    {
        $this->userService->promoteUser($id);
        return redirect()->back()->with('success', 'تم ترقية المستخدم لأدمن بنجاح.');
    }

    public function destroy($id)
    {
        $this->userService->deleteUser($id);
        return redirect()->back()->with('success', 'تم حذف المستخدم بنجاح.');
    }

    public function show($id)
    {
        $user = $this->userService->getUser($id);
        return view('user_profile', compact('user'));
    }
}
