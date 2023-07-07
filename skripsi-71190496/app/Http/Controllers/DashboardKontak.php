<?php

namespace App\Http\Controllers;

use App\Models\admin_kontak;
use Illuminate\Http\Request;

class DashboardKontak extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kontak.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kontak.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'lokasi' => 'required',
            'email' => 'required',
            'telepon' => 'required',
        ], [
            'lokasi.required' => 'Field nama wajib diisi',
            'email.required' => 'Field email wajib diisi',
            'telepon.required' => 'Field nomor hp wajib diisi'
        ]);

        $data = [
            'lokasi' => $request->lokasi,
            'email' => $request->email,
            'telepon' => $request->telepon,
        ];
        // dd($data);
        admin_kontak::create($data);
        return redirect('dashboard/kontak')->with('success', 'Berhasil mengubah lokasi, Email dan Telepon');
    }

    /**
     * Display the specified resource.
     */
    public function show(admin_kontak $admin_kontak)
    {
        return view('dashboard.kontak.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(admin_kontak $admin_kontak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, admin_kontak $admin_kontak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(admin_kontak $admin_kontak)
    {
        //
    }
}
