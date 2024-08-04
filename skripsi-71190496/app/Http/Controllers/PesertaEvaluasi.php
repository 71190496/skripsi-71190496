<?php

namespace App\Http\Controllers;

use App\Models\evaluasi;
use App\Models\pelatihan;
use App\Models\konsultasi;
use App\Models\permintaan;
use App\Models\evalPeserta;
use App\Models\fasilitator;
use Illuminate\Http\Request;
use App\Models\evaluasi_bridge;
use App\Models\evaluasi_materi;
use App\Models\evaluasi_jawaban;
use App\Models\evaluasi_pelatihan_konsultasi;
use App\Models\evaluasi_pertanyaan;
use App\Models\permintaan_pelatihan;
use Illuminate\Support\Facades\Auth;
use App\Models\pelatihan_fasilitator;
use App\Models\form_evaluasi_pelatihan;
use App\Models\form_evaluasi_permintaan;
use App\Models\evaluasi_pelatihan_reguler;
use App\Models\evaluasi_pelatihan_permintaan;
use App\Models\form_evaluasi_konsultasi;
use Illuminate\Pagination\LengthAwarePaginator;

class PesertaEvaluasi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('peserta.evaluasi.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        // Ambil data berdasarkan $id
        $pelatihan = pelatihan::with('fasilitator_pelatihan')->where('id_pelatihan', '=', $id)->first();
        $permintaan = permintaan::where('id', $id)->first();
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

        // Periksa apakah data yang ditemukan adalah pelatihan atau permintaan
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
            // Get all facilitators related to the pelatihan
            $fasilitators = pelatihan_fasilitator::where('id_pelatihan', $id_pelatihan)
                ->with('fasilitator_pelatihan')
                ->get();

            $formpelatihan = form_evaluasi_pelatihan::where('id_pelatihan', $id_pelatihan)->first();
            if ($formpelatihan) {
                // Mendapatkan content dari objek form_evaluasi_permintaan
                $formData = $formpelatihan->content;

                //cek user sudah pernah mengisi form
                $user_id = Auth::id();
                $hasFilledForm = evaluasi_pelatihan_reguler::where('id_pelatihan', $id_pelatihan)
                ->where('id_user', $user_id)
                ->exists();

                return view('peserta.evaluasi.create', compact('id_permintaan', 'id_pelatihan', 'kembali', 'studi', 'hadir', 'evaluasi', 'survey', 'fasilitators', 'sertifikat', 'id_konsultasi', 'hasFilledForm'), [
                    'permintaan' => $permintaan,
                    'title' => 'Form Evaluasi Pelatihan',
                    'formData' => $formData
                ]);
            } else {
                // Set formData to null if formpelatihan is null
                $formData = null;
                return view('peserta.evaluasi.create', compact('id_konsultasi', 'id_permintaan', 'id_pelatihan', 'kembali', 'studi', 'hadir', 'evaluasi', 'survey', 'fasilitators', 'sertifikat'), [
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
            $fasilitators = pelatihan_fasilitator::where('id_pelatihan', $id_permintaan)
                ->with('fasilitator_pelatihan')
                ->get();

            $formpermintaan = form_evaluasi_permintaan::where('id_permintaan', $id_permintaan)->first();
            if ($formpermintaan) {
                // Mendapatkan content dari objek form_evaluasi_permintaan
                $formData = $formpermintaan->content;

                //cek user sudah pernah mengisi form 
                $user_id = Auth::id();
                $hasFilledForm = evaluasi_pelatihan_permintaan::where('id_permintaan', $id_permintaan)
                ->where('id_user', $user_id)
                ->exists();

                return view('peserta.evaluasi.create', compact('id_konsultasi','hasFilledForm', 'id_permintaan', 'id_pelatihan', 'kembali', 'studi', 'hadir', 'evaluasi', 'survey', 'fasilitators', 'sertifikat'), [
                    'permintaan' => $permintaan,
                    'title' => 'Form Evaluasi Pelatihan',
                    'formData' => $formData
                ]);
            } else {
                // Set formData to null if formpelatihan is null
                $formData = null;
                return view('peserta.evaluasi.create', compact('id_konsultasi', 'id_permintaan', 'id_pelatihan', 'kembali', 'studi', 'hadir', 'evaluasi', 'survey', 'fasilitators', 'sertifikat'), [
                    'permintaan' => $permintaan,
                    'title' => 'Form Evaluasi Pelatihan',
                    'formData' => $formData
                ]);
            }
        } elseif ($id_konsultasi !== null) {
            $kembali = route('peserta.pelatihan.show', ['id' => $id]);
            $studi = route('peserta.studidampak.create', ['id' => $id]);
            $hadir = route('peserta.daftarhadir.create', ['id' => $id]);
            $evaluasi = route('peserta.evaluasi.create', ['id' => $id]);
            $survey = route('peserta.surveykepuasan.create', ['id' => $id]);
            $sertifikat = route('peserta.sertifikat.show', ['id' => $id]);
            $fasilitators = pelatihan_fasilitator::where('id_pelatihan', $id_permintaan)
                ->with('fasilitator_pelatihan')
                ->get();

            $formkonsultasi = form_evaluasi_konsultasi::where('id_konsultasi', $id_konsultasi)->first();
            if ($formkonsultasi) {
                // Mendapatkan content dari objek form_evaluasi_konsultasi
                $formData = $formkonsultasi->content;

                //cek user sudah pernah mengisi form 
                $user_id = Auth::id();
                $hasFilledForm = evaluasi_pelatihan_konsultasi::where('id_konsultasi', $id_konsultasi)
                ->where('id_user', $user_id)
                ->exists();

                return view('peserta.evaluasi.create', compact('id_konsultasi', 'hasFilledForm','id_pelatihan', 'id_permintaan', 'kembali', 'studi', 'hadir', 'evaluasi', 'survey', 'fasilitators', 'sertifikat'), [
                    'permintaan' => $permintaan,
                    'title' => 'Form Evaluasi Pelatihan',
                    'formData' => $formData
                ]);
            } else {
                // Set formData to null if formpelatihan is null
                $formData = null;
                return view('peserta.evaluasi.create', compact('id_konsultasi', 'id_pelatihan', 'id_permintaan', 'kembali', 'studi', 'hadir', 'evaluasi', 'survey', 'fasilitators', 'sertifikat'), [
                    'permintaan' => $permintaan,
                    'title' => 'Form Evaluasi Pelatihan',
                    'formData' => $formData
                ]);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formSource = $request->input('form_source');
        if ($formSource === 'pelatihan') {
            // Proses data dari formulir pelatihan
            $evaluasi_reguler = new evaluasi_pelatihan_reguler();
            $evaluasi_reguler->id_pelatihan = $request->id_pelatihan;
            $evaluasi_reguler->id_user = Auth::id();
            $evaluasi_reguler->data_respons = $request->data_respons;
            $evaluasi_reguler->save();
            return redirect()->route('peserta.evaluasi.create', ['id' => $request->id_pelatihan])->with('success', 'Terima Kasih Telah Mengisi Evaluasi Pelatihan');
        } elseif ($formSource === 'permintaan') {
            $evaluasi_permintaan = new evaluasi_pelatihan_permintaan();
            $evaluasi_permintaan->id_permintaan = $request->id_permintaan;
            $evaluasi_permintaan->id_user = Auth::id();
            $evaluasi_permintaan->data_respons = $request->data_respons;
            $evaluasi_permintaan->save();
            return redirect()->route('peserta.evaluasi.create', ['id' => $request->id_permintaan])->with('success', 'Terima Kasih Telah Mengisi Evaluasi Pelatihan');
        } elseif ($formSource === 'konsultasi') {
            $evaluasi_konsultasi = new evaluasi_pelatihan_konsultasi();
            $evaluasi_konsultasi->id_konsultasi = $request->id_konsultasi;
            $evaluasi_konsultasi->id_user = Auth::id();
            $evaluasi_konsultasi->data_respons = $request->data_respons;
            $evaluasi_konsultasi->save();
            return redirect()->route('peserta.evaluasi.create', ['id' => $request->id_konsultasi])->with('success', 'Terima Kasih Telah Mengisi Evaluasi Pelatihan');
        } else {
            // Penanganan kesalahan jika diperlukan
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(evalPeserta $evalPeserta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(evalPeserta $evalPeserta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, evalPeserta $evalPeserta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(evalPeserta $evalPeserta)
    {
        //
    }
}
