<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register() {
        $roles = [(object) ['name' => 'admin'], (object) ['name' => 'user']]; 
        $title = 'Register';

        return view('users/register', compact('roles', 'title'));
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
            'user_role' => 'required|in:admin,user', 
        ]);

        $user = new User([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        $user->save();  // Save user before assigning a role

        // Assign role (if using Spatie)
        $user->assignRole($request->user_role);

        // Log in the user
        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Registrasi berhasil!');
    }
}
