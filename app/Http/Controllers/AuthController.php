<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth; // Add this to import the Auth facade

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validasi data login
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            // Redirect ke halaman utama setelah login berhasil
            return redirect()->intended('/products');
        }

        // Jika login gagal
        return back()->withErrors(['email' => 'Login gagal!']);
    }

    // Fungsi logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
