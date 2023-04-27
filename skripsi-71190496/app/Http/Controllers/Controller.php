<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    public function dashboard(Request $request) {
        $user = $request->user();

        if($user->hasRole('admin')) {
           return view('/dashboard');
        }
        elseif($user->hasRole('peserta')) {
           return view('/peserta');
        }
}
}
