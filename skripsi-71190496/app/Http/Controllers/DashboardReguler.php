<?php

namespace App\Http\Controllers;

use test;
use App\Models\Tema;
use App\Models\Hadir;
use App\Models\Produk;
use App\Models\pelatihan;
use App\Models\UserPresensi;
use Illuminate\Http\Request;
use App\Models\file_pelatihan;
use App\Models\gambar_pelatihan;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\pelatihan_fasilitator;
use App\Models\peserta_pelatihan_test;
use App\Exports\PesertaPelatihanExport;
use Illuminate\Support\Facades\Storage;
use App\Models\fasilitator_pelatihan_test;

class DashboardReguler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = pelatihan::all();
        return view('dashboard.reguler.index', ['pelatihan' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $oldIdFasilitator = old('id_fasilitator', []);
        return view('dashboard.reguler.create', [
            'jenis_produk' => Produk::all(),
            'tema' => Tema::all(),
            'fasilitator_pelatihan' => fasilitator_pelatihan_test::all(),
            'oldIdFasilitator' =>  $oldIdFasilitator

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate(
            [
                'nama_pelatihan' => 'required|string',
                'id_tema' => 'required|exists:tema,id',
                'fee_pelatihan' => 'required|numeric',
                'metode_pelatihan' => 'required|string|in:Online,Offline',
                'lokasi_pelatihan' => 'required|string',
                'kuota_peserta' => 'required|integer',
                'tanggal_pendaftaran' => 'required|date',
                'tanggal_batas_pendaftaran' => 'required|date|after:tanggal_pendaftaran',
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date|after:tanggal_mulai',
                'id_fasilitator' => 'required|array',
                'image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'file.*' => 'required|mimes:pdf,doc,docx|max:2048',
                'deskripsi_pelatihan' => 'required',
            ],
            [
                'nama_pelatihan.required' => 'Kolom nama pelatihan wajib diisi.',
                'id_tema.required' => 'Kolom tema wajib diisi.',
                'id_tema.exists' => 'Tema yang dipilih tidak valid.',
                'lokasi_pelatihan.required' => 'Kolom lokasi pelatihan wajib diisi.',
                'tanggal_pendaftaran.required' => 'Tanggal pendaftaran harus diisi.',
                'tanggal_batas_pendaftaran.required' => 'Tanggal batas pendaftaran harus diisi.',
                'tanggal_batas_pendaftaran.after' => 'Tanggal batas pendaftaran harus setelah tanggal pendaftaran.',
                'tanggal_mulai.required' => 'Tanggal mulai harus diisi.',
                'tanggal_selesai.required' => 'Tanggal selesai harus diisi.',
                'tanggal_selesai.after' => 'Tanggal selesai harus setelah tanggal mulai.',
                'fee_pelatihan.required' => 'Kolom fee pelatihan wajib diisi.',
                'fee_pelatihan.numeric' => 'Kolom fee pelatihan harus berupa angka.',
                'deskripsi_pelatihan' => 'Kolom deskripsi pelatihan harus diisi.',
                // 'image.*.max' => 'Poster tidak boleh lebih dari 2MB.',
            ]
        );

        // Simpan data pelatihan
        $pelatihan = new Pelatihan;
        $pelatihan->nama_pelatihan = $request->nama_pelatihan;
        $pelatihan->id_tema = $request->id_tema;
        $pelatihan->fee_pelatihan = $request->fee_pelatihan;
        $pelatihan->metode_pelatihan = $request->metode_pelatihan;
        $pelatihan->lokasi_pelatihan = $request->lokasi_pelatihan;
        $pelatihan->kuota_peserta = $request->kuota_peserta;
        $pelatihan->tanggal_pendaftaran = $request->tanggal_pendaftaran;
        $pelatihan->tanggal_batas_pendaftaran = $request->tanggal_batas_pendaftaran;
        $pelatihan->tanggal_mulai = $request->tanggal_mulai;
        $pelatihan->tanggal_selesai = $request->tanggal_selesai;
        $pelatihan->deskripsi_pelatihan = $request->deskripsi_pelatihan;
        $pelatihan->save();

        // Simpan ID fasilitator dan ID pelatihan
        foreach ($request->id_fasilitator as $id_fasilitator) {
            $pelatihan->fasilitator_pelatihan()->attach($id_fasilitator, ['id_pelatihan' => $pelatihan->id_pelatihan]);
        }

        // dd($pelatihan);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $path = $file->storeAs('image', $file->getClientOriginalName()); // Simpan dengan nama asli
                $gambarPelatihan = new gambar_pelatihan(['path' => $path]);
                $gambarPelatihan->id_pelatihan = $pelatihan->id_pelatihan;
                $pelatihan->gambarPelatihan()->save($gambarPelatihan);
            }
        }

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                $path = $file->storeAs('file', $file->getClientOriginalName()); // Simpan dengan nama asli
                $filePelatihan = new file_pelatihan(['path' => $path]);
                $filePelatihan->id_pelatihan = $pelatihan->id_pelatihan;
                $pelatihan->filePelatihan()->save($filePelatihan);
            }
        }


        return redirect()->route('dashboard.reguler.index')->with('success', 'Data berhasil disimpan');
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('file');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);

        return response()->json(['url' => asset('images/' . $imageName)]);
    }

    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $file = $request->file('file');
        $fileName = time() . '.' . $file->extension();
        $file->move(public_path('files'), $fileName);

        return response()->json(['url' => asset('files/' . $fileName)]);
    }



    // $request->validate([
    //     'nama_pelatihan' => 'required',
    //     'image.*' => 'required|image|max:2048',
    //     'file.*' => 'required|max:2048|mimes:pdf,docx',
    //     'deskripsi_pelatihan' => 'required',
    //     'fasilitators.*' => 'nullable|exists:fasilitator_pelatihan_test,id_fasilitator',
    //     'judul_materi.*' => 'nullable',
    // ]);



    // // Simpan data formulir ke dalam database
    // $pelatihan = new pelatihan();
    // $pelatihan->nama_pelatihan = $request->input('nama_pelatihan');
    // $pelatihan->deskripsi_pelatihan = $request->input('deskripsi_pelatihan');

    // // Setel atribut-atribut lain yang sesuai
    // $pelatihan->id_tema = $request->input('id_tema');
    // $pelatihan->fee_pelatihan = $request->input('fee_pelatihan');
    // $pelatihan->tanggal_mulai = $request->input('tanggal_mulai');
    // $pelatihan->tanggal_selesai = $request->input('tanggal_selesai');
    // $pelatihan->save(); 


    // if ($request->hasFile('image')) {
    //     foreach ($request->file('image') as $file) {
    //         $path = $file->store('image');
    //         $gambarPelatihan = new gambar_pelatihan(['path' => $path,]);
    //         $gambarPelatihan->id_pelatihan = $pelatihan->id_pelatihan;
    //         $pelatihan->gambarPelatihan()->save($gambarPelatihan);
    //     }
    // }

    // if ($request->hasFile('file')) {
    //     foreach ($request->file('file') as $file) {
    //         $path = $file->store('file');
    //         $filePelatihan = new file_pelatihan(['path' => $path]);
    //         $filePelatihan->id_pelatihan = $pelatihan->id_pelatihan;
    //         $pelatihan->filePelatihan()->save($filePelatihan);
    //     }
    // }

    // // Save the pelatihan object first
    // foreach ($request->input('id_fasilitator') as $key => $value) {
    //     $fasilitators = new pelatihan_fasilitator();
    //     $fasilitators->id_fasilitator = $value;
    //     $fasilitators->id_pelatihan = $pelatihan->id_pelatihan;
    //     $fasilitators->judul_materi = $request->input('judul_materi')[$key];
    //     $fasilitators->save();
    // }
    // dd($fasilitators);

    // $pelatihan->save();

    // for ($i = 0; $i < count($request->id_fasilitator); $i++) {
    //     $fasilitators = new pelatihan_fasilitator();
    //     $fasilitators->id_fasilitator = $request->id_fasilitator[$i];
    //     $fasilitators->judul_materi = $request->judul_materi[$i];
    //     $fasilitators->id_pelatihan = $pelatihan->id_pelatihan;

    //     // Tambahkan ini untuk melihat data yang dicoba disimpan
    //     dd($fasilitators);

    //     $fasilitators->save();
    // }



    // Simpan data dinamis (fasilitator) ke dalam database
    // $fasilitators = $request->input('id_fasilitator');
    // foreach ($fasilitators as $idFasilitator) {
    //     pelatihan_fasilitator::create([
    //         'id_pelatihan' => $pelatihan->id_pelatihan, // Menghubungkan dengan data "$pelatihan"
    //         'id_fasilitator' => $idFasilitator,
    //     ]);
    // }
    // if (!empty($fasilitators)) {
    //     $pelatihan->fasilitators()->attach($fasilitators);
    // }

    // Proses data dinamis silabus
    // $judulSilabus = $request->input('judul');
    // $silabusData = $request->input('silabus');
    // for ($i = 0; $i < count($judulSilabus); $i++) {
    //     silabus_pelatihan::create([
    //         'id_pelatihan' => $pelatihan->id_pelatihan,
    //         'judul' => $judulSilabus[$i],
    //         'silabus' => $silabusData[$i],
    //     ]);
    // }


    // if (!empty($judulSilabus)) {
    //     for ($i = 0; $i < count($judulSilabus); $i++) {
    //         silabus_pelatihan::create([
    //             'id_pelatihan' => $pelatihan->id, // Menghubungkan dengan data "pelatihan"
    //             'judul' => $judulSilabus[$i],
    //             'silabus' => $silabus[$i], 
    //         ]);
    //     }
    // }

    // for ($i = 0; $i < count($request->id_karyawan); $i++) {
    //     $pekerjaProyek = new PekerjaProyek();
    //     $pekerjaProyek->id_karyawan = $request->id_karyawan[$i];
    //     $pekerjaProyek->id_jabatan_proyek = $request->id_jabatan_proyek[$i];
    //     $pekerjaProyek->id_proyek = $proyek->id_proyek; // Mengaitkan pekerja proyek dengan proyek yang telah disimpan sebelumnya
    //     $pekerjaProyek->save();
    // }



    /**
     * Display the specified resource.
     */
    public function show($id_pelatihan)
    {
        // Pastikan $id_pelatihan adalah integer sebelum menggunakannya dalam query
        $id_pelatihan = (int)$id_pelatihan;
        $pelatihan = Pelatihan::findOrFail($id_pelatihan); // Assuming you have a Pelatihan model

        // Now you have the $pelatihan object, you can access its properties like nama_pelatihan
        $nama_pelatihan = $pelatihan->nama_pelatihan;

        // Continue with your existing code to fetch data related to the $id_pelatihan
        $data = peserta_pelatihan_test::with('pelatihan', 'gender', 'rentang_usia', 'negara', 'provinsi', 'kabupaten_kota', 'informasi_pelatihan')
            ->where('id_pelatihan', $id_pelatihan)
            ->get();

        // Ambil data UserPresensi yang sudah melakukan presensi
        // $dataHadir = UserPresensi::whereHas('presensi', function ($query) use ($id_pelatihan) {
        //     $query->where('id_pelatihan', $id_pelatihan);
        // })->with(['presensi', 'user'])->get();

        // $presensiStatus = Hadir::where('id_pelatihan', $id_pelatihan)->value('status');

        // Menyiapkan link unduhan file bukti bayar
        // $downloadLinks = [];
        // foreach ($data as $peserta) {
        //     $buktiBayarPath = storage_path('app/' . $peserta->bukti_bayar);
        //     $downloadLinks[$peserta->id] = file_exists($buktiBayarPath) ? route('download.bukti_bayar', ['id' => $peserta->id]) : null;
        // }
        // dd($data);
        return view('dashboard.reguler.show', compact('data', 'dataHadir', 'presensiStatus', 'nama_pelatihan'));
    }

    public function downloadBuktiBayar($filename)
    {
        $path = storage_path('app/public/bukti_bayar/' . $filename);

        if (file_exists($path)) {
            return response()->download($path, null, [], null, 'image/png');
        } else {
            abort(404);
        }
    }

    public function aturPresensi($id_pelatihan, $aksi)
    {
        $id_pelatihan = (int)$id_pelatihan;
        $presensi = Hadir::where('id_pelatihan', $id_pelatihan)->first();
        // dd($presensi);

        if (!$presensi) {
            $presensiBaru = new Hadir();
            $presensiBaru->status = 'buka';
            $presensiBaru->id_pelatihan = $id_pelatihan;
            $presensiBaru->save();

            $pesan = 'Presensi berhasil dibuka';
        } else {
            if ($aksi == 'tutup') {
                $presensi->status = 'tutup';
                $presensi->save();

                $pesan = 'Presensi berhasil ditutup';
            } else {
                $pesan = 'Presensi sudah dibuka sebelumnya';
            }
        }

        return redirect()->route('dashboard.reguler.show', ['id' => $id_pelatihan])->with('success', $pesan);
    }


    public function exportPelatihan(Request $request, $id_pelatihan)
    {
        $data = peserta_pelatihan_test::with('pelatihan', 'gender', 'rentang_usia', 'negara', 'provinsi', 'kabupaten_kota', 'informasi_pelatihan')
            ->where('id_pelatihan', $id_pelatihan)
            ->get();
        return Excel::download(new PesertaPelatihanExport($data), 'peserta_pelatihan.xlsx');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = pelatihan::find($id);
        $oldIdFasilitator = $data->fasilitator_pelatihan->pluck('id_fasilitator')->toArray();
        $oldImages = $data->gambarPelatihan()->pluck('path')->toArray();
        $oldFiles = $data->filePelatihan()->pluck('path')->toArray();
        return view('dashboard.reguler.edit', compact('data', 'oldIdFasilitator', 'oldImages', 'oldFiles'), [
            'tema' => Tema::all(),
            'jenis_produk' => Produk::all(),
            'fasilitator_pelatihan' => fasilitator_pelatihan_test::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        // Validasi input
        $request->validate(
            [
                'nama_pelatihan' => 'required|string',
                'id_tema' => 'required|exists:tema,id',
                'fee_pelatihan' => 'required|numeric',
                'metode_pelatihan' => 'required|string|in:Online,Offline',
                'lokasi_pelatihan' => 'required|string',
                'kuota_peserta' => 'required|integer',
                'tanggal_pendaftaran' => 'required|date',
                'tanggal_batas_pendaftaran' => 'required|date|after:tanggal_pendaftaran',
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date|after:tanggal_mulai',
                'id_fasilitator' => 'required|array',
                'image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'file.*' => 'required|mimes:pdf,doc,docx|max:2048',
                'deskripsi_pelatihan' => 'required',
            ],
            [
                'nama_pelatihan.required' => 'Kolom nama pelatihan wajib diisi.',
                'id_tema.required' => 'Kolom tema wajib diisi.',
                'id_tema.exists' => 'Tema yang dipilih tidak valid.',
                'lokasi_pelatihan.required' => 'Kolom lokasi pelatihan wajib diisi.',
                'tanggal_pendaftaran.required' => 'Tanggal pendaftaran harus diisi.',
                'tanggal_batas_pendaftaran.required' => 'Tanggal batas pendaftaran harus diisi.',
                'tanggal_batas_pendaftaran.after' => 'Tanggal batas pendaftaran harus setelah tanggal pendaftaran.',
                'tanggal_mulai.required' => 'Tanggal mulai harus diisi.',
                'tanggal_selesai.required' => 'Tanggal selesai harus diisi.',
                'tanggal_selesai.after' => 'Tanggal selesai harus setelah tanggal mulai.',
                'fee_pelatihan.required' => 'Kolom fee pelatihan wajib diisi.',
                'fee_pelatihan.numeric' => 'Kolom fee pelatihan harus berupa angka.',
                'deskripsi_pelatihan' => 'Kolom deskripsi pelatihan harus diisi.',
            ]
        );


        // Simpan data pelatihan 
        $pelatihan = Pelatihan::findOrFail($id);
        $pelatihan->nama_pelatihan = $request->nama_pelatihan;
        $pelatihan->id_tema = $request->id_tema;
        $pelatihan->fee_pelatihan = $request->fee_pelatihan;
        $pelatihan->metode_pelatihan = $request->metode_pelatihan;
        $pelatihan->lokasi_pelatihan = $request->lokasi_pelatihan;
        $pelatihan->kuota_peserta = $request->kuota_peserta;
        $pelatihan->tanggal_pendaftaran = $request->tanggal_pendaftaran;
        $pelatihan->tanggal_batas_pendaftaran = $request->tanggal_batas_pendaftaran;
        $pelatihan->tanggal_mulai = $request->tanggal_mulai;
        $pelatihan->tanggal_selesai = $request->tanggal_selesai;
        $pelatihan->deskripsi_pelatihan = $request->deskripsi_pelatihan;
        $pelatihan->save();

        // Simpan ID fasilitator dan ID pelatihan
        foreach ($request->id_fasilitator as $id_fasilitator) {
            $pelatihan->fasilitator_pelatihan()->toggle($id_fasilitator, ['id_pelatihan' => $pelatihan->id_pelatihan]);
        }
        // $fasilitatorPelatihan = $pelatihan->fasilitator_pelatihan;
        // dd($fasilitatorPelatihan);

        // dd($pelatihan->id_fasilitator);

        if ($request->hasFile('image')) {
            // Perbarui gambar pelatihan
            foreach ($pelatihan->gambarPelatihan as $gambar) {
                Storage::delete($gambar->path); // Hapus gambar lama
                $gambar->delete(); // Hapus entri gambar lama dari database
            }

            // Simpan gambar-gambar baru
            foreach ($request->file('image') as $file) {
                $path = $file->storeAs('image', $file->getClientOriginalName()); // Simpan dengan nama asli
                $gambarPelatihan = new gambar_pelatihan(['path' => $path]);
                $pelatihan->gambarPelatihan()->save($gambarPelatihan);
            }
        }

        if ($request->hasFile('file')) {
            // Perbarui file pelatihan
            foreach ($pelatihan->filePelatihan as $filePelatihan) {
                Storage::delete($filePelatihan->path); // Hapus file lama
                $filePelatihan->delete(); // Hapus entri file lama dari database
            }

            // Simpan file-file baru
            foreach ($request->file('file') as $file) {
                $path = $file->storeAs('file', $file->getClientOriginalName()); // Simpan dengan nama asli
                $filePelatihan = new file_pelatihan(['path' => $path]);
                $pelatihan->filePelatihan()->save($filePelatihan);
            }
        }

        return redirect()->route('dashboard.reguler.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        pelatihan_fasilitator::where('id_pelatihan', $id)->delete();
        $pelatihan = pelatihan::find($id);
        $pelatihan->delete();

        return redirect('/dashboard/reguler')->with('success', 'Berhasil menghapus data');
    }
}
