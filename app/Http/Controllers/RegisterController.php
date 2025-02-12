<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register() {
            (object) ['name' => 'admin']
            (object) ['name' => 'user'],            
        ];
        $title = 'Register';
        // ngambil semua data dari tabel roles di db
        // Ngarahin ke view dan ngirim data dari controller ke view
        return view('users/register', compact('roles','title'));
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
        
        // Tetapkan role ke pengguna
        $user->assignRole(roles: $request->user_role);
        $user->save();

        //  Arahkan pengguna sesuai role
        Auth::login($user);
        return redirect()->route('login')->with('success','berhasil');
    }
    
}
