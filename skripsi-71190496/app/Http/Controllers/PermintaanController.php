<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use App\Models\Mitra;
use App\Models\gender;
use App\Models\negara;
use App\Models\provinsi;
use App\Models\pelatihan;
use App\Models\permintaan;
use App\Models\rentang_usia;
use Illuminate\Http\Request;
use App\Models\AssesmentDasar;
use App\Models\kabupaten_kota;
use App\Models\pelatihan_test;
use App\Models\AssessmentDasar;
use ValidatesWhenResolvedTrait;
use App\Models\AsessmentPeserta;
use App\Models\jenis_organisasi;
use App\Models\AssessmentPeserta;
use App\Models\informasi_pelatihan;
use App\Models\permintaan_pelatihan;
use Illuminate\Support\Facades\Auth;
use App\Models\peserta_pelatihan_test;

class PermintaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = pelatihan::orderBy('id_pelatihan')->get();
        
        return view('peserta.permintaan.index', [
            'title' => 'Pelatihan Permintaan'
        ])->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peserta.permintaan.create', [
            'title' => 'Pelatihan Permintaan',
            'tema' => Tema::all(),
            'mitra' => Mitra::all(),
            
            // 'jenis_organisasi' => jenis_organisasi::all(),
            // 'informasi_pelatihan' => informasi_pelatihan::all(),
            // 'kabupaten_kota' => kabupaten_kota::all(),
            // 'provinsi' => provinsi::all(),
            // 'negara' => negara::all(),
            // 'rentang_usia' => rentang_usia::all(),
            // 'gender' => gender::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        // Validasi data formulir jika diperlukan
        $permintaan = $request->validate(
            [
                'id_mitra' => 'required',
                'judul_pelatihan' => 'required',
                'jenis_pelatihan' => 'required',
                'id_tema' => 'required',
                'tanggal_waktu_mulai' => 'required|date',
                'tanggal_waktu_selesai' => 'required|date|after:tanggal_waktu_mulai',
                'masalah' => 'required',
                'kebutuhan' => 'required',
                'materi' => 'required',
                'nama_peserta.*' => 'required',
                'email_peserta.*' => 'required|email',
                'jenis_kelamin.*' => 'required',
                'jabatan.*' => 'required',
                'tanggung_jawab.*' => 'required',
                'request_khusus' => 'required',
            ],
            [
                'id_mitra.required' => 'Nama mitra harus diisi.',
                'judul_pelatihan.required' => 'Judul pelatihan harus diisi.',
                'jenis_pelatihan.required' => 'Jenis pelatihan harus dipilih.',
                'id_tema.required' => 'Tema pelatihan harus dipilih.',
                'tanggal_waktu_mulai.required' => 'Tanggal dan waktu mulai harus diisi.',
                'tanggal_waktu_mulai.date' => 'Format tanggal dan waktu mulai tidak valid.',
                'tanggal_waktu_selesai.required' => 'Tanggal dan waktu selesai harus diisi.',
                'tanggal_waktu_selesai.date' => 'Format tanggal dan waktu selesai tidak valid.',
                'tanggal_waktu_selesai.after' => 'Tanggal dan waktu selesai harus setelah tanggal dan waktu mulai.',
                'masalah.required' => 'Masalah yang dihadapi oleh lembaga harus diisi.',
                'kebutuhan.required' => 'Kebutuhan lembaga harus diisi.',
                'materi.required' => 'Materi dan topik pelatihan harus diisi.',
                'nama_peserta.*.required' => 'Nama peserta harus diisi.',
                'email_peserta.*.required' => 'Email peserta harus diisi.',
                'email_peserta.*.email' => 'Format email peserta tidak valid.',
                'jenis_kelamin.*.required' => 'Jenis kelamin peserta harus dipilih.',
                'jabatan.*.required' => 'Jabatan peserta di lembaga harus diisi.',
                'tanggung_jawab.*.required' => 'Tanggung jawab utama peserta harus diisi.',
                'request_khusus.required' => 'Request khusus harus diisi.',
            ]
        );
        // 'id_user' => Auth::user()->id,

        $id_user = Auth::user()->id;
        // Simpan data formulir ke dalam database
        $permintaan = new permintaan_pelatihan();
        $permintaan->id_user = $id_user; // Simpan ID pengguna
        $permintaan->id_mitra = $request->input('id_mitra');
        $permintaan->judul_pelatihan = $request->input('judul_pelatihan');
        $permintaan->jenis_pelatihan = $request->input('jenis_pelatihan');
        $permintaan->id_tema = $request->input('id_tema');
        $permintaan->masalah = $request->input('masalah');
        $permintaan->kebutuhan = $request->input('kebutuhan');
        $permintaan->materi = $request->input('materi');
        $permintaan->tanggal_waktu_mulai = $request->input('tanggal_waktu_mulai');
        $permintaan->tanggal_waktu_selesai = $request->input('tanggal_waktu_selesai');
        $permintaan->request_khusus = $request->input('request_khusus');
        $permintaan->save();


        // $assesmentDasar = new AssessmentDasar();
        // $assesmentDasar->masalah = $request->masalah;
        // $assesmentDasar->kebutuhan = $request->kebutuhan;
        // $assesmentDasar->materi = $request->materi;
        // $assesmentDasar->id_permintaan = $permintaan->id;
        // $assesmentDasar->save();

        // Proses penyimpanan data assesment dasar dinamis
        // foreach ($request->masalah as $key => $value) {
        //     $assessmentDasar = new AssesmentDasar();
        //     $assessmentDasar->masalah = $value;
        //     $assessmentDasar->kebutuhan = $request->kebutuhan[$key];
        //     $assessmentDasar->materi = $request->materi[$key];
        //     $assessmentDasar->id_permintaan = $permintaan->id;
        //     $assessmentDasar->save();
        // }

        // $assesmentPeserta = new AssessmentPeserta();
        // $assesmentPeserta->nama_peserta = $request->nama_peserta;
        // $assesmentPeserta->jenis_kelamin = $request->jenis_kelamin;
        // $assesmentPeserta->jabatan = $request->jabatan;
        // $assesmentPeserta->tanggung_jawab = $request->tanggung_jawab;
        // $assesmentPeserta->id_permintaan = $permintaan->id;
        // $assesmentPeserta->save();

        // Proses penyimpanan data asesment peserta dinamis
        foreach ($request->nama_peserta as $key => $value) {
            $assessmentPeserta = new AsessmentPeserta();
            $assessmentPeserta->nama_peserta = $value;
            $assessmentPeserta->email_peserta = $request->email_peserta[$key];;
            $assessmentPeserta->jenis_kelamin = $request->jenis_kelamin[$key];
            $assessmentPeserta->jabatan = $request->jabatan[$key];
            $assessmentPeserta->tanggung_jawab = $request->tanggung_jawab[$key];
            $assessmentPeserta->id_permintaan = $permintaan->id;
            $assessmentPeserta->save();
        }

        // Simpan data dinamis (assessment dasar) ke dalam database
        // $masalah = $request->input('masalah');
        // $kebutuhan = $request->input('kebutuhan');
        // $materi = $request->input('materi');

        // foreach ($masalah as $key => $value) {
        //     AssessmentDasar::create([
        //         'id_permintaan' => $permintaan->id, // Menghubungkan dengan data "form_data"
        //         'masalah' => $masalah[$key],
        //         'kebutuhan' => $kebutuhan[$key],
        //         'materi' => $materi[$key],
        //         // Tambahan kolom lain yang diperlukan
        //     ]);
        // }

        // Simpan data dinamis (assessment peserta) ke dalam database
        // $namaPeserta = $request->input('nama_peserta');
        // $jenisKelamin = $request->input('jenis_kelamin');
        // $jabatan = $request->input('jabatan');
        // $tanggungJawab = $request->input('tanggung_jawab');

        // foreach ($namaPeserta as $key => $value) {
        //     AssessmentPeserta::create([
        //         'id_permintaan' => $permintaan->id, // Menghubungkan dengan data "form_data"
        //         'nama_peserta' => $namaPeserta[$key],
        //         'jenis_kelamin' => $jenisKelamin[$key],
        //         'jabatan' => $jabatan[$key],
        //         'tanggung_jawab' => $tanggungJawab[$key],
        //         // Tambahan kolom lain yang diperlukan
        //     ]);
        // }

        return redirect()->to('peserta/permintaan/create')->with('success', 'Terima Kasih Telah Mendaftar Pelatihan Permintaan. Pelatihan Anda Segera Diproses');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $user = Auth::user()->id;
        // dd($user);
        $id_pelatihan = pelatihan::with('fasilitator_pelatihan')->where('id_pelatihan', '=', $id)->get();
        $jsonString = json_encode($id_pelatihan);
        $data = json_decode($jsonString);
        $nilai = $data[0]->id_pelatihan;
        $data = pelatihan::where('id_pelatihan', $id)->get();
        
        // return $pelatihan_test;
        return  view('peserta.permintaan.show', compact('data', 'nilai'), [
            'title' => 'Pelatihan Permintaan',

        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(permintaan $permintaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, permintaan $permintaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(permintaan $permintaan)
    {
        //
    }
}
