<?php

namespace App\Http\Controllers;

use App\Models\pelatihan;
use App\Models\permintaan;
use Illuminate\Http\Request;
// use App\Models\pelatihanuser;
use App\Models\permintaan_pelatihan;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\peserta_pelatihan_test;
use App\Models\peserta_permintaan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class PelatihanUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelatihans = peserta_pelatihan_test::where('id_user', auth()->user()->id)->get();
        $permintaans = peserta_permintaan::with(['permintaan_pelatihan'])->where('id_user', auth()->user()->id)->get();

        return view('peserta.pelatihan.index', [
            'title' => 'Pelatihan Saya',
            'pelatihans' => $pelatihans,
            'permintaans' => $permintaans,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    // public function surveykepuasan($id)
    // {
    //     $id_pelatihan = pelatihan::where('id','=',$id)->get();
    //     return view('peserta.surveykepuasan.create', compact('id_pelatihan'));
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Cek apakah id berasal dari tabel pelatihan atau permintaan
        if (pelatihan::where('id_pelatihan', $id)->exists()) {
            // Jika id berasal dari tabel pelatihan
            $pelatihan = pelatihan::find($id);
            $data = pelatihan::where('id_pelatihan', $id)->get();
            $permintaans = [];
        } elseif (permintaan::where('id', $id)->exists()) {
            // Jika id berasal dari tabel permintaan
            $permintaan = permintaan::find($id);
            // $id_pelatihan = $permintaan->id_pelatihan;
            $permintaans = permintaan::with(['filePermintaan'])->where('id', $id)->get();
            $data = [];
        } else {
            // Jika id tidak ditemukan di kedua tabel
            abort(404);
        }
        // dd($permintaans);

        $kembali = route('peserta.pelatihan.show', ['id' => $id]);
        $studi = route('peserta.studidampak.create', ['id' => $id]);
        $hadir = route('peserta.daftarhadir.create', ['id' => $id]);
        $evaluasi = route('peserta.evaluasi.create', ['id' => $id]);
        $survey = route('peserta.surveykepuasan.create', ['id' => $id]);
        $sertifikat = route('peserta.sertifikat.show', ['id' => $id]);

        return view('peserta.pelatihan.show', compact('data', 'kembali', 'studi', 'hadir', 'evaluasi', 'survey', 'permintaans', 'sertifikat'), [
            'title' => 'Detail Pelatihan Saya',
        ]);
    }




    public function download($id)
    {
        $pelatihan = pelatihan::find($id);

        $file = "file_Path";

        if (!$pelatihan) {
            return redirect()->back()->with('error', 'Pelatihan tidak ditemukan.');
        }

        $filePath = $pelatihan->file;
        $file = storage_path('app/public/' . $filePath);
        $fileName = basename($filePath);

        return response()->download($file, $fileName);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(pelatihanuser $pelatihanuser)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, pelatihanuser $pelatihanuser)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(pelatihanuser $pelatihanuser)
    // {
    //     //
    // }
}
