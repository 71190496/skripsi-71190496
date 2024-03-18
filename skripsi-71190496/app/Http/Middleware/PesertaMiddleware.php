<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PesertaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah pengguna adalah peserta
        if (auth()->check() && auth()->user()->role == 'peserta') {
            // Lanjutkan ke rute yang diminta
            return $next($request);
        }

        // Jika bukan peserta, redirect ke halaman lain (misalnya halaman login)
        return redirect('/login')->with('error', 'Anda tidak memiliki akses.');
    }
}
