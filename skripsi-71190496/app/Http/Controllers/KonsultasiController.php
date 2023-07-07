<?php

namespace App\Http\Controllers;

use App\Models\konsultasi;
use App\Models\kabupaten_kota;
use App\Models\peserta_pelatihan_test;
use App\Models\jenis_organisasi;
use App\Models\provinsi;
use App\Models\negara;
use App\Models\rentang_usia;
use App\Models\gender;
use App\Models\Organisasi;
use App\Models\pelatihan_test;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peserta.konsultasi.create', [
            'title' => 'Konsultasi',
            'jenis_organisasi' => jenis_organisasi::all(),
            'kabupaten_kota' => kabupaten_kota::all(),
            'provinsi' => provinsi::all(),
            'negara' => negara::all(),
            'rentang_usia' => rentang_usia::all(),
            'gender' => gender::all()
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
    public function show(konsultasi $konsultasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(konsultasi $konsultasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, konsultasi $konsultasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(konsultasi $konsultasi)
    {
        //
    }
}
