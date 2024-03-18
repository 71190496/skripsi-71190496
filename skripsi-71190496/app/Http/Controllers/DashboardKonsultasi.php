<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardKonsultasi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Konsultasi::all();
        return view('dashboard.konsultasi.index', ['konsultasi' => $data]);
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
        $data  = Konsultasi::where('id', $id)->get();  
        return view('dashboard.konsultasi.show', compact( 'data'), [
            'title' => 'Detail Pelatihan Saya',

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Konsultasi $konsultasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Konsultasi $konsultasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Konsultasi $konsultasi)
    {
        //
    }
}
