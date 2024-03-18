<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tema;
use App\Models\User;
use App\Models\Mitra;
use App\Models\gender;
use App\Models\negara;
use App\Models\Produk;
use App\Models\provinsi;
use App\Models\permintaan;
use App\Models\rentang_usia;
use Illuminate\Http\Request;
use App\Models\AssesmentDasar;
use App\Models\kabupaten_kota;
use App\Models\file_permintaan;
use App\Models\AssesmentPeserta;
use App\Models\jenis_organisasi;
use App\Models\gambar_permintaan;
use App\Models\peserta_permintaan;
use App\Http\Controllers\Controller;
use App\Models\permintaan_pelatihan;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\pelatihan_fasilitator;
use App\Models\peserta_pelatihan_test;
use App\Exports\PesertaPelatihanExport;
use App\Models\fasilitator_pelatihan_test;
use Maatwebsite\Excel\Concerns\Exportable;

class DashboardPermintaan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = permintaan_pelatihan::with('mitra')->get();
        // dd($data);
        $permintaan = permintaan::all();
        return view('dashboard.permintaan.index', [
            'data' => $data,
            // 'mitra' => Mitra::all(),
            'permintaan' => $permintaan,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $id = (int)$id;
        $data = permintaan_pelatihan::findOrFail($id);
        $jsonString = json_encode($data);
        $data1 = json_decode($jsonString);
        $nilai = $data1->id;
        // dd($nilai);
        $oldIdFasilitator = old('id_fasilitator', []);
        return view('dashboard.permintaan.create', [
            'jenis_produk' => Produk::all(),
            'tema' => Tema::all(),
            'fasilitator_pelatihan' => fasilitator_pelatihan_test::all(),
            'oldIdFasilitator' =>  $oldIdFasilitator,
            'data' =>  $data,
            'nilai' =>  $nilai,
            // 'permintaan' =>  permintaan_pelatihan::all()

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'nama_pelatihan' => 'required|string',
                'id_tema' => 'required|exists:tema,id',
                'metode_pelatihan' => 'required|string|in:Online,Offline',
                'jenis_pelatihan' => 'required|string|in:Reguler,Permintaan,Konsultasi',
                'lokasi_pelatihan' => 'required|string',
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date',
                'id_fasilitator' => 'required|array',
                'image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'file.*' => 'required|mimes:pdf,doc,docx|max:2048',
                'deskripsi_pelatihan' => 'required',
            ],
            [
                'nama_pelatihan.required' => 'Kolom nama pelatihan wajib diisi.',
                'id_tema.required' => 'Kolom tema wajib diisi.',
                'id_tema.exists' => 'Tema yang dipilih tidak valid.',
            ]
        );

        $permintaan = new permintaan();
        $permintaan->id = $request->id_permintaan;
        $permintaan->nama_pelatihan = $request->nama_pelatihan;
        $permintaan->id_tema = $request->id_tema;
        $permintaan->metode_pelatihan = $request->metode_pelatihan;
        $permintaan->jenis_pelatihan = $request->jenis_pelatihan;
        $permintaan->lokasi_pelatihan = $request->lokasi_pelatihan;
        $permintaan->tanggal_mulai = $request->tanggal_mulai;
        $permintaan->tanggal_selesai = $request->tanggal_selesai;
        $permintaan->deskripsi_pelatihan = $request->deskripsi_pelatihan;
        $permintaan->save();

        // $permintaan = permintaan::find($request->id);
        if ($permintaan) {
            foreach ($request->id_fasilitator as $id_fasilitator) {
                $permintaan->fasilitator_permintaan()->attach($id_fasilitator, ['id_permintaan' => $permintaan->id]);
            }
        }


        // dd($permintaan);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $path = $file->storeAs('image', $file->getClientOriginalName());
                $gambarPermintaan = new gambar_permintaan(['path' => $path]);
                $gambarPermintaan->id_permintaan = $permintaan->id;
                $permintaan->gambarPermintaan()->save($gambarPermintaan);
            }
        }

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                $path = $file->storeAs('file', $file->getClientOriginalName());
                $filePermintaan = new file_permintaan(['path' => $path]);
                $filePermintaan->id_permintaan = $permintaan->id; // Pastikan pengaturan nilai id_permintaan sesuai
                $permintaan->filePermintaan()->save($filePermintaan);
            }
        }

        return redirect()->route('dashboard.permintaan.index')->with('success', 'Data berhasil disimpan');
    }

    public function simpan(Request $request)
    {
        $id_permintaan = $request->input('id_permintaan');
        // Validasi data formulir
        $data = $request->validate([
            'nama_peserta' => 'required|string|max:255',
            'email_peserta' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Simpan data ke tabel users dan peserta_permintaan dalam satu baris
        $user = User::create([
            'name' => $data['nama_peserta'],
            'email' => $data['email_peserta'],
            'password' => bcrypt($data['password']),
        ]);
        
        peserta_permintaan::create([
            'nama_peserta' => $data['nama_peserta'],
            'email_peserta' => $data['email_peserta'],
            'id_permintaan' => $id_permintaan,  
            'id_user' => $user->id,  
        ]);

        // Kemudian, Anda dapat mengembalikan view atau melakukan redirect ke halaman lain jika diperlukan
        return redirect()->route('dashboard.permintaan.peserta', ['id' => $id_permintaan])->with('success', 'Data berhasil disimpan');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $id = (int)$id;
        $permintaan = permintaan_pelatihan::findOrFail($id);
        $judul_pelatihan = $permintaan->judul_pelatihan;
        $data = permintaan_pelatihan::with('asessment_dasar', 'assessment_peserta', 'tema','mitra')
            ->where('id', $id)
            ->get();
        $tema = Tema::all();
        $mitra = Mitra::all();
        return view('dashboard.permintaan.show', compact('data', 'tema','mitra', 'judul_pelatihan'));
    }

    public function detail(string $id)
    {
        $permintaan = permintaan::where('id', $id)->get();
        return view('dashboard.permintaan.detail', compact('permintaan'));
    }

    public function peserta(string $id)
    {
        $id = (int)$id;
        $permintaan = permintaan::findOrFail($id);
        $jsonString = json_encode($permintaan);
        $data1 = json_decode($jsonString);
        $nilai = $data1->id;
        dd($nilai);
        return view('dashboard.permintaan.peserta', compact('permintaan', 'nilai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
