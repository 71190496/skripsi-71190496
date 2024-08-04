<?php

namespace App\Http\Controllers;

use App\Models\gender;
use App\Models\negara;
use App\Models\provinsi;
use App\Models\konsultasi;
use App\Models\Organisasi;
use App\Models\rentang_usia;
use Illuminate\Http\Request;
use App\Models\kabupaten_kota;
use App\Models\pelatihan_test;
use App\Models\jenis_organisasi;
use Illuminate\Support\Facades\Auth;
use App\Models\peserta_pelatihan_test;

class KonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peserta.konsultasi.create', [
            'title' => 'Konsultasi',
            'jenis_organisasi' => jenis_organisasi::all(),
            'kabupaten_kota' => kabupaten_kota::all(),
            'provinsi' => provinsi::all(),
            'negara' => negara::all(),
            'rentang_usia' => rentang_usia::all(),
            'gender' => gender::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Validasi formulir
        $request->validate([
            'nama_organisasi' => 'required|string|max:255',
            'jenis_organisasi' => 'required',
            'email' => 'required|email:dns',
            'no_hp' => 'required|numeric',
            // 'kabupaten_kota' => 'required',
            // 'id_provinsi' => 'required',
            // 'id_negara' => 'required',
            'deskripsi_kebutuhan' => 'required|string',
        ],
        [
            'nama_organisasi.required' => 'Nama Organisasi harus diisi.', 
            'jenis_organisasi.required' => 'Jenis Organisasi harus dipilih.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Email harus diisi dengan email yang  valid.',
            'no_hp.numeric' => 'Nomor Telepon harus diisi dengan angka.',
            'deskripsi_kebutuhan.required' => 'Deskripsi Pelatihan harus diisi.',
        ]);
        $id_user = Auth::user()->id;
        // Simpan data formulir ke dalam database
        $konsultasi = new konsultasi();
        $konsultasi->id_user = $id_user; // Simpan ID pengguna
        $konsultasi->nama_organisasi = $request->input('nama_organisasi');
        $konsultasi->jenis_organisasi = $request->input('jenis_organisasi');
        $konsultasi->email = $request->input('email');
        $konsultasi->no_hp = $request->input('no_hp');
        $konsultasi->deskripsi_kebutuhan = $request->input('deskripsi_kebutuhan');
        $konsultasi->id_negara = $request->input('id_negara');
        $konsultasi->id_provinsi = $request->input('id_provinsi');
        $konsultasi->id_kabupaten = $request->input('id_kabupaten');
        $konsultasi->save();


        // // Simpan data ke dalam database
        // Konsultasi::create($request->all());

        // $request->validate([
        //     'nama_organisasi' => 'required|string|max:255',
        //     'jenis_organisasi' => 'required|integer',
        //     'email' => 'required|email|max:255',
        //     'no_hp' => 'required|string|max:15',
        //     'kabupaten_kota' => 'required|integer',
        //     'id_provinsi' => 'required|integer',
        //     'id_negara' => 'required|integer',
        //     'deskripsi_kebutuhan' => 'required|string',
        // ], [
        //     'nama_organisasi.required' => 'Field nama wajib diisi',
        //     'email.required' => 'Field email wajib diisi',
        //     'no_hp.required' => 'Field nomor hp wajib diisi',
        //     'deskripsi_kebutuhan.required' => 'Field deskripsi kebutuhan wajib diisi',
        // ]);

        // $data = [
        //     'nama_organisasi' => $request->nama_organisasi,
        //     'email' => $request->email,
        //     'telepon' => $request->telepon,
        // ];

        // Redirect atau berikan respons sesuai kebutuhan Anda
        return redirect()->to('peserta/konsultasi/create')->with('success', 'Terima Kasih Telah Mendaftar Pelatihan Konsultasi. Pelatihan Anda Segera Diproses');
    }

    public function getProvinsi($negaraId)
    {
        try {
            $provinsiList = Provinsi::where('id_negara', $negaraId)->pluck('nama_provinsi', 'id')->toArray();

            return response()->json(['provinsi' => $provinsiList], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function getKabupaten($provinsiId)
    {
        try {
            $kabupatenList = kabupaten_kota::where('id_provinsi', $provinsiId)->pluck('nama_kabupaten_kota', 'id')->toArray();

            return response()->json(['kabupaten' => $kabupatenList], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(konsultasi $konsultasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(konsultasi $konsultasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, konsultasi $konsultasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(konsultasi $konsultasi)
    {
        //
    }
}
