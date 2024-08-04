<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use App\Models\User;
use App\Models\Produk;
use App\Models\pelatihan;
use App\Models\Konsultasi;
use Illuminate\Http\Request;
use App\Models\file_konsultasi;
use App\Models\gambar_konsultasi;
use App\Models\peserta_konsultasi;
use App\Http\Controllers\Controller;
use App\Models\pelatihan_konsultasi;
use Illuminate\Support\Facades\Storage;
use App\Models\fasilitator_pelatihan_test;

class DashboardKonsultasi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = pelatihan_konsultasi::all();
        $konsultasi = Konsultasi::all();
        return view('dashboard.konsultasi.index', [
            'konsultasi' => $konsultasi,
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $id = (int)$id;
        $data = Konsultasi::findOrFail($id);
        $jsonString = json_encode($data);
        $data1 = json_decode($jsonString);
        $nilai = $data1->id;
        // dd($nilai);
        $oldIdFasilitator = old('id_fasilitator', []);
        return view('dashboard.konsultasi.create', [
            'jenis_produk' => Produk::all(),
            'tema' => Tema::all(),
            'fasilitator_pelatihan' => fasilitator_pelatihan_test::all(),
            'oldIdFasilitator' =>  $oldIdFasilitator,
            'data' =>  $data,
            'nilai' =>  $nilai,
            // 'permintaan' =>  permintaan_pelatihan::all()

        ]);
    }

    public function peserta(string $id)
    {
        $id = (int)$id;
        $konsultasi = konsultasi::findOrFail($id);
        $jsonString = json_encode($konsultasi);
        $data1 = json_decode($jsonString);
        $nilai = $data1->id;
        // dd($nilai);
        return view('dashboard.konsultasi.peserta', compact('konsultasi', 'nilai'));
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
                // 'jenis_pelatihan' => 'required|string|in:Reguler,Permintaan,Konsultasi',
                'lokasi_pelatihan' => 'required|string',
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date',
                'id_fasilitator' => 'required|array',
                'image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                // 'file.*' => 'required|mimes:pdf,doc,docx|max:2048',
                'deskripsi_pelatihan' => 'required',
            ],
            [
                'nama_pelatihan.required' => 'Kolom nama pelatihan wajib diisi.',
                'id_tema.required' => 'Kolom tema wajib diisi.',
                'id_tema.exists' => 'Tema yang dipilih tidak valid.',
            ]
        );

        $konsultasi = new pelatihan_konsultasi();
        $konsultasi->id_konsultasi = $request->id_konsultasi;
        $konsultasi->nama_pelatihan = $request->nama_pelatihan;
        $konsultasi->id_tema = $request->id_tema;
        $konsultasi->metode_pelatihan = $request->metode_pelatihan;
        // $konsultasi->jenis_pelatihan = $request->jenis_pelatihan;
        $konsultasi->lokasi_pelatihan = $request->lokasi_pelatihan;
        $konsultasi->tanggal_mulai = $request->tanggal_mulai;
        $konsultasi->tanggal_selesai = $request->tanggal_selesai;
        $konsultasi->deskripsi_pelatihan = $request->deskripsi_pelatihan;
        $konsultasi->save();

        // $konsultasi = konsultasi::find($request->id);
        if ($konsultasi) {
            foreach ($request->id_fasilitator as $id_fasilitator) {
                $konsultasi->fasilitator_konsultasi()->attach($id_fasilitator, ['id_konsultasi' => $konsultasi->id_konsultasi]);
            }
        }


        // dd($konsultasi);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $path = $file->storeAs('image', $file->getClientOriginalName());
                $gambarkonsultasi = new gambar_konsultasi(['path' => $path]);
                $gambarkonsultasi->id_konsultasi = $konsultasi->id_konsultasi;
                $konsultasi->gambarkonsultasi()->save($gambarkonsultasi);
            }
        }

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                $path = $file->storeAs('file', $file->getClientOriginalName());
                $filekonsultasi = new file_konsultasi(['path' => $path]);
                $filekonsultasi->id_konsultasi = $konsultasi->id_konsultasi; // Pastikan pengaturan nilai id_konsultasi sesuai
                $konsultasi->filekonsultasi()->save($filekonsultasi);
            }
        }

        return redirect()->route('dashboard.konsultasi.index')->with('success', 'Data berhasil disimpan');
    }

    public function simpan(Request $request)
    {
        $id_konsultasi = $request->input('id_konsultasi');
        // Validasi data formulir
        $data = $request->validate([
            'nama_peserta' => 'required|string|max:255',
            'email_peserta' => 'required|string|email|max:255',
            'password' => 'required|string|min:5',
        ]);

        $user = User::where('email', $data['email_peserta'])->first();
        if (!$user) {
            // If no user exists with the given email, create a new user
            $user = User::create([
                'name' => $data['nama_peserta'],
                'email' => $data['email_peserta'],
                'password' => bcrypt($data['password']),
            ]);
        }

        peserta_konsultasi::create([
            'nama_peserta' => $data['nama_peserta'],
            'email_peserta' => $data['email_peserta'],
            'id_konsultasi' => $id_konsultasi,
            'id_user' => $user->id,
        ]);

        // Kemudian, Anda dapat mengembalikan view atau melakukan redirect ke halaman lain jika diperlukan
        return redirect()->route('dashboard.konsultasi.peserta', ['id_konsultasi' => $id_konsultasi])->with('success', 'Data berhasil disimpan');
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data  = Konsultasi::where('id', $id)->get();
        $konsultasi = pelatihan_konsultasi::where('id_konsultasi', $id)->get();
        $showButtons = $konsultasi->isEmpty(); // Check if $konsultasi is empty

        return view('dashboard.konsultasi.show', compact('data', 'showButtons'), [
            'title' => 'Detail Pelatihan Saya',
        ]);
    }


    public function detail(string $id)
    {
        $konsultasi = pelatihan_konsultasi::where('id_konsultasi', $id)->get();
        $peserta = peserta_konsultasi::where('id_konsultasi', $id)->get();
        // dd($konsultasi);
        return view('dashboard.konsultasi.detail', compact('konsultasi', 'peserta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = pelatihan_konsultasi::find($id);
        $oldIdFasilitator = $data->fasilitator_konsultasi->pluck('id_fasilitator')->toArray();
        $oldImages = $data->gambarkonsultasi()->pluck('path')->toArray();
        $oldFiles = $data->filekonsultasi()->pluck('path')->toArray();
        return view('dashboard.konsultasi.edit', compact('data', 'oldIdFasilitator', 'oldImages', 'oldFiles'), [
            'tema' => Tema::all(),
            'jenis_produk' => Produk::all(),
            'fasilitator_pelatihan' => fasilitator_pelatihan_test::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama_pelatihan' => 'required|string',
                'id_tema' => 'required|exists:tema,id',
                'metode_pelatihan' => 'required|string|in:Online,Offline',
                // 'jenis_pelatihan' => 'required|string|in:Reguler,Permintaan,Konsultasi',
                'lokasi_pelatihan' => 'required|string',
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date',
                'id_fasilitator' => 'required|array',
                'image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                // 'file.*' => 'required|mimes:pdf,doc,docx|max:2048',
                'deskripsi_pelatihan' => 'required',
            ],
            [
                'nama_pelatihan.required' => 'Kolom nama pelatihan wajib diisi.',
                'id_tema.required' => 'Kolom tema wajib diisi.',
                'id_tema.exists' => 'Tema yang dipilih tidak valid.',
            ]
        );

        $konsultasi =  pelatihan_konsultasi::findOrFail($id);
        // $konsultasi->id_konsultasi = $request->id_konsultasi;
        $konsultasi->nama_pelatihan = $request->nama_pelatihan;
        $konsultasi->id_tema = $request->id_tema;
        $konsultasi->metode_pelatihan = $request->metode_pelatihan;
        // $konsultasi->jenis_pelatihan = $request->jenis_pelatihan;
        $konsultasi->lokasi_pelatihan = $request->lokasi_pelatihan;
        $konsultasi->tanggal_mulai = $request->tanggal_mulai;
        $konsultasi->tanggal_selesai = $request->tanggal_selesai;
        $konsultasi->deskripsi_pelatihan = $request->deskripsi_pelatihan;
        $konsultasi->save();

        // $konsultasi = konsultasi::find($request->id);
        if ($konsultasi) {
            foreach ($request->id_fasilitator as $id_fasilitator) {
                $konsultasi->fasilitator_konsultasi()->toggle($id_fasilitator, ['id_konsultasi' => $konsultasi->id_konsultasi]);
            }
        }

        if ($request->hasFile('image')) {
            // Perbarui gambar pelatihan
            foreach ($konsultasi->gambarPelatihan as $gambar) {
                Storage::delete($gambar->path); // Hapus gambar lama
                $gambar->delete(); // Hapus entri gambar lama dari database
            }

            // Simpan gambar-gambar baru
            foreach ($request->file('image') as $file) {
                $path = $file->storeAs('image', $file->getClientOriginalName()); // Simpan dengan nama asli
                $gambarkonsultasi = new gambar_konsultasi(['path' => $path]);
                $konsultasi->gambarkonsultasi()->save($gambarkonsultasi);
            }
        }

        // dd($konsultasi);

        // if ($request->hasFile('image')) {
        //     foreach ($request->file('image') as $file) {
        //         $path = $file->storeAs('image', $file->getClientOriginalName());
        //         $gambarkonsultasi = new gambar_konsultasi(['path' => $path]);
        //         $gambarkonsultasi->id_konsultasi = $konsultasi->id_konsultasi;
        //         $konsultasi->gambarkonsultasi()->save($gambarkonsultasi);
        //     }
        // }


        if ($request->hasFile('file')) {
            // Perbarui file pelatihan
            foreach ($konsultasi->filekonsultasi as $filekonsultasi) {
                Storage::delete($filekonsultasi->path); // Hapus file lama
                $filekonsultasi->delete(); // Hapus entri file lama dari database
            }

            // Simpan file-file baru
            foreach ($request->file('file') as $file) {
                $path = $file->storeAs('file', $file->getClientOriginalName()); // Simpan dengan nama asli
                $filekonsultasi = new file_konsultasi(['path' => $path]);
                $konsultasi->filekonsultasi()->save($filekonsultasi);
            }
        }

        // if ($request->hasFile('file')) {
        //     foreach ($request->file('file') as $file) {
        //         $path = $file->storeAs('file', $file->getClientOriginalName());
        //         $filekonsultasi = new file_konsultasi(['path' => $path]);
        //         $filekonsultasi->id_konsultasi = $konsultasi->id_konsultasi; // Pastikan pengaturan nilai id_konsultasi sesuai
        //         $konsultasi->filekonsultasi()->save($filekonsultasi);
        //     }
        // }

        return redirect()->route('dashboard.konsultasi.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // peserta_konsultasi::where('id', $id)->delete();
        $pelatihan = pelatihan_konsultasi::find($id);
        //  dd($pelatihan);
        $pelatihan->delete();
        return redirect()->route('dashboard.konsultasi.index')->with('success', 'Data berhasil dihapus');
    }
}
