<?php

namespace App\Http\Controllers;

use App\Models\form;
use App\Models\pelatihan;
use App\Models\konsultasi;
use Illuminate\Http\Request;
use App\Models\PesertaStudiDampak;
use App\Models\permintaan_pelatihan;
use Illuminate\Support\Facades\Auth;
use App\Models\form_studidampak_reguler;
use Illuminate\Support\Facades\Redirect;
use App\Models\form_studidampak_konsultasi;
use App\Models\form_studidampak_permintaan;
use App\Models\studidampak_pelatihan_reguler;
use App\Models\studidampak_pelatihan_konsultasi;
use App\Models\studidampak_pelatihan_permintaan;

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
        $konsultasi = konsultasi::where('id', $id)->first();

        // Persiapkan data
        $jsonData = [];

        if ($pelatihan) {
            $jsonData['pelatihan'] = $pelatihan;
        }

        if ($permintaan) {
            $jsonData['permintaan'] = $permintaan;
        }

        if ($konsultasi) {
            $jsonData['konsultasi'] = $konsultasi;
        }

        $jsonString = json_encode($jsonData);
        $dataArray = json_decode($jsonString, true);

        // Inisialisasi variabel id untuk pelatihan dan permintaan
        $id_pelatihan = null;
        $id_permintaan = null;
        $id_konsultasi = null;

        // Periksa apakah data yang ditemukan adalah pelatihan atau permintaan atau konsultasi
        if (isset($dataArray['pelatihan'])) {
            // Jika data yang ditemukan adalah data pelatihan
            $id_pelatihan = $dataArray['pelatihan']['id_pelatihan'];
        } elseif (isset($dataArray['permintaan'])) {
            // Jika data yang ditemukan adalah data permintaan
            $id_permintaan = $dataArray['permintaan']['id'];
        } elseif (isset($dataArray['konsultasi'])) {
            // Jika data yang ditemukan adalah data konsultasi
            $id_konsultasi = $dataArray['konsultasi']['id'];
        }

        // Tentukan tipe data dan proses sesuai kebutuhan
        if ($id_pelatihan !== null) {
            $kembali = route('peserta.pelatihan.show', ['id' => $id]);
            $studi = route('peserta.studidampak.create', ['id' => $id]);
            $hadir = route('peserta.daftarhadir.create', ['id' => $id]);
            $evaluasi = route('peserta.evaluasi.create', ['id' => $id]);
            $survey = route('peserta.surveykepuasan.create', ['id' => $id]);
            $sertifikat = route('peserta.sertifikat.show', ['id' => $id]);

            $formpelatihan = form_studidampak_reguler::where('id_pelatihan', $id_pelatihan)->first();
            
            if ($formpelatihan) {
                // Mendapatkan content dari objek form_evaluasi_permintaan
                $formData = $formpelatihan->content;

                //cek user sudah pernah mengisi form 
                $user_id = Auth::id();
                $hasFilledForm = studidampak_pelatihan_reguler::where('id_pelatihan', $id_pelatihan)
                ->where('id_user', $user_id)
                ->exists();

                return view('peserta.studidampak.create', compact('hasFilledForm', 'id_konsultasi','id_permintaan', 'id_pelatihan', 'kembali', 'studi', 'hadir', 'evaluasi', 'survey', 'sertifikat'), [
                    'permintaan' => $permintaan,
                    'title' => 'Form Studi Dampak',
                    'formData' => $formData
                ]);
            } else {
                // Set formData to null if formpelatihan is null
                $formData = null;
                return view('peserta.studidampak.create', compact('id_konsultasi', 'id_permintaan', 'id_pelatihan', 'kembali', 'studi', 'hadir', 'evaluasi', 'survey', 'sertifikat'), [
                    'permintaan' => $permintaan,
                    'title' => 'Form Evaluasi Pelatihan',
                    'formData' => $formData
                ]);
            }
        } elseif ($id_permintaan !== null) {
            $kembali = route('peserta.pelatihan.show', ['id' => $id]);
            $studi = route('peserta.studidampak.create', ['id' => $id]);
            $hadir = route('peserta.daftarhadir.create', ['id' => $id]);
            $evaluasi = route('peserta.evaluasi.create', ['id' => $id]);
            $survey = route('peserta.surveykepuasan.create', ['id' => $id]);
            $sertifikat = route('peserta.sertifikat.show', ['id' => $id]);
            $formpermintaan = form_studidampak_permintaan::where('id_permintaan', $id_permintaan)->first();
            if ($formpermintaan) {
                // Mendapatkan content dari objek form_evaluasi_permintaan
                $formData = $formpermintaan->content;

                //cek user sudah pernah mengisi form 
                $user_id = Auth::id();
                $hasFilledForm = studidampak_pelatihan_permintaan::where('id_permintaan', $id_permintaan)
                ->where('id_user', $user_id)
                ->exists();

                return view('peserta.studidampak.create', compact('hasFilledForm','id_konsultasi','id_permintaan', 'id_pelatihan', 'kembali', 'studi', 'hadir', 'evaluasi', 'survey', 'sertifikat'), [
                    'permintaan' => $permintaan,
                    'title' => 'Form Evaluasi Pelatihan',
                    'formData' => $formData,
                ]);
            } else {
                // Set formData to null if formpelatihan is null
                $formData = null;
                return view('peserta.studidampak.create', compact('id_konsultasi','id_permintaan', 'id_pelatihan', 'kembali', 'studi', 'hadir', 'evaluasi', 'survey', 'sertifikat'), [
                    'permintaan' => $permintaan,
                    'title' => 'Form Evaluasi Pelatihan',
                    'formData' => $formData,
                ]);
            }
        } elseif ($id_konsultasi !== null) {
            $kembali = route('peserta.pelatihan.show', ['id' => $id]);
            $studi = route('peserta.studidampak.create', ['id' => $id]);
            $hadir = route('peserta.daftarhadir.create', ['id' => $id]);
            $evaluasi = route('peserta.evaluasi.create', ['id' => $id]);
            $survey = route('peserta.surveykepuasan.create', ['id' => $id]);
            $sertifikat = route('peserta.sertifikat.show', ['id' => $id]);
            $formkonsultasi = form_studidampak_konsultasi::where('id_konsultasi', $id_konsultasi)->first();
            if ($formkonsultasi) {
                // Mendapatkan content dari objek form_evaluasi_konsultasi
                $formData = $formkonsultasi->content;

                //cek user sudah pernah mengisi form 
                $user_id = Auth::id();
                $hasFilledForm = studidampak_pelatihan_konsultasi::where('id_konsultasi', $id_konsultasi)
                ->where('id_user', $user_id)
                ->exists();

                return view('peserta.studidampak.create', compact('hasFilledForm','id_konsultasi', 'id_pelatihan', 'id_permintaan','kembali', 'studi', 'hadir', 'evaluasi', 'survey', 'sertifikat'), [
                    'permintaan' => $permintaan,
                    'title' => 'Form Evaluasi Pelatihan',
                    'formData' => $formData,
                ]);
            } else {
                // Set formData to null if formpelatihan is null
                $formData = null;
                return view('peserta.studidampak.create', compact('id_konsultasi','id_permintaan', 'id_pelatihan', 'kembali', 'studi', 'hadir', 'evaluasi', 'survey', 'sertifikat'), [
                    'permintaan' => $permintaan,
                    'title' => 'Form Evaluasi Pelatihan',
                    'formData' => $formData,
                ]);
            }
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
        // dd($request->all());
        $formSource = $request->input('form_source');
        if ($formSource === 'pelatihan') {
            // Proses data dari formulir pelatihan
            $evaluasi_reguler = new studidampak_pelatihan_reguler();
            $evaluasi_reguler->id_pelatihan = $request->id_pelatihan;
            $evaluasi_reguler->id_user = Auth::id();
            $evaluasi_reguler->data_respons = $request->data_respons;
            // dd($evaluasi_reguler);
            $evaluasi_reguler->save();
            return redirect()->route('peserta.studidampak.create', ['id' => $request->id_pelatihan])->with('success', 'Terima Kasih Telah Mengisi Studi Dampak Pelatihan');
        } elseif ($formSource === 'permintaan') {
            $evaluasi_permintaan = new studidampak_pelatihan_permintaan();
            $evaluasi_permintaan->id_permintaan = $request->id_permintaan;
            $evaluasi_permintaan->id_user = Auth::id();
            $evaluasi_permintaan->data_respons = $request->data_respons;
            // dd($evaluasi_permintaan);
            $evaluasi_permintaan->save();
            return redirect()->route('peserta.studidampak.create', ['id' => $request->id_permintaan])->with('success', 'Terima Kasih Telah Mengisi Studi Dampak Pelatihan');
        } elseif ($formSource === 'konsultasi') {
            $evaluasi_konsultasi = new studidampak_pelatihan_konsultasi();
            $evaluasi_konsultasi->id_konsultasi = $request->id_konsultasi;
            $evaluasi_konsultasi->id_user = Auth::id();
            $evaluasi_konsultasi->data_respons = $request->data_respons;
            // dd($evaluasi_konsultasi);
            $evaluasi_konsultasi->save();
            return redirect()->route('peserta.studidampak.create', ['id' => $request->id_konsultasi])->with('success', 'Terima Kasih Telah Mengisi Studi Dampak Pelatihan');
        } else {
            // Penanganan kesalahan jika diperlukan
        }
        // $request->validate([
        //     'topik_pekerjaan' => 'required',
        //     'topik_kinerja' => 'required',
        //     'topik_sulit' => 'required',
        //     'topik_tidak_relevan' => 'required',
        //     'rekomendasi_pelatihan' => 'required',
        //     'pelatihan_yang_diperlukan' => 'required',
        // ], [
        //     'topik_pekerjaan.required' => 'Field ini wajib diisi',
        //     'topik_kinerja.required' => 'Field ini wajib diisi',
        //     'topik_sulit.required' => 'Field ini wajib diisi',
        //     'topik_tidak_relevan.required' => 'Field ini wajib diisi',
        //     'rekomendasi_pelatihan.required' => 'Field ini wajib diisi',
        //     'pelatihan_yang_diperlukan' => 'Field ini wajib diisi',
        // ]);
        // $data = [
        //     'id_user' => Auth::user()->id,
        //     'id_pelatihan' => $request->id_pelatihan,
        //     'perubahan_posisi' => $request->perubahan_posisi,
        //     'posisi_sebelum' => $request->posisi_sebelum,
        //     'posisi_sesudah' => $request->posisi_sesudah,
        //     'topik_pekerjaan' => $request->topik_pekerjaan,
        //     'topik_kinerja' => $request->topik_kinerja,
        //     'topik_sulit' => $request->topik_sulit,
        //     'topik_tidak_relevan' => $request->topik_tidak_relevan,
        //     'rekomendasi_pelatihan' => $request->rekomendasi_pelatihan,
        //     'pelatihan_yang_diperlukan' => $request->pelatihan_yang_diperlukan,
        // ];
        // dd($data);
        // PesertaStudiDampak::create($data);
        // $id_pelatihan = $request->id_pelatihan;
        // return Redirect::route('peserta.pelatihan.show', ['id' => $id_pelatihan])->with('success', 'Berhasil mengisi studi dampak pelatihan');
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
