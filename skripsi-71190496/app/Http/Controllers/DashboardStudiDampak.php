<?php

namespace App\Http\Controllers;

use App\Models\pelatihan;
use App\Models\Konsultasi;
use App\Models\permintaan;
use Illuminate\Http\Request;
use App\Exports\StudiDampakExport;
use App\Models\PesertaStudiDampak;
use App\Models\permintaan_pelatihan;
use Maatwebsite\Excel\Facades\Excel;

class DashboardStudiDampak extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = pelatihan::orderBy('id_pelatihan')->get();
        $data2 = permintaan::orderBy('id')->get();
        $data3 = Konsultasi::orderBy('id')->get();
        return view('dashboard.studidampak.index', compact('data', 'data2','data3'));
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
    public function show($id_pelatihan)
    {
       $data = PesertaStudiDampak::where('id_pelatihan', $id_pelatihan)->get();
        return view('dashboard.studidampak.show', compact('data')); 
    }

    public function export(Request $request, $id_pelatihan)
    {
        $data = PesertaStudiDampak::where('id_pelatihan', $id_pelatihan)
            ->get();
        return Excel::download(new StudiDampakExport($data), 'studidampak_pelatihan.xlsx');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
