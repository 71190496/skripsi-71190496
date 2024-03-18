<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Post;
use App\Models\Tema;
use App\Models\Hadir;
use App\Models\gender;
use App\Models\negara;
use App\Models\Produk;
use App\Models\provinsi;
use App\Models\pelatihan;
use App\Models\rentang_usia;
use Illuminate\Http\Request;
use App\Models\kabupaten_kota;
use App\Models\jenis_organisasi;
use App\Models\silabus_pelatihan;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\pelatihan_fasilitator;
use App\Models\peserta_pelatihan_test;
use App\Exports\PesertaPelatihanExport;
use Illuminate\Support\Facades\Session;
use App\Models\fasilitator_pelatihan_test;
use Maatwebsite\Excel\Concerns\Exportable;

class DashboardDaftarPelatihan extends Controller
{
    // use Exportable;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = pelatihan::all();
        return view('dashboard.adminpelatihan.index', ['pelatihan' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.adminpelatihan.create', [
            'jenis_produk' => Produk::all(),
            'tema' => Tema::all(),
            'fasilitator_pelatihan' => fasilitator_pelatihan_test::all()
        ]);
    }

    public function store(Request $request)
    {
        // var_dump($request->all());
        dd($request);
        // Validasi data formulir jika diperlukan
        $request->validate([
            'nama_pelatihan' => 'required',
            // 'image' => 'image|file|max:1024',
            'deskripsi_pelatihan' => 'required',
            'fasilitators.*' => 'nullable|exists:fasilitator_pelatihan_test,id_fasilitator',
            'judul_materi.*' => 'nullable',
        ]);



        // Simpan data formulir ke dalam database
        $pelatihan = new pelatihan();
        $pelatihan->nama_pelatihan = $request->input('nama_pelatihan');
        $pelatihan->deskripsi_pelatihan = $request->input('deskripsi_pelatihan');

        // Setel atribut-atribut lain yang sesuai
        $pelatihan->id_tema = $request->input('id_tema'); 
        $pelatihan->fee_pelatihan = $request->input('fee_pelatihan');
        // $pelatihan->tanggal_mulai = $request->input('tanggal_mulai');
        // $pelatihan->tanggal_selesai = $request->input('tanggal_selesai');
        // $pelatihan->tanggal_posting = $request->input('tanggal_posting');
        // // $pelatihan->tanggal_batasan = $request->input('tanggal_batasan');
        // $pelatihan->image = $request->input('image');
        // $pelatihan->file = $request->input('file');


        // if ($request->hasFile('image')) {
        //     $pelatihan->image = $request->file('image')->store('images');
        // }

        // if ($request->hasFile('file')) {
        //     $data['file'] = $request->file('file')->store('files');
        // }

        // Save the pelatihan object first
        foreach ($request->input('id_fasilitator') as $key => $value) {
            $fasilitators = new pelatihan_fasilitator();
            $fasilitators->id_fasilitator = $value;
            $fasilitators->judul_materi = $request->input('judul_materi')[$key]; 
            $fasilitators->save();
        }

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

        return redirect()->route('dashboard/adminpelatihan/index')->with('success', 'Data berhasil disimpan');
    }


    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     dd($request);
    //     // return $request->file('image')->store('images');

    //     $data = $request->validate([
    //         'nama_pelatihan' => 'required',
    //         'image' => 'image|file|max:1024',
    //         // 'file' => 'pdf,xls,docx',
    //         'deskripsi_pelatihan' => 'required',
    //     ], [
    //         'nama_pelatihan.required' => 'Field nama pelatihan wajib diisi',
    //         'image.required' => 'Field upload gambar harus format gambar',
    //         'deskripsi_pelatihan.required' => 'Field deskripsi pelatihan wajib diisi',
    //     ]);

    //     // $fields = $request->input('fasilitator');

    //     $data['id_tema'] = $request->id_tema;
    //     $data['id_jenis_produk'] = $request->id_jenis_produk;
    //     $data['id_fasilitator1'] = $request->id_fasilitator1;
    //     $data['id_fasilitator2'] = $request->id_fasilitator2;
    //     $data['id_fasilitator3'] = $request->id_fasilitator3;
    //     $data['nama_pelatihan'] = $request->nama_pelatihan;
    //     $data['fee_pelatihan'] = $request->fee_pelatihan;
    //     $data['tanggal_mulai'] = $request->tanggal_mulai;
    //     $data['tanggal_selesai'] = $request->tanggal_selesai;
    //     $data['tanggal_posting'] = $request->tanggal_posting;
    //     $data['tanggal_batasan'] = $request->tanggal_batasan;
    //     $data['judul_materi'] = $request->judul_materi;
    //     $data['judul_silabus1'] = $request->judul_silabus1;
    //     $data['silabus1'] = $request->silabus1;
    //     $data['judul_silabus2'] = $request->judul_silabus2;
    //     $data['silabus2'] = $request->silabus2;
    //     $data['judul_silabus3'] = $request->judul_silabus3;
    //     $data['silabus3'] = $request->silabus3;
    //     $data['image'] = $request->image;
    //     $data['file'] = $request->file;

    // if ($request->hasFile('image')) {
    //     $data['image'] = $request->file('image')->store('images');
    // }

    //     if ($request->hasFile('file')) {
    //         $data['file'] = $request->file('file')->store('files');
    //     }

    //     // dd($data);
    //     pelatihan::create($data);
    //     return redirect()->to('dashboard/adminpelatihan')->with('success', 'Berhasil menambah pelatihan');
    // }

    /**
     * Display the specified resource.
     */
    public function show($id_pelatihan)
    {
        $data = peserta_pelatihan_test::with('pelatihan', 'gender', 'rentang_usia', 'negara', 'provinsi', 'kabupaten_kota', 'informasi_pelatihan')
            ->where('id_pelatihan', $id_pelatihan)
            ->get();

        $dataHadir = Hadir::where('id_pelatihan', $id_pelatihan)->get();
        return view('dashboard.adminpelatihan.show', compact('data', 'dataHadir'));
    }

    // public function showDaftarHadir($id_pelatihan)
    // {
    //     $datahadir = Hadir::where('id_pelatihan', $id_pelatihan)->get();
    //     return view('dashboard.adminpelatihan.show', compact('datahadir'));
    // }

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
        return view('dashboard.adminpelatihan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = pelatihan::find($id);
        $data->delete();

        return redirect('/dashboard/adminpelatihan')->with('success', 'Berhasil menghapus data');
    }
}
