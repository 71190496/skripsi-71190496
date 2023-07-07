<?php

namespace App\Http\Controllers;

use App\Models\postingan;
use Illuminate\Http\Request;

class PesertaPostingan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = postingan::orderBy('id')->get();
        return view('peserta.postingan.index',[
            'title' => 'Artikel'
        ])->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = postingan::orderBy('id')->get();
        return view('peserta.postingan.show',[
            'title' => 'Artikel'
        ])->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
