<?php

namespace App\Http\Controllers;

use App\Models\negara;
use App\Models\Survey;
use App\Models\evaluasi;
use App\Models\form_survey_reguler;
use App\Models\form_survey_permintaan;
use App\Models\form_survey_konsultasi;
use App\Models\survey_pelatihan_reguler;
use App\Models\survey_pelatihan_permintaan;
use App\Models\survey_pelatihan_konsultasi;
use App\Models\provinsi;
use App\Models\pelatihan;
use Illuminate\Http\Request;
use App\Models\kabupaten_kota;
use App\Models\konsultasi;
use App\Models\permintaan_pelatihan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PesertaSurveyKepuasan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('peserta.surveykepuasan.index');
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
        // dd($id_konsultasi);

        // Tentukan tipe data dan proses sesuai kebutuhan
        if ($id_pelatihan !== null) {
            $kembali = route('peserta.pelatihan.show', ['id' => $id]);
            $studi = route('peserta.studidampak.create', ['id' => $id]);
            $hadir = route('peserta.daftarhadir.create', ['id' => $id]);
            $evaluasi = route('peserta.evaluasi.create', ['id' => $id]);
            $survey = route('peserta.surveykepuasan.create', ['id' => $id]);
            $sertifikat = route('peserta.sertifikat.show', ['id' => $id]);
            // Get all facilitators related to the pelatihan


            $formpelatihan = form_survey_reguler::where('id_pelatihan', $id_pelatihan)->first();
            // dd($formpelatihan);
            if ($formpelatihan) {
                // Mendapatkan content dari objek form_evaluasi_permintaan
                $formData = $formpelatihan->content;

                //cek user sudah pernah mengisi form
                $user_id = Auth::id();
                $hasFilledForm = survey_pelatihan_reguler::where('id_pelatihan', $id_pelatihan)
                    ->where('id_user', $user_id)
                    ->exists();

                return view('peserta.surveykepuasan.create', compact('hasFilledForm', 'id_konsultasi', 'id_permintaan', 'id_pelatihan', 'kembali', 'studi', 'hadir', 'evaluasi', 'survey', 'sertifikat'), [
                    'permintaan' => $permintaan,
                    'title' => 'Form Survey Kepuasan',
                    'formData' => $formData,
                    'negara' => negara::all(),
                    'kabupaten_kota' => kabupaten_kota::all(),
                    'provinsi' => provinsi::all()
                ]);
            } else {
                // Set formData to null if formpelatihan is null
                $formData = null;
                return view('peserta.surveykepuasan.create', compact('id_konsultasi', 'id_permintaan', 'id_pelatihan', 'kembali', 'studi', 'hadir', 'evaluasi', 'survey', 'sertifikat'), [
                    'permintaan' => $permintaan,
                    'title' => 'Form Evaluasi Pelatihan',
                    'formData' => $formData,
                    'negara' => negara::all(),
                    'kabupaten_kota' => kabupaten_kota::all(),
                    'provinsi' => provinsi::all()
                ]);
            }
        } elseif ($id_permintaan !== null) {
            $kembali = route('peserta.pelatihan.show', ['id' => $id]);
            $studi = route('peserta.studidampak.create', ['id' => $id]);
            $hadir = route('peserta.daftarhadir.create', ['id' => $id]);
            $evaluasi = route('peserta.evaluasi.create', ['id' => $id]);
            $survey = route('peserta.surveykepuasan.create', ['id' => $id]);
            $sertifikat = route('peserta.sertifikat.show', ['id' => $id]);
            $formpermintaan = form_survey_permintaan::where('id_permintaan', $id_permintaan)->first();
            if ($formpermintaan) {
                // Mendapatkan content dari objek form_evaluasi_permintaan
                $formData = $formpermintaan->content;

                //cek user sudah pernah mengisi form 
                $user_id = Auth::id();
                $hasFilledForm = survey_pelatihan_permintaan::where('id_permintaan', $id_permintaan)
                    ->where('id_user', $user_id)
                    ->exists();

                return view('peserta.surveykepuasan.create', compact('hasFilledForm', 'id_konsultasi', 'id_permintaan', 'id_pelatihan', 'kembali', 'studi', 'hadir', 'evaluasi', 'survey', 'sertifikat'), [
                    'permintaan' => $permintaan,
                    'title' => 'Form Evaluasi Pelatihan',
                    'formData' => $formData,
                    'negara' => negara::all(),
                    'kabupaten_kota' => kabupaten_kota::all(),
                    'provinsi' => provinsi::all()
                ]);
            } else {
                // Set formData to null if formpelatihan is null
                $formData = null;
                return view('peserta.surveykepuasan.create', compact('id_konsultasi', 'id_permintaan', 'id_pelatihan', 'kembali', 'studi', 'hadir', 'evaluasi', 'survey', 'sertifikat'), [
                    'permintaan' => $permintaan,
                    'title' => 'Form Evaluasi Pelatihan',
                    'formData' => $formData,
                    'negara' => negara::all(),
                    'kabupaten_kota' => kabupaten_kota::all(),
                    'provinsi' => provinsi::all()
                ]);
            }
        } elseif ($id_konsultasi !== null) {
            $kembali = route('peserta.pelatihan.show', ['id' => $id]);
            $studi = route('peserta.studidampak.create', ['id' => $id]);
            $hadir = route('peserta.daftarhadir.create', ['id' => $id]);
            $evaluasi = route('peserta.evaluasi.create', ['id' => $id]);
            $survey = route('peserta.surveykepuasan.create', ['id' => $id]);
            $sertifikat = route('peserta.sertifikat.show', ['id' => $id]);
            $formkonsultasi = form_survey_konsultasi::where('id_konsultasi', $id_konsultasi)->first();

            if ($formkonsultasi) {
                // Mendapatkan content dari objek form_evaluasi_konsultasi
                $formData = $formkonsultasi->content;

                //cek user sudah pernah mengisi form 
                $user_id = Auth::id();
                $hasFilledForm = survey_pelatihan_konsultasi::where('id_konsultasi', $id_konsultasi)
                    ->where('id_user', $user_id)
                    ->exists();

                return view('peserta.surveykepuasan.create', compact('hasFilledForm', 'id_konsultasi', 'id_permintaan', 'id_pelatihan', 'id_konsultasi', 'kembali', 'studi', 'hadir', 'evaluasi', 'survey', 'sertifikat'), [
                    'permintaan' => $permintaan,
                    'title' => 'Form Evaluasi Pelatihan',
                    'formData' => $formData,
                    'negara' => negara::all(),
                    'kabupaten_kota' => kabupaten_kota::all(),
                    'provinsi' => provinsi::all()
                ]);
            } else {
                // Set formData to null if formpelatihan is null
                $formData = null;
                return view('peserta.surveykepuasan.create', compact('id_konsultasi', 'id_konsultasi', 'id_permintaan', 'id_pelatihan', 'kembali', 'studi', 'hadir', 'evaluasi', 'survey', 'sertifikat'), [
                    'permintaan' => $permintaan,
                    'title' => 'Form Evaluasi Pelatihan',
                    'formData' => $formData,
                    'negara' => negara::all(),
                    'kabupaten_kota' => kabupaten_kota::all(),
                    'provinsi' => provinsi::all()
                ]);
            }
        } else {
            // Tangani kasus di mana tidak ditemukan pelatihan atau permintaan
            // Anda bisa menampilkan pesan kesalahan atau melakukan tindakan lain sesuai kebutuhan
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
            $evaluasi_reguler = new survey_pelatihan_reguler();
            $evaluasi_reguler->id_pelatihan = $request->id_pelatihan;
            $evaluasi_reguler->id_provinsi = $request->id_provinsi;
            $evaluasi_reguler->id_kabupaten_kota = $request->id_kabupaten;
            $evaluasi_reguler->id_user = Auth::id();
            $evaluasi_reguler->data_respons = $request->data_respons;
            // dd($evaluasi_reguler);
            $evaluasi_reguler->save();
            return redirect()->route('peserta.surveykepuasan.create', ['id' => $request->id_pelatihan])->with('success', 'Terima Kasih Telah Mengisi Survey Kepuasan Pelatihan');
        } elseif ($formSource === 'permintaan') {
            $evaluasi_permintaan = new survey_pelatihan_permintaan();
            $evaluasi_permintaan->id_permintaan = $request->id_permintaan;
            $evaluasi_permintaan->id_provinsi = $request->id_provinsi;
            $evaluasi_permintaan->id_kabupaten_kota = $request->id_kabupaten;
            $evaluasi_permintaan->id_user = Auth::id();
            $evaluasi_permintaan->data_respons = $request->data_respons;
            // dd($evaluasi_permintaan);
            $evaluasi_permintaan->save();
            return redirect()->route('peserta.surveykepuasan.create', ['id' => $request->id_permintaan])->with('success', 'Terima Kasih Telah Mengisi Survey Kepuasan Pelatihan');
        } elseif ($formSource === 'konsultasi') {
            $evaluasi_konsultasi = new survey_pelatihan_konsultasi();
            $evaluasi_konsultasi->id_konsultasi = $request->id_konsultasi;
            $evaluasi_konsultasi->id_provinsi = $request->id_provinsi;
            $evaluasi_konsultasi->id_kabupaten_kota = $request->id_kabupaten;
            $evaluasi_konsultasi->id_user = Auth::id();
            $evaluasi_konsultasi->data_respons = $request->data_respons;
            // dd($evaluasi_konsultasi);
            $evaluasi_konsultasi->save();
            return redirect()->route('peserta.surveykepuasan.create', ['id' => $request->id_konsultasi])->with('success', 'Terima Kasih Telah Mengisi Survey Kepuasan Pelatihan');
        } else {
            // Penanganan kesalahan jika diperlukan
        }
    }

    public function getProvinsi($negaraId = null)
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
    public function show(Survey $survey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Survey $survey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Survey $survey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Survey $survey)
    {
        //
    }
}
