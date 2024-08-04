<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ], [
            'email.required' => 'Field email wajib diisi',
            'password.required' => 'Field password wajib diisi'
        ]);

        // dd('masuk');
        // $lolo = (Auth::attempt($credentials));
        // dd($lolo);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // dd(Auth::user());
            if (Auth::user()->role == 'admin') {
                return redirect()->intended('/dashboard/reguler'); // Ganti dengan rute admin yang sesuai
            }

            return redirect()->intended('/peserta/pelatihan'); // Ganti dengan rute peserta yang sesuai
        }

        return back()->withErrors([
            'email' => 'Email atau Password yang anda masukan salah',
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
