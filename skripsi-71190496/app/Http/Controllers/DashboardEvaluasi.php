<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\evaluasi;
use App\Models\pelatihan;
use App\Models\Konsultasi;
use App\Models\permintaan;
use App\Models\fasilitator;
use Illuminate\Http\Request;
use App\Models\evaluasi_bridge;
use App\Models\evaluasi_materi;
use App\Models\evaluasi_jawaban;
use App\Models\evaluasi_pertanyaan;
use App\Http\Controllers\Controller;
use App\Models\permintaan_pelatihan;
use App\Models\fasilitator_pelatihan_test;

class DashboardEvaluasi extends Controller
{
    public function index()
    {
        $data = pelatihan::orderBy('id_pelatihan')->get();
        $data2 = permintaan::orderBy('id')->get();
        $data3 = Konsultasi::orderBy('id')->get();
        return view('dashboard.evaluasi.index', compact('data', 'data2', 'data3'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $id_pelatihan = pelatihan::with('fasilitator_pelatihan')->where('id_pelatihan', '=', $id)->get();
        $jsonString = json_encode($id_pelatihan);
        $data = json_decode($jsonString);
        $nilai = $data[0]->id_pelatihan;
        return view('dashboard.evaluasi.create')->with('nilai', $nilai);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'pertanyaans.*.pertanyaan' => 'required|string',
            'pertanyaans.*.jawaban.*' => 'required|string',
            'id_pelatihan' => 'required|numeric', // Pastikan id_pelatihan ada dalam request
        ]);
        //  dd($validatedData);

        // Simpan data pertanyaan dan jawaban
        foreach ($validatedData['pertanyaans'] as $pertanyaanData) {
            // Simpan pertanyaan
            $pertanyaan = evaluasi_pertanyaan::create([
                'pertanyaan' => $pertanyaanData['pertanyaan'],
                'id_pelatihan' => $request->id_pelatihan, // Simpan id_pelatihan ke evaluasi_pertanyaan
            ]);

            // Simpan jawaban dan id_pertanyaan
            foreach ($pertanyaanData['jawaban'] as $jawabanData) {
                $jawaban = evaluasi_jawaban::create([
                    'jawaban' => $jawabanData,
                    'id_pertanyaan' => $pertanyaan->id_pertanyaan, // Simpan id_pertanyaan ke evaluasi_jawaban
                ]);
            }
        }

        // Redirect atau berikan respons sesuai kebutuhan
        return redirect()->route('dashboard.evaluasi.index')->with('success', 'Form berhasil disimpan.');
    }



    // public function store(Request $request)
    // {
    //     // Validasi form jika diperlukan
    //     $validatedData = $request->validate([
    //         'questions.*.question' => 'required',
    //         'questions.*.type' => 'required|in:text,multiple_choice',
    //         'questions.*.options.*' => 'required_if:questions.*.type,multiple_choice',
    //     ]);
    //     dd($validatedData);

    //     // Simpan data form ke dalam database
    //     foreach ($validatedData['questions'] as $questionData) {
    //         $question = new evaluasi(); // Sesuaikan dengan model Anda
    //         $question->question = $questionData['question'];
    //         $question->type = $questionData['type'];
    //         if ($questionData['type'] == 'multiple_choice') {
    //             $question->options = implode(',', $questionData['options']);
    //         }
    //         $question->save();
    //     }

    //     return redirect()->back()->with('success', 'Form data saved successfully');
    // } 

    /**
     * Display the specified resource.
     */
    public function show($id_pelatihan)
    {
        // $data = evalPeserta::where('id_pelatihan', $id_pelatihan)->get(); 
        // $id_pelatihan = (int)$id_pelatihan;
        $id_pelatihan = pelatihan::with('fasilitator_pelatihan')->where('id_pelatihan', '=', $id_pelatihan)->get();
        $jsonString = json_encode($id_pelatihan);
        $data = json_decode($jsonString);
        $nilai = $data[0]->id_pelatihan; 

        // Mengambil evaluasi untuk pelatihan tertentu
        $dataEvaluasi = evaluasi::with('fasilitator')->where('id_pelatihan', $nilai)->get();
        // Ambil data fasilitator yang dinilai oleh user saat ini
        $fasilitators = $dataEvaluasi->pluck('id_fasilitator')->unique();
        $fasilitators = fasilitator_pelatihan_test::whereIn('id_fasilitator', $fasilitators)->get();

        // Sisipkan data fasilitator ke dalam data evaluasi
        foreach ($dataEvaluasi as $evaluasi) {
            $evaluasi = $fasilitators->where('id_fasilitator', $evaluasi->id_fasilitator)->first();
        }

        // Mengumpulkan evaluasi materi untuk pelatihan tertentu
        $dataEvaluasiMateri = evaluasi_materi::where('id_pelatihan', $nilai)->get();

        $pelatihan = Pelatihan::findOrFail($nilai);
        // $pertanyaan = evaluasi_pertanyaan::where('id_pelatihan', $nilai)->get();
        
        // Ambil pertanyaan evaluasi dari tabel evaluasi_pertanyaan yang berelasi dengan id_pelatihan
        $pertanyaan = evaluasi_pertanyaan::where('id_pelatihan', $nilai)
            ->with('jawabans')
            ->get();
        // dd($pertanyaan);

        // Ambil jawaban evaluasi materi dari tabel evaluasi_materi yang berelasi dengan id_pelatihan
        $jawabanMateri = evaluasi_materi::where('id_pelatihan', $nilai)->get();

        // Ambil informasi user
        $users = User::all();
        // $data = pelatihan::where('id_pelatihan', $id_pelatihan)->get();
        // session(['id_pelatihan' => $id_pelatihan]);
        // dd($nilaie);
        return view('dashboard.evaluasi.show', compact('id_pelatihan', 'data', 'nilai', 'dataEvaluasi', 'dataEvaluasiMateri', 'pertanyaan', 'jawabanMateri', 'users', 'pelatihan', 'fasilitators'));
    }
}
