<?php

namespace App\Http\Controllers;

use App\Models\fasilitator_pelatihan_test;
use App\Models\internal_eksternal;
use App\Models\gender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardFasilitator extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = fasilitator_pelatihan_test::orderBy('id_fasilitator')->get();
        return view('dashboard.fasilitator.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('dashboard.fasilitator.create', [
            'gender' => gender::all(),
            'internal_eksternal' => internal_eksternal::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_fasilitator' => 'required',
            'tempat_tgl_lahir' => 'required',
            'email_fasilitator' => 'required',
            'nomor_telepon' => 'required',
            'alamat' => 'required'
        ], [
            'nama_fasilitator.required' => 'Field nama wajib diisi',
            'tempat_tgl_lahir.required' => 'Field email wajib diisi',
            'email_fasilitator.required' => 'Field nomor hp wajib diisi',
            'nomor_telepon.required' => 'Field nama organisasi wajib diisi',
            'alamat.required' => 'Field jabatan wajib diisi'
        ]);
        $data = [
            'nama_fasilitator' => $request->nama_fasilitator,
            'tempat_tgl_lahir' => $request->tempat_tgl_lahir,
            'email_fasilitator' => $request->email_fasilitator,
            'nomor_telepon' => $request->nomor_telepon,
            'alamat' => $request->alamat,
            'id_gender' => $request->id_gender,
            'id_internal_eksternal' => $request->id_internal_eksternal,
            'asal_lembaga' => $request->asal_lembaga,
            'body' => $request->body,
        ];
        // $trix = new fasilitator_pelatihan_test();
        // $trix->body = $request->input('body');

        // // Cek apakah ada file yang diupload
        // if ($request->hasFile('body')) {
        //     $attachment = $request->file('body');

        //     // Simpan file ke dalam storage
        //     $path = Storage::putFile('public/attachments', $attachment);

        //     // Simpan path file ke dalam database
        //     $trix->attachment = $path;
        // }



        // dd($data);
        fasilitator_pelatihan_test::create($data);
        return redirect('dashboard/fasilitator')->with('success', 'Berhasil menambahkan fasilitator');
    }

    /**
     * Display the specified resource.
     */
    public function show($id_fasilitator)
    {
        $fasilitator = fasilitator_pelatihan_test::with('internal_eksternal')->where('id_fasilitator', '=', $id_fasilitator)->get();
        // dd($fasilitator);
        return view('dashboard.fasilitator.show', compact('fasilitator'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = fasilitator_pelatihan_test::find($id);
        return view('dashboard.fasilitator.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = fasilitator_pelatihan_test::find($id);
        $data->nama_fasilitator = $request->nama_fasilitator;
        $data->tempat_tgl_lahir = $request->tempat_tgl_lahir;
        $data->email_fasilitator = $request->email_fasilitator;
        $data->nomor_telepon = $request->nomor_telepon;
        $data->id_gender = $request->input('id_gender');
        // $data->id_internal_eksternal = $request->id_internal_eksternal;
        $data->asal_lembaga = $request->asal_lembaga;
        $data->body = $request->alamat;
        $data->save();

        return redirect('/dashboard/fasilitator')->with('success', 'Berhasil mengupdate data');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = fasilitator_pelatihan_test::find($id);
        $data->delete();

        return redirect('/dashboard/fasilitator')->with('success', 'Berhasil menghapus data');
    }
}
