<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create',[
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5' 
        ],[
            'name.required' => 'Field nama wajib diisi',
            'email.required' => 'Field email wajib diisi',
            'password.required' => 'Field password wajib diisi'
        ]);
 

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/login')->with('berhasil', 'Registrasi berhasil! Silahkan login');
    }
}
