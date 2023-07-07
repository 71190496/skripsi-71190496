<?php

namespace App\Http\Controllers;

use App\Models\beranda;
use App\Models\postingan;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = postingan::orderBy('id')->get();
        return view ('peserta.beranda.index',[
            'title' => 'Beranda',
            'active' => 'beranda'
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
    public function show($id)
    {
        $data = postingan::where('id',$id)->get();
        return view('peserta.beranda.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(beranda $beranda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, beranda $beranda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(beranda $beranda)
    {
        //
    }
}
