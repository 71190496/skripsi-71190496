<?php

namespace App\Http\Controllers;

use App\Models\kabupaten_kota;
use App\Models\peserta_pelatihan_test;
use App\Models\provinsi;
use App\Models\negara;
use App\Models\rentang_usia;
use App\Models\gender;
use App\Models\Organisasi;
use App\Models\pelatihan_test;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function register($id)
    {
        $pelatihan = pelatihan_test::findOrFail($id);

        return view('peserta.register', compact('pelatihan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $peserta = new peserta_pelatihan_test();
        $peserta->id_pelatihan = $request->input('id_pelatihan');
        $peserta->id_gender = $request->input('id_gender');
        $peserta->id_rentang_usia = $request->input('id_rentang_usia');
        $peserta->id_kabupaten = $request->input('id_kabupaten');
        $peserta->id_provinsi = $request->input('id_provinsi');
        $peserta->id_negara = $request->input('id_negara');
        $peserta->id_organisasi = $request->input('id_organisasi');
        $peserta->nama_peserta = $request->input('nama_peserta');
        $peserta->email_peserta = $request->input('email_peserta');
        $peserta->no_hp = $request->input('no_hp');
        $peserta->nama_organisasi = $request->input('nama_organisasi');
        $peserta->jabatan_peserta = $request->input('jabatan_peserta');
        $peserta->pelatihan_relevan = $request->input('pelatihan_relevan');
        $peserta->harapan_pelatihan = $request->input('jabatan_peserta');
        // $request->validate([
        //     'nama_peserta' => 'required',
        //     'email_peserta' => 'required',
        //     'no_hp' => 'required',
        //     'nama_organisasi' => 'required',
        //     'jabatan_peserta' => 'required',
        //     'harapan_pelatihan' => 'required'
        // ], [
        //     'nama_peserta.required' => 'Field nama wajib diisi',
        //     'email_peserta.required' => 'Field email wajib diisi',
        //     'no_hp.required' => 'Field nomor hp wajib diisi',
        //     'nama_organisasi.required' => 'Field nama organisasi wajib diisi',
        //     'jabatan_peserta.required' => 'Field jabatan wajib diisi',
        //     'harapan_pelatihan.required' => 'Field harapan pelatihan wajib diisi'
        // ]);
        // $peserta = [
        //     'id_gender' => $request->id_gender,
        //     'id_rentang_usia' => $request->id_rentang_usia,
        //     'id_kabupaten' => $request->id_kabupaten,
        //     'id_provinsi' => $request->id_provinsi,
        //     'id_negara' => $request->id_negara,
        //     'id_organisasi' => $request->id_organisasi,
        //     'nama_peserta' => $request->nama_peserta,
        //     'email_peserta' => $request->email_peserta,
        //     'no_hp' => $request->no_hp,
        //     'nama_organisasi' => $request->nama_organisasi,
        //     'jabatan_peserta' => $request->jabatan_peserta,
        //     'pelatihan_relevan' => $request->pelatihan_relevan,
        //     'harapan_pelatihan' => $request->harapan_pelatihan
        // ];
        $peserta->save();

    return redirect()->back()->with('success', 'Pendaftaran berhasil.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
