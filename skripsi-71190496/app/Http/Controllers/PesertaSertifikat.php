<?php

namespace App\Http\Controllers;

use App\Models\pelatihan;
use App\Models\permintaan_pelatihan;
use App\Models\permintaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PesertaSertifikat extends Controller
{
    public function show($id)
    {
        $pelatihan = pelatihan::find($id);
        $data  = pelatihan::where('id_pelatihan', $id)->get();
        $permintaans = permintaan_pelatihan::where('id', $id)->get();
        $kembali = route('peserta.pelatihan.show', ['id' => $id]);
        $studi = route('peserta.studidampak.create', ['id' => $id]);
        $hadir = route('peserta.daftarhadir.create', ['id' => $id]);
        $evaluasi = route('peserta.evaluasi.create', ['id' => $id]);
        $survey = route('peserta.surveykepuasan.create', ['id' => $id]);
        $sertifikat = route('peserta.sertifikat.show', ['id' => $id]);
        return view('peserta.sertifikat.show', compact('pelatihan', 'data', 'kembali', 'studi', 'hadir', 'evaluasi', 'survey', 'permintaans', 'sertifikat'), [
            'title' => 'Sertifikat',
        ]);
    }
}
