<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tema::orderBy('id')->get();
        return view('dashboard.tema.index')->with('data', $data); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.tema.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'judul_tema' => $request->judul_tema,
            'tanggal_dibuat' => $request->tanggal_dibuat, 
        ]; 
        // dd($data);
        Tema::create($data);
        return redirect()->to('dashboard/tema')->with('success', 'Berhasil menambah tema');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tema $tema)
    {
        return view('dashboard.tema.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tema $tema)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tema $tema)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tema $tema)
    {
        //
    }
}
