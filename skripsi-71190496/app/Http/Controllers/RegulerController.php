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

class RegulerController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
       //
    }

    public function create()
    {
        return view('peserta.reguler.create', [
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
}
