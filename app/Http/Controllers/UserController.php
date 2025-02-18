<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        $data['title'] = 'Login';
        return view('users/login', $data);
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        
         // Auth attempt
        if (Auth::attempt($request->only(['username', 'password']))) {
            $request->session()->regenerate();
    
            // Periksa role pengguna dan arahkan berdasarkan role
            if (Auth::user()->('admin')) {
                return redirect()->route('dashboard.admin');
            }
            return redirect()->route('dashboard.user');
        }
    
        // Jika login gagal
        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }

    public function password()
    {
        $data['title'] = 'Change Password';
        return view('user/password', $data);
    }

    public function password_action(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|confirmed',
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        return back()->with('success', 'Password changed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function user_dashboard() {
        $title = 'User Dashboard';
        return view('dashboard.user', compact('title')); 
    }
}
