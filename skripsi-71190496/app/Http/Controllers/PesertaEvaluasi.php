<?php

namespace App\Http\Controllers;

use App\Models\evalPeserta;
use Illuminate\Http\Request;

class PesertaEvaluasi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('peserta.evaluasi.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peserta.evaluasi.create');
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
    public function show(evalPeserta $evalPeserta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(evalPeserta $evalPeserta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, evalPeserta $evalPeserta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(evalPeserta $evalPeserta)
    {
        //
    }
}
