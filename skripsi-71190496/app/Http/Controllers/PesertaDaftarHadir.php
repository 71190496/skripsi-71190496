<?php

namespace App\Http\Controllers;

use App\Models\Hadir;
use App\Models\gender;
use App\Models\Organisasi;
use Illuminate\Http\Request;

class PesertaDaftarHadir extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('peserta.daftarhadir.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peserta.daftarhadir.create',[
            'gender' => gender::all(),
            'organisasis' => Organisasi::all()


        ]);
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
    public function show(Hadir $hadir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hadir $hadir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hadir $hadir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hadir $hadir)
    {
        //
    }
}
