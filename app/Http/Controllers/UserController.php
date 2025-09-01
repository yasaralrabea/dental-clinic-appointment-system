<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class UserController extends Controller
{
    
    public function edit()
    {
        $info = Auth::user();
        return view('profile.user_edit', compact('info'));


    }
    public function update(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $request->user()->id,
        'age' => 'required|integer|min:1',
        'n_id' => 'required|string|max:20',
    ]);

   $user = $request->user();
$user->name = $validated['name'];
$user->email = $validated['email'];
$user->age = $validated['age'];
$user->n_id = $validated['n_id'];

if ($user->isDirty('email')) {
    $user->email_verified_at = null;
}

$user->save();

    return Redirect::route('user.edit')->with('status', 'profile-updated');
}

        public function promote($id){
        
        $user=User::find($id);

        $user->role='admin';
        $user->save();
        return redirect()->back()->with('success', 'تم ترقية المستخدم لأدمن بنجاح.');
        }

        public function destroy($id)
        {
            $user=User::find($id);
            $user->delete();
            return redirect()->back()->with('success', 'تم حذف المستخدم بنجاح.');

        }


        public function show($id)
        {
            $user=User::find($id);
            return view('user_profile', compact('user'));
        }




}
