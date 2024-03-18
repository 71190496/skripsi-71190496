<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use App\Models\Produk;
use App\Models\Survey;
use App\Models\pelatihan;
use App\Models\Konsultasi;
use App\Models\permintaan;
use Illuminate\Http\Request;
use App\Models\permintaan_pelatihan;
use App\Exports\SurveyKepuasanExport;
use Maatwebsite\Excel\Facades\Excel; 
use App\Models\fasilitator_pelatihan_test;

class DashboardSurvey extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = pelatihan::orderBy('id_pelatihan')->get();
        $data2 = permintaan::orderBy('id')->get();
        // dd($data2);
        $data3 = Konsultasi::orderBy('id')->get();
        return view('dashboard.surveykepuasan.index', compact('data', 'data2','data3'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
    public function show($id_pelatihan)
    {
        $data = Survey::with('provinsi', 'kabupaten_kota')
            ->where('id_pelatihan', $id_pelatihan)
            ->get();
        return view('dashboard.surveykepuasan.show', compact('data'));
    }

    public function export(Request $request, $id_pelatihan)
    {
        $data = Survey::with('provinsi', 'kabupaten_kota')
            ->where('id_pelatihan', $id_pelatihan)
            ->get();
        return Excel::download(new SurveyKepuasanExport($data), 'survey_pelatihan.xlsx');
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
