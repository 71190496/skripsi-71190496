<?php

namespace App\Http\Controllers;

use App\Models\Hadir;
use App\Models\gender;
use App\Models\pelatihan;
use App\Models\konsultasi;
use App\Models\UserPresensi;
use Illuminate\Http\Request;
use App\Models\jenis_organisasi;
use App\Models\permintaan_pelatihan;
use App\Models\pelatihan_konsultasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class PesertaDaftarHadir extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = pelatihan::orderBy('id')->get();
        return view('peserta.daftarhadir.index')->with('data', $data);;
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create($id)
    // {
    //     $id_pelatihan = pelatihan::where('id_pelatihan', '=', $id)->get();
    //     $permintaans = permintaan_pelatihan::where('id', $id)->get();
    //     $jsonString = json_encode([$id_pelatihan, $permintaans]);
    //     $data = json_decode($jsonString);
    //     $nilai = $data[0]->id_pelatihan; 
    //     $nilai2 = $data[0][1];
    //     $id_presensi = Hadir::where('id_pelatihan', $nilai)->value('id_presensi');
    //     $presensiStatus = Hadir::where('id_pelatihan', $nilai)->value('status');
    //     $kembali = route('peserta.pelatihan.show', ['id' => $id]);
    //     $studi = route('peserta.studidampak.create', ['id' => $id]);
    //     $hadir = route('peserta.daftarhadir.create', ['id' => $id]);
    //     $evaluasi = route('peserta.evaluasi.create', ['id' => $id]);
    //     $survey = route('peserta.surveykepuasan.create', ['id' => $id]);
    // return view('peserta.daftarhadir.create', compact('id_pelatihan', 'id_presensi', 'nilai', 'presensiStatus', 'kembali', 'studi', 'hadir', 'evaluasi', 'survey', 'permintaans'), [
    //     'title' => 'Form Daftar Hadir',
    //     'gender' => gender::all(),
    //     'jenis_organisasi' => jenis_organisasi::all()
    // ]);
    // }

    public function create($id)
    {
        // Cari data pelatihan berdasarkan id
        $pelatihan = pelatihan::where('id_pelatihan', $id)->first();

        // Cari data permintaan pelatihan berdasarkan id
        $permintaan = permintaan_pelatihan::where('id', $id)->first();

        // Cari data permintaan pelatihan berdasarkan id
        $konsultasi = pelatihan_konsultasi::where('id', $id)->first();

        // Inisialisasi variabel untuk data hasil JSON
        $jsonData = [];

        // Tambahkan data pelatihan ke dalam array hasil JSON jika ditemukan
        if ($pelatihan) {
            $jsonData['pelatihan'] = $pelatihan;
        }

        // Tambahkan data permintaan pelatihan ke dalam array hasil JSON jika ditemukan
        if ($permintaan) {
            $jsonData['permintaan'] = $permintaan;
        }

        if ($konsultasi) {
            $jsonData['konsultasi'] = $konsultasi;
        }

        // Konversi data JSON ke dalam bentuk string
        $jsonString = json_encode($jsonData);

        // Decode data JSON menjadi array
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

        // Lakukan proses selanjutnya berdasarkan tipe data yang ditemukan
        if ($id_pelatihan !== null) {
            // Lakukan operasi yang sesuai untuk data pelatihan
            $id_presensi = Hadir::where('id_pelatihan', $id_pelatihan)->value('id_presensi');
            $presensiStatus = Hadir::where('id_pelatihan', $id_pelatihan)->value('status');
            $kembali = route('peserta.pelatihan.show', ['id' => $id]);
            $studi = route('peserta.studidampak.create', ['id' => $id]);
            $hadir = route('peserta.daftarhadir.create', ['id' => $id]);
            $evaluasi = route('peserta.evaluasi.create', ['id' => $id]);
            $survey = route('peserta.surveykepuasan.create', ['id' => $id]);
            $sertifikat = route('peserta.sertifikat.show', ['id' => $id]);
            return view('peserta.daftarhadir.create', compact('id_pelatihan', 'id_presensi', 'presensiStatus', 'kembali', 'studi', 'hadir', 'evaluasi', 'survey','sertifikat'), [
                'title' => 'Form Daftar Hadir',
                'gender' => gender::all(),
                'jenis_organisasi' => jenis_organisasi::all()
            ]);
        } elseif ($id_permintaan !== null) {
            // Lakukan operasi yang sesuai untuk data permintaan
            $id_presensi = Hadir::where('id_pelatihan', $id_permintaan)->value('id_presensi');
            $presensiStatus = Hadir::where('id_pelatihan', $id_permintaan)->value('status');
            $kembali = route('peserta.pelatihan.show', ['id' => $id]);
            $studi = route('peserta.studidampak.create', ['id' => $id]);
            $hadir = route('peserta.daftarhadir.create', ['id' => $id]);
            $evaluasi = route('peserta.evaluasi.create', ['id' => $id]);
            $survey = route('peserta.surveykepuasan.create', ['id' => $id]);
            $sertifikat = route('peserta.sertifikat.show', ['id' => $id]);
            return view('peserta.daftarhadir.create', compact('id_pelatihan', 'id_presensi', 'presensiStatus', 'kembali', 'studi', 'hadir', 'evaluasi', 'survey','sertifikat'), [
                'title' => 'Form Daftar Hadir',
                'gender' => gender::all(),
                'jenis_organisasi' => jenis_organisasi::all()
            ]);
        } elseif ($id_konsultasi !== null) {
            // Lakukan operasi yang sesuai untuk data permintaan
            $id_presensi = Hadir::where('id_pelatihan', $id_permintaan)->value('id_presensi');
            $presensiStatus = Hadir::where('id_pelatihan', $id_permintaan)->value('status');
            $kembali = route('peserta.pelatihan.show', ['id' => $id]);
            $studi = route('peserta.studidampak.create', ['id' => $id]);
            $hadir = route('peserta.daftarhadir.create', ['id' => $id]);
            $evaluasi = route('peserta.evaluasi.create', ['id' => $id]);
            $survey = route('peserta.surveykepuasan.create', ['id' => $id]);
            $sertifikat = route('peserta.sertifikat.show', ['id' => $id]);
            return view('peserta.daftarhadir.create', compact('id_pelatihan', 'id_presensi', 'presensiStatus', 'kembali', 'studi', 'hadir', 'evaluasi', 'survey','sertifikat'), [
                'title' => 'Form Daftar Hadir',
                'gender' => gender::all(),
                'jenis_organisasi' => jenis_organisasi::all()
            ]);
        } else {
            // Tampilkan pesan atau lakukan tindakan lain jika tidak ada data yang ditemukan
        }

        // Kembalikan view atau lakukan operasi lain yang diperlukan
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        if (Auth::check()) {
            // Get the currently authenticated user
            $user = Auth::user();

            // Dapatkan atau buat id_presensi berdasarkan id_pelatihan
            $id_pelatihan = $request->id_pelatihan;
            // dd($id_pelatihan);
            
            // Mengonversi string JSON ke dalam bentuk array PHP
            $dataArray = json_decode($id_pelatihan, true);
            // dd($dataArray);

            // Mengambil nilai "id_pelatihan" dari array
            // $idPelatihan = $dataArray[0]['id_pelatihan'];
            // dd($idPelatihan);
            $id_presensi = Hadir::where('id_pelatihan', $id_pelatihan)->value('id_presensi');
            // dd($id_presensi);

            // Siapkan data untuk membuat rekaman Hadir
            $data = [
                'id_presensi' => $id_presensi,
                'id_pelatihan' => $dataArray,
                'id_user' => $user->id,
                // Tambahkan kolom lain sesuai kebutuhan
            ];
            // dd($data);

            // Buat rekaman baru di tabel UserPresensi
            UserPresensi::create($data);

            // Redirect dengan pesan sukses
            // return redirect()->route('peserta.daftarhadir.create', ['id' => $request->id_pelatihan])
            //     ->with('success', 'Berhasil mengisi studi dampak pelatihan');
            return redirect()->route('peserta.daftarhadir.create', ['id' => $request->id_pelatihan])->with('success', 'Presensi Berhasil');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Hadir $hadir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hadir $hadir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hadir $hadir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hadir $hadir)
    {
        //
    }
}
