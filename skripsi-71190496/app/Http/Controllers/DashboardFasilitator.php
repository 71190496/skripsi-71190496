<?php

namespace App\Http\Controllers;

use App\Models\fasilitator_pelatihan_test;
use App\Models\internal_eksternal;
use App\Models\gender;
use Illuminate\Http\Request;

class DashboardFasilitator extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = fasilitator_pelatihan_test::orderBy('id')->get();
        return view ('dashboard.fasilitator.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.fasilitator.create',[
            'gender' => gender::all(),
            'internal_eksternal' => internal_eksternal::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'nama_fasilitator' => $request->nama_fasilitator,
            'tempat_tgl_lahir' => $request->tempat_tgl_lahir,
            'email_fasilitator' => $request->email_fasilitator,
            'nomor_telepon' => $request->nomor_telepon,
            'alamat' => $request->alamat,
            'id_gender' => $request->id_gender,
            'id_internal_eksternal' => $request->id_internal_eksternal,
            'asal_lembaga' => $request->asal_lembaga,
            'body' => $request->body
        ];


        fasilitator_pelatihan_test::create($data);
        return redirect('dashboard/fasilitator')->with('success','Berhasil menambahkan fasilitator');
    }

    /**
     * Display the specified resource.
     */
    public function show(fasilitator_pelatihan_test $fasilitator_pelatihan_test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(fasilitator_pelatihan_test $fasilitator_pelatihan_test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, fasilitator_pelatihan_test $fasilitator_pelatihan_test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(fasilitator_pelatihan_test $fasilitator_pelatihan_test)
    {
        //
    }
}
