<?php

namespace App\Http\Controllers;

use App\Models\PesertaStudiDampak;
use App\Models\pelatihan;
use App\Models\permintaan_pelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PesertaStudi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('peserta.studidampak.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        // Ambil data berdasarkan $id
        $pelatihan = pelatihan::with('fasilitator_pelatihan')->where('id_pelatihan', '=', $id)->first();
        $permintaan = permintaan_pelatihan::where('id', $id)->first();

        // Persiapkan data
        $jsonData = [];

        if ($pelatihan) {
            $jsonData['pelatihan'] = $pelatihan;
        }

        if ($permintaan) {
            $jsonData['permintaan'] = $permintaan;
        }

        $jsonString = json_encode($jsonData);
        $dataArray = json_decode($jsonString, true);

        // Inisialisasi variabel id untuk pelatihan dan permintaan
        $id_pelatihan = null;
        $id_permintaan = null;

        // Periksa apakah data yang ditemukan adalah pelatihan atau permintaan
        if (isset($dataArray['pelatihan'])) {
            // Jika data yang ditemukan adalah data pelatihan
            $id_pelatihan = $dataArray['pelatihan']['id_pelatihan'];
        } elseif (isset($dataArray['permintaan'])) {
            // Jika data yang ditemukan adalah data permintaan
            $id_permintaan = $dataArray['permintaan']['id'];
        }
        // dd($id_permintaan);

        // Tentukan tipe data dan proses sesuai kebutuhan
        if ($id_pelatihan !== null) {
            $kembali = route('peserta.pelatihan.show', ['id' => $id]);
            $studi = route('peserta.studidampak.create', ['id' => $id]);
            $hadir = route('peserta.daftarhadir.create', ['id' => $id]);
            $evaluasi = route('peserta.evaluasi.create', ['id' => $id]);
            $survey = route('peserta.surveykepuasan.create', ['id' => $id]);
            $sertifikat = route('peserta.sertifikat.show', ['id' => $id]);
            // Get all facilitators related to the pelatihan

            return view('peserta.studidampak.create', compact('id_pelatihan', 'kembali', 'studi', 'hadir', 'evaluasi', 'survey', 'sertifikat'), [
                'pelatihan' => $pelatihan,
                'title' => 'Form Studi Dampak'
                // Kirim data tambahan jika diperlukan
            ]);
        } elseif ($id_permintaan !== null) {
            $kembali = route('peserta.pelatihan.show', ['id' => $id]);
            $studi = route('peserta.studidampak.create', ['id' => $id]);
            $hadir = route('peserta.daftarhadir.create', ['id' => $id]);
            $evaluasi = route('peserta.evaluasi.create', ['id' => $id]);
            $survey = route('peserta.surveykepuasan.create', ['id' => $id]);
            $sertifikat = route('peserta.sertifikat.show', ['id' => $id]);
            return view('peserta.studidampak.create', compact('id_pelatihan', 'kembali', 'studi', 'hadir', 'evaluasi', 'survey', 'sertifikat'), [
                'permintaan' => $permintaan,
                'title' => 'Form Studi Dampak'
                // Kirim data tambahan jika diperlukan
            ]);
        } else {
            // Tangani kasus di mana tidak ditemukan pelatihan atau permintaan
            // Anda bisa menampilkan pesan kesalahan atau melakukan tindakan lain sesuai kebutuhan
        }
    }

    // public function create($id)
    // {
    //     $id_pelatihan = pelatihan::where('id_pelatihan', '=', $id)->get();
    //     $jsonString = json_encode($id_pelatihan);
    //     $data = json_decode($jsonString);
    //     $nilai = $data[0]->id_pelatihan;
    //     $kembali = route('peserta.pelatihan.show', ['id' => $id]);
    //     $studi = route('peserta.studidampak.create', ['id' => $id]);
    //     $hadir = route('peserta.daftarhadir.create', ['id' => $id]);
    //     $evaluasi = route('peserta.evaluasi.create', ['id' => $id]);
    //     $survey = route('peserta.surveykepuasan.create', ['id' => $id]);
    //     return view('peserta.studidampak.create', compact('id_pelatihan', 'nilai', 'kembali','studi','hadir','evaluasi','survey'), [
    //         'title' => 'Form Studi Dampak'
    //     ]);
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
        $request->validate([
            'topik_pekerjaan' => 'required',
            'topik_kinerja' => 'required',
            'topik_sulit' => 'required',
            'topik_tidak_relevan' => 'required',
            'rekomendasi_pelatihan' => 'required',
            'pelatihan_yang_diperlukan' => 'required',
        ], [
            'topik_pekerjaan.required' => 'Field ini wajib diisi',
            'topik_kinerja.required' => 'Field ini wajib diisi',
            'topik_sulit.required' => 'Field ini wajib diisi',
            'topik_tidak_relevan.required' => 'Field ini wajib diisi',
            'rekomendasi_pelatihan.required' => 'Field ini wajib diisi',
            'pelatihan_yang_diperlukan' => 'Field ini wajib diisi',
        ]);
        $data = [
            'id_user' => Auth::user()->id,
            'id_pelatihan' => $request->id_pelatihan,
            'perubahan_posisi' => $request->perubahan_posisi,
            'posisi_sebelum' => $request->posisi_sebelum,
            'posisi_sesudah' => $request->posisi_sesudah,
            'topik_pekerjaan' => $request->topik_pekerjaan,
            'topik_kinerja' => $request->topik_kinerja,
            'topik_sulit' => $request->topik_sulit,
            'topik_tidak_relevan' => $request->topik_tidak_relevan,
            'rekomendasi_pelatihan' => $request->rekomendasi_pelatihan,
            'pelatihan_yang_diperlukan' => $request->pelatihan_yang_diperlukan,
        ];
        dd($data);
        PesertaStudiDampak::create($data);
        $id_pelatihan = $request->id_pelatihan;
        return Redirect::route('peserta.pelatihan.show', ['id' => $id_pelatihan])->with('success', 'Berhasil mengisi studi dampak pelatihan');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Studi $studi)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Studi $studi)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Studi $studi)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Studi $studi)
    // {
    //     //
    // }
}
