<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\provinsi;
use App\Models\kabupaten_kota;
use Illuminate\Http\Request;

class PesertaSurveyKepuasan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('peserta.surveykepuasan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peserta.surveykepuasan.create',[
            'kabupaten_kota' => kabupaten_kota::all(),
            'provinsi' => provinsi::all()
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
    public function show(Survey $survey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Survey $survey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Survey $survey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Survey $survey)
    {
        //
    }
}
