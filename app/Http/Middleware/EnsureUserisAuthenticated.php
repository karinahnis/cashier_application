<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserisAuthenticated
{
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response  
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Nge cek apkh pengguna udh login
        if (!Auth::check()) {
            // Jika blm login, arahkan ke halaman login dgn pesan error
            return redirect()->route('login')->with('eror', 'Anda harus login untuk mengakses halaman ini.');
        }

        // Jika sudah login, lanjutkan proses ke middleware berikutnya atau controller
        return $next($request);
    }
}
