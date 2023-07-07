<?php

namespace App\Http\Controllers;

use App\Models\pelatihan;
use App\Models\jenis_organisasi;
use App\Models\informasi_pelatihan;
use App\Models\kabupaten_kota;
use App\Models\provinsi;
use App\Models\negara;
use App\Models\rentang_usia;
use App\Models\gender;
use App\Models\pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function __invoke($id)
    {
        $pelatihan = Pelatihan::findOrFail($id)->get();
        $data = [
            'title' => 'Daftar Pelatihan',
            'jenis_organisasi' => Jenis_Organisasi::all(),
            'informasi_pelatihan' => Informasi_Pelatihan::all(),
            'kabupaten_kota' => Kabupaten_Kota::all(),
            'provinsi' => Provinsi::all(),
            'negara' => Negara::all(),
            'rentang_usia' => Rentang_Usia::all(),
            'gender' => Gender::all(),
            'id_pelatihan' => $pelatihan->id,
            'pelatihan' => $pelatihan
        ];
        return view('peserta.reguler.create', $data);
    }


    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nama_peserta' => 'required',
    //         'email_peserta' => 'required',
    //         'no_hp' => 'required',
    //         'nama_organisasi' => 'required',
    //         'jabatan_peserta' => 'required',
    //         'harapan_pelatihan' => 'required'
    //     ],[
    //         'nama_peserta.required' => 'Field nama wajib diisi',
    //         'email_peserta.required' => 'Field email wajib diisi',
    //         'no_hp.required' => 'Field nomor hp wajib diisi',
    //         'nama_organisasi.required' => 'Field nama organisasi wajib diisi',
    //         'jabatan_peserta.required' => 'Field jabatan wajib diisi',
    //         'harapan_pelatihan.required' => 'Field harapan pelatihan wajib diisi'
    //     ]);
    //     $data = [
    //         'id_pelatihan' => $request->id_pelatihan,
    //         'id_gender' => $request->id_gender,
    //         'id_rentang_usia' => $request->id_rentang_usia,
    //         'id_kabupaten' => $request->id_kabupaten,
    //         'id_provinsi' => $request->id_provinsi,
    //         'id_negara' => $request->id_negara,
    //         'id_organisasi' => $request->id_organisasi,
    //         'id_informasi' => $request->id_informasi,
    //         'nama_peserta' => $request->nama_peserta,
    //         'email_peserta' => $request->email_peserta,
    //         'no_hp' => $request->no_hp,
    //         'nama_organisasi' => $request->nama_organisasi,
    //         'jabatan_peserta' => $request->jabatan_peserta,
    //         'pelatihan_relevan' => $request->pelatihan_relevan,
    //         'harapan_pelatihan' => $request->harapan_pelatihan
    //     ];


    //     dd($data);
    //     // peserta_pelatihan_test::create($data);
    //     // return redirect()->to('peserta/pelatihan')->with('success','Berhasil mendaftar');
    // }
}
