<?php

namespace App\Http\Controllers;

use App\Models\admin_kontak;
use App\Models\kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         
        $latestData = admin_kontak::latest()->first();
        $data = [$latestData];
        return view('peserta.kontak.index',compact('data'),[
            'title' => 'Kontak'
        ]);
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
        $request->validate([
            'nama_peserta' => 'required',
            'email_peserta' => 'required',
            'subjek' => 'required',
            'pesan' => 'required',
        ], [
            'nama_peserta.required' => 'Field nama wajib diisi',
            'email.required' => 'Field email wajib diisi',
            'subjek.required' => 'Field nomor hp wajib diisi',
            'pesan.required' => 'Field nomor hp wajib diisi'
        ]);

        $data = [
            'nama_peserta' => $request->lokasi,
            'email' => $request->email,
            'subjek' => $request->telepon,
            'pesan' => $request->pesan,
        ];
        dd($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(kontak $kontak)
    {
        return view('dashboard.kontak.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kontak $kontak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kontak $kontak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kontak $kontak)
    {
        //
    }
}
