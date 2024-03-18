<?php

namespace App\Http\Controllers;

use App\Models\evaluasi;
use App\Models\pelatihan;
use App\Models\evalPeserta;
use App\Models\fasilitator;
use Illuminate\Http\Request;
use App\Models\evaluasi_bridge;
use App\Models\evaluasi_materi;
use App\Models\evaluasi_jawaban;
use App\Models\evaluasi_pertanyaan;
use App\Models\permintaan_pelatihan;
use Illuminate\Support\Facades\Auth;
use App\Models\pelatihan_fasilitator;
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
            $fasilitators = pelatihan_fasilitator::where('id_pelatihan', $id_pelatihan)
                ->with('fasilitator_pelatihan')
                ->get();


            $pertanyaans = evaluasi_pertanyaan::where('id_pelatihan', $id_pelatihan)->get();
            if (!isset($pertanyaanJawaban)) {
                $pertanyaanJawaban = []; // Atau inisialisasi sesuai kebutuhan jika tidak ada data
            }
            // Iterasi melalui pertanyaan yang Anda ambil
            foreach ($pertanyaans as $pertanyaan) {
                // Ambil id_pertanyaan dari pertanyaan saat ini
                $id_pertanyaan = $pertanyaan->id_pertanyaan;

                // Ambil jawaban yang memiliki relasi dengan id_pertanyaan saat ini
                $jawaban = evaluasi_jawaban::where('id_pertanyaan', $id_pertanyaan)->get();
                // dd($jawaban);

                // Tambahkan pertanyaan dan jawaban ke dalam array
                $pertanyaanJawaban[] = [
                    'pertanyaan' => $pertanyaan->pertanyaan,
                    'jawaban' => $jawaban,
                ];
            }

            return view('peserta.evaluasi.create', compact('id_pelatihan', 'kembali', 'studi', 'hadir', 'evaluasi', 'survey', 'fasilitators', 'pertanyaanJawaban', 'sertifikat'), [
                'pelatihan' => $pelatihan,
                'title' => 'Form Evaluasi Pelatihan',
                'pertanyaanJawaban' => $pertanyaanJawaban,
                // Kirim data tambahan jika diperlukan
            ]);
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


            $pertanyaans = evaluasi_pertanyaan::where('id_pelatihan', $id_permintaan)->get();
            if (!isset($pertanyaanJawaban)) {
                $pertanyaanJawaban = []; // Atau inisialisasi sesuai kebutuhan jika tidak ada data
            }
            // Iterasi melalui pertanyaan yang Anda ambil
            foreach ($pertanyaans as $pertanyaan) {
                // Ambil id_pertanyaan dari pertanyaan saat ini
                $id_pertanyaan = $pertanyaan->id_pertanyaan;

                // Ambil jawaban yang memiliki relasi dengan id_pertanyaan saat ini
                $jawaban = evaluasi_jawaban::where('id_pertanyaan', $id_pertanyaan)->get();
                // dd($jawaban);

                // Tambahkan pertanyaan dan jawaban ke dalam array
                $pertanyaanJawaban[] = [
                    'pertanyaan' => $pertanyaan->pertanyaan,
                    'jawaban' => $jawaban,
                ];
            }

            return view('peserta.evaluasi.create', compact('id_pelatihan', 'kembali', 'studi', 'hadir', 'evaluasi', 'survey', 'fasilitators', 'pertanyaanJawaban', 'sertifikat'), [
                'permintaan' => $permintaan,
                'title' => 'Form Evaluasi Pelatihan',
                'pertanyaanJawaban' => $pertanyaanJawaban,
                // Kirim data tambahan jika diperlukan
            ]);
        } else {
            // Tangani kasus di mana tidak ditemukan pelatihan atau permintaan
            // Anda bisa menampilkan pesan kesalahan atau melakukan tindakan lain sesuai kebutuhan
        }
    }

    // public function create($id)
    // {
    //     $id_pelatihan = pelatihan::with('fasilitator_pelatihan')->where('id_pelatihan', '=', $id)->get();
    //     $jsonString = json_encode($id_pelatihan);
    //     $data = json_decode($jsonString);
    // $nilai = $data[0]->id_pelatihan;
    // $kembali = route('peserta.pelatihan.show', ['id' => $id]);
    // $studi = route('peserta.studidampak.create', ['id' => $id]);
    // $hadir = route('peserta.daftarhadir.create', ['id' => $id]);
    // $evaluasi = route('peserta.evaluasi.create', ['id' => $id]);
    // $survey = route('peserta.surveykepuasan.create', ['id' => $id]); 

    //     // Get all facilitators related to the pelatihan
    //     $fasilitators = pelatihan_fasilitator::where('id_pelatihan', $nilai)
    //         ->with('fasilitator_pelatihan')
    //         ->get();


    //     $pertanyaans = evaluasi_pertanyaan::where('id_pelatihan', $nilai)->get();
    //     if (!isset($pertanyaanJawaban)) {
    //         $pertanyaanJawaban = []; // Atau inisialisasi sesuai kebutuhan jika tidak ada data
    //     }
    //     // Iterasi melalui pertanyaan yang Anda ambil
    //     foreach ($pertanyaans as $pertanyaan) {
    //         // Ambil id_pertanyaan dari pertanyaan saat ini
    //         $id_pertanyaan = $pertanyaan->id_pertanyaan;

    //         // Ambil jawaban yang memiliki relasi dengan id_pertanyaan saat ini
    //         $jawaban = evaluasi_jawaban::where('id_pertanyaan', $id_pertanyaan)->get();
    //         // dd($jawaban);

    //         // Tambahkan pertanyaan dan jawaban ke dalam array
    //         $pertanyaanJawaban[] = [
    //             'pertanyaan' => $pertanyaan->pertanyaan,
    //             'jawaban' => $jawaban,
    //         ];
    //     } 

    //     return view('peserta.evaluasi.create', compact('id_pelatihan', 'nilai', 'kembali', 'studi', 'hadir', 'evaluasi', 'survey', 'fasilitators','pertanyaanJawaban'), [
    //         'title' => 'Form Evaluasi Pelatihan',
    //         'pertanyaanJawaban' => $pertanyaanJawaban,
    //     ]);
    // }

    public function previousFacilitator($id)
    {
        $currentFacilitatorIndex = session()->get('currentFacilitatorIndex', 0);

        if ($currentFacilitatorIndex > 0) {
            $currentFacilitatorIndex--;
        }

        session(['currentFacilitatorIndex' => $currentFacilitatorIndex]);

        return redirect()->route('peserta.evaluasi.create', ['id' => $id]);
    }

    public function nextFacilitator($id)
    {
        $currentFacilitatorIndex = session()->get('currentFacilitatorIndex', 0);
        $currentFacilitatorIndex++;

        session(['currentFacilitatorIndex' => $currentFacilitatorIndex]);

        return redirect()->route('peserta.evaluasi.create', ['id' => $id]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        // Ambil data penilaian dari formulir
        $dataEvaluasi = $request->input('ratings');

        // Lakukan validasi jika diperlukan

        // Simpan data penilaian ke dalam database
        foreach ($dataEvaluasi as $id_fasilitator => $data) {
            $evaluasi = new evaluasi();
            $evaluasi->id_pelatihan = $request->id_pelatihan;
            $evaluasi->id_user = Auth::id();
            $evaluasi->id_fasilitator = $id_fasilitator;
            $evaluasi->metode = $data['metode'];
            $evaluasi->respon_peserta = $data['respon_peserta'];
            $evaluasi->pengembangan_proses = $data['pengembangan_proses'];
            $evaluasi->kecukupan_waktu = $data['kecukupan_waktu'];
            $evaluasi->penguasaan_materi = $data['penguasaan_materi'];
            $evaluasi->kemampuan_menyampaikan_materi = $data['kemampuan_menyampaikan_materi'];
            $evaluasi->catatan = $data['catatan'];

            // Simpan data penilaian
            $evaluasi->save();
            // dd($evaluasi);
        }


        // Simpan data penilaian materi pelatihan jika ada
        $jawabanPertanyaan = $request->input('jawabans');

        foreach ($jawabanPertanyaan as $id_pertanyaan => $jawaban) {
            // Periksa apakah $jawaban adalah array sebelum melakukan perulangan
            if (is_array($jawaban)) {
                foreach ($jawaban as $id_jawaban) {
                    $evaluasiMateri = new evaluasi_materi();
                    $evaluasiMateri->id_user = Auth::id();
                    $evaluasiMateri->id_pelatihan = $request->id_pelatihan;
                    $evaluasiMateri->id_jawaban = $id_jawaban;
                    $evaluasiMateri->save();
                }
            }
        }


        // foreach ($jawabanPertanyaan as $id_pertanyaan => $jawaban) {
        //     // Periksa apakah $jawaban['jawaban'] adalah array atau objek sebelum melakukan perulangan
        //     if (is_array($jawaban['jawaban']) || is_object($jawaban['jawaban'])) {
        //         foreach ($jawaban['jawaban'] as $id_jawaban) {
        //             $evaluasiMateri = new evaluasi_materi();
        //             $evaluasiMateri->id_pelatihan = $request->id_pelatihan;
        //             $evaluasiMateri->id_jawaban = $id_jawaban;

        //             // Simpan data penilaian materi pelatihan
        //             $evaluasiMateri->save();
        //         }
        //     } 
        // }
        // }
        return redirect()->route('peserta.evaluasi.create', ['id' => $request->id_pelatihan])->with('success', 'Terima Kasih Telah Mengisi Evaluasi Pelatihan');
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
