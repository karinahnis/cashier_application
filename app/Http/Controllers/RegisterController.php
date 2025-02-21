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

        return view('register/register', compact('roles', 'title'));
    }

    public function register_action(Request $request)
    { 
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|unique:users|min:3|max:255',
            'password' => 'required',
            'password-conf' => 'required|same:password',
        ]);
        
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registration successfull!');


        
    }
}