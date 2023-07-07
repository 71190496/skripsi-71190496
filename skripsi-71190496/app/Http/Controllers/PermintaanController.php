<?php

namespace App\Http\Controllers;

use App\Models\permintaan;
use App\Models\kabupaten_kota;
use App\Models\peserta_pelatihan_test;
use App\Models\provinsi;
use App\Models\negara;
use App\Models\informasi_pelatihan;
use App\Models\rentang_usia;
use App\Models\gender;
use App\Models\jenis_organisasi;
use App\Models\pelatihan_test;
use App\Models\pelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermintaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = pelatihan::orderBy('id')->get();
        return view('peserta.permintaan.index',[
            'title' => 'Pelatihan Permintaan'
        ])->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peserta.permintaan.create', [
            'title' => 'Pelatihan Permintaan',
            'jenis_organisasi' => jenis_organisasi::all(),
            'informasi_pelatihan' => informasi_pelatihan::all(),
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
        $request->validate([
            'nama_peserta' => 'required',
            'email_peserta' => 'required',
            'no_hp' => 'required',
            'nama_organisasi' => 'required',
            'jabatan_peserta' => 'required',
            'harapan_pelatihan' => 'required'
        ],[
            'nama_peserta.required' => 'Field nama wajib diisi',
            'email_peserta.required' => 'Field email wajib diisi',
            'no_hp.required' => 'Field nomor hp wajib diisi',
            'nama_organisasi.required' => 'Field nama organisasi wajib diisi',
            'jabatan_peserta.required' => 'Field jabatan wajib diisi',
            'harapan_pelatihan.required' => 'Field harapan pelatihan wajib diisi'
        ]);
        $data = [
            'id_gender' => $request->id_gender,
            'id_rentang_usia' => $request->id_rentang_usia,
            'id_kabupaten' => $request->id_kabupaten,
            'id_provinsi' => $request->id_provinsi,
            'id_negara' => $request->id_negara,
            'id_organisasi' => $request->id_organisasi,
            'id_informasi' => $request->id_informasi,
            'nama_peserta' => $request->nama_peserta,
            'email_peserta' => $request->email_peserta,
            'no_hp' => $request->no_hp,
            'nama_organisasi' => $request->nama_organisasi,
            'jabatan_peserta' => $request->jabatan_peserta,
            'pelatihan_relevan' => $request->pelatihan_relevan,
            'harapan_pelatihan' => $request->harapan_pelatihan
        ];

        // dd($data);
        peserta_pelatihan_test::create($data);
        return redirect()->to('peserta/pelatihan')->with('success','Berhasil mendaftar');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = Auth::user()->id;
        dd($user);
        // $data = pelatihan::where('id',$id)->get();
        // // return $pelatihan_test;
        // return  view('peserta.permintaan.show', compact('data'),[
        //     'title' => 'Pelatihan Permintaan'
        // ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(permintaan $permintaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, permintaan $permintaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(permintaan $permintaan)
    {
        //
    }
}
