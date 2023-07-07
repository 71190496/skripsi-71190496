<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\postingan;

class PostinganPesertaController extends Controller
{
    public function index()
    {
        $data = postingan::orderBy('id')->get();
        return view('peserta.postingan.index')->with('data', $data);
    }
}
