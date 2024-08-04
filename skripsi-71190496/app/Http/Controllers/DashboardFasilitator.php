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
        // dd($request->all());
        $request->validate([
            'nama_fasilitator' => 'required',
            'nik' => 'required|numeric|digits:16',
            'email_fasilitator' => 'required|email:dns',
            'nomor_telepon' => 'required|numeric|digits:12',
            'alamat' => 'required',
            'gender' => 'required',
            'asal_lembaga' => 'required',
            'id_internal_eksternal' => 'required',
            'body' => 'required',
        ], [
            'nama_fasilitator.required' => 'Field nama fasilitator wajib diisi',
            'nik.required' => 'Field nik wajib diisi',
            'nik.numeric' => 'Field nik harus berupa angka',
            'nik.digits' => 'Field nik harus 16 angka',
            'email_fasilitator.required' => 'Field email wajib diisi',
            'email_fasilitator.email' => 'Field email harus email yang valid',
            'nomor_telepon.required' => 'Field nomor telepon wajib diisi',
            'nomor_telepon.digits' => 'Field nomor telepon harus 12 angka',
            'id_internal_eksternal.required' => 'Field fasilitator internal atau eksternal wajib diisi',
            'alamat.required' => 'Field alamat wajib diisi',
            'gender.required' => 'Field jenis kelamin wajib diisi',
            'body.required' => 'Field tambahkan keahlian wajib diisi',
            'asal_lembaga.required' => 'Field asal lembaga wajib diisi',
        ]);
        $data = [
            'nama_fasilitator' => $request->nama_fasilitator,
            'nik' => $request->nik,
            'email_fasilitator' => $request->email_fasilitator,
            'nomor_telepon' => $request->nomor_telepon,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->gender,
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
        $data = fasilitator_pelatihan_test::with('internal_eksternal')->find($id);
        // dd($data);
        return view('dashboard.fasilitator.edit', compact('data'),[
            'internal_eksternal' => internal_eksternal::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_fasilitator)
    {
        // dd($request->all());
        $data = fasilitator_pelatihan_test::findOrFail($id_fasilitator);
        $data->nama_fasilitator = $request->nama_fasilitator;
        // $data->tempat_tgl_lahir = $request->tempat_tgl_lahir;
        $data->email_fasilitator = $request->email_fasilitator;
        $data->nomor_telepon = $request->nomor_telepon;
        $data->jenis_kelamin = $request->gender;
        // $data->id_internal_eksternal = $request->id_internal_eksternal;
        $data->asal_lembaga = $request->asal_lembaga;
        $data->body = $request->body;
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
