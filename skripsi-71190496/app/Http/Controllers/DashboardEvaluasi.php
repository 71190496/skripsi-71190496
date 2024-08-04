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
use App\Models\peserta_permintaan;
use App\Models\evaluasi_permintaan;
use App\Models\evaluasi_pertanyaan;
use App\Http\Controllers\Controller;
use App\Models\pelatihan_konsultasi;
use App\Models\permintaan_pelatihan;
use App\Models\peserta_pelatihan_test;
use App\Models\form_evaluasi_pelatihan;
use App\Models\form_evaluasi_konsultasi;
use App\Models\form_evaluasi_permintaan;
use App\Models\evaluasi_pelatihan_reguler;
use App\Models\fasilitator_pelatihan_test;
use App\Models\evaluasi_jawaban_permintaan;
use App\Models\evaluasi_pelatihan_konsultasi;
use App\Models\evaluasi_pelatihan_permintaan;
use App\Models\evaluasi_pertanyaan_permintaan;
use App\Models\peserta_konsultasi;

class DashboardEvaluasi extends Controller
{
    public function index()
    {
        $data = pelatihan::orderBy('id_pelatihan')->get();
        $data2 = permintaan::orderBy('id')->get();
        $data3 = pelatihan_konsultasi::orderBy('id_konsultasi')->get();
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
        $id_pelatihan = $data[0]->id_pelatihan;
        return view('dashboard.evaluasi.create')->with('id_pelatihan', $id_pelatihan);
    }

    public function createPermintaan($id)
    {
        $id = permintaan::with('fasilitator_permintaan')->where('id', '=', $id)->get();
        $jsonString = json_encode($id);
        $data = json_decode($jsonString);
        $id_permintaan = $data[0]->id;
        // dd($id_permintaan);
        return view('dashboard.evaluasi.createpermintaan')->with('id_permintaan', $id_permintaan);
    }

    public function createKonsultasi($id)
    {
        $id = Konsultasi::where('id', '=', $id)->get();
        $jsonString = json_encode($id);
        $data = json_decode($jsonString);
        $id_konsultasi = $data[0]->id;
        // dd($id_konsultasi);
        return view('dashboard.evaluasi.createKonsultasi')->with('id_konsultasi', $id_konsultasi);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $pelatihan = new form_evaluasi_pelatihan();
        $pelatihan->id_pelatihan = $request->id_pelatihan;
        $contentArray = json_decode($request->form, true);
        $pelatihan->content =  $contentArray;
        $pelatihan->save();


        // Redirect atau berikan respons sesuai kebutuhan
        return redirect()->route('dashboard.evaluasi.index')->with('success', 'Form berhasil disimpan.');
    }

    public function saveForm(Request $request)
    {
        // dd($request->all());
        $permintaan = new form_evaluasi_permintaan();
        $permintaan->id_permintaan = $request->id_permintaan;
        // $contentArray = json_decode($request->form, true);
        $permintaan->content = $request->form;
        // dd($permintaan);
        $permintaan->save();
        return redirect()->route('dashboard.evaluasi.index')->with('success', 'Form berhasil disimpan.');
    }

    public function saveFormKonsultasi(Request $request)
    {
        // dd($request->all());
        $konsultasi = new form_evaluasi_konsultasi();
        $konsultasi->id_konsultasi = $request->id_konsultasi;
        $contentArray = json_decode($request->form, true);
        $konsultasi->content = $contentArray;
        $konsultasi->save();
        return redirect()->route('dashboard.evaluasi.index')->with('success', 'Form berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id_pelatihan)
    {
        $id_pelatihan = pelatihan::with('fasilitator_pelatihan')->where('id_pelatihan', '=', $id_pelatihan)->get();
        $jsonString = json_encode($id_pelatihan);
        $data = json_decode($jsonString);
        $nilai = $data[0]->id_pelatihan;

        $form = form_evaluasi_pelatihan::where('id_pelatihan', $nilai)->first();
        // dd($form);

        // Tampilkan pesan atau tindakan yang sesuai jika data form evaluasi tidak tersedia
        if (!$form || !isset($form->content)) {
            $pesertaStatus = peserta_pelatihan_test::with('pelatihan', 'gender', 'rentang_usia', 'negara', 'provinsi', 'kabupaten_kota', 'informasi_pelatihan')
                ->where('id_pelatihan', $nilai)
                ->get();

            $form1 = form_evaluasi_pelatihan::where('id_pelatihan', $nilai)->get();
            $showButtons = $form1->isEmpty(); // Check jika data form kosong
            return view('dashboard.evaluasi.show', compact('nilai', 'pesertaStatus', 'showButtons'));
        }
        // Decode JSON menjadi array PHP
        $contentArray = json_decode($form->content, true);

        // Inisialisasi array untuk menyimpan label
        $labels = [];
        // Iterasi melalui setiap objek dalam array content
        foreach ($contentArray as $item) {
            // Memeriksa apakah tipe bukan header dan bukan paragraph
            if ($item['type'] !== 'header' && $item['type'] !== 'paragraph') {
                // Jika objek memiliki properti 'label', tambahkan label ke dalam array
                if (isset($item['label'])) {
                    $label = strip_tags($item['label']); // Menghilangkan tag HTML dari label

                    $labels[] = $label;
                }
            }
        }

        $peserta = evaluasi_pelatihan_reguler::with('user')
            ->where('id_pelatihan', $nilai)
            ->get();
        // dd($peserta); 

        $nama_peserta =  [];
        foreach ($peserta as $evaluation) {
            // Akses informasi pengguna yang terkait dengan evaluasi saat ini
            $user = $evaluation->user;
            // Cek jika pengguna ada
            if ($user) {
                // Akses properti pengguna seperti id, name, dll.
                // $userId = $user->id;
                $nama_peserta[] = $user->name;
            }
        }

        $respon = evaluasi_pelatihan_reguler::with('user')
            ->where('id_pelatihan', $nilai)
            ->get();
        // dd($respon);
        $respons = [];

        // Iterasi melalui setiap item dalam koleksi $respon
        foreach ($respon as $evaluation) {
            // Akses properti data_respons dari objek evaluasi saat ini
            $dataRespons = $evaluation->data_respons;

            // Periksa apakah data_respons tidak null
            if ($dataRespons !== null) {
                // Mendekode data JSON menjadi array asosiatif
                $decodedDataRespons = json_decode($dataRespons, true);

                // Mengambil nilai-nilai dari array asosiatif dan menambahkannya ke dalam $respons
                $respons[] = array_values($decodedDataRespons);
            }
        }

        $pesertaStatus = peserta_pelatihan_test::with('pelatihan', 'gender', 'rentang_usia', 'negara', 'provinsi', 'kabupaten_kota', 'informasi_pelatihan')
            ->where('id_pelatihan', $nilai)
            ->get();
        // dd($pesertaStatus);

        // foreach ($pesertaStatus as $peserta) {
        //     $peserta->is_filled = evaluasi_pelatihan_reguler::where('id_pelatihan', $nilai)
        //         ->where('id_user', $peserta->id_user)
        //         ->exists();
        // }


        $form1 = form_evaluasi_pelatihan::where('id_pelatihan', $nilai)->get();
        $showButtons = $form1->isEmpty(); // Check if $permintaan is empty
        return view('dashboard.evaluasi.show', compact('data', 'pesertaStatus', 'nilai', 'labels', 'respons', 'nama_peserta', 'showButtons'));
    }

    public function showPermintaan($id)
    {
        // $data = evalPeserta::where('id', $id)->get(); 
        // $id = (int)$id;
        $id = permintaan::with('fasilitator_permintaan')->where('id', '=', $id)->get();
        $jsonString = json_encode($id);
        $data = json_decode($jsonString);
        $nilai = $data[0]->id;
        // dd($id);

        $form = form_evaluasi_permintaan::where('id_permintaan', $nilai)->first();
        // dd($form);

        if (!$form || !isset($form->content)) {
            $pesertaStatus = peserta_permintaan::where('id_permintaan', $nilai)
                ->get();

            // Tampilkan pesan atau lakukan tindakan yang sesuai jika data form evaluasi tidak tersedia
            $form1 = form_evaluasi_permintaan::where('id_permintaan', $nilai)->get();
            $showButtons = $form1->isEmpty(); // Check jika data form kosong
            return view('dashboard.evaluasi.showpermintaan', compact('nilai', 'pesertaStatus', 'showButtons'));
        }
        // Decode JSON menjadi array PHP
        $contentArray = json_decode($form->content, true);
        // dd($contentArray);

        // Inisialisasi array untuk menyimpan label
        $labels = [];
        // Iterasi melalui setiap objek dalam array content
        foreach ($contentArray as $item) {
            // Memeriksa apakah tipe bukan header dan bukan paragraph
            if ($item['type'] !== 'header' && $item['type'] !== 'paragraph') {
                // Jika objek memiliki properti 'label', tambahkan label ke dalam array
                if (isset($item['label'])) {
                    $label = strip_tags($item['label']); // Menghilangkan tag HTML dari label

                    $labels[] = $label;
                    // dd($label); // Anda dapat menampilkan label di sini jika perlu
                }
            }
        }

        // dd($labels);

        $peserta = evaluasi_pelatihan_permintaan::with('user')
            ->where('id_permintaan', $nilai)
            ->get();
        // dd($peserta); 

        $nama_peserta =  [];
        foreach ($peserta as $evaluation) {
            // Akses informasi pengguna yang terkait dengan evaluasi saat ini
            $user = $evaluation->user;
            // dd($user);
            // Cek jika pengguna ada
            if ($user) {
                // Akses properti pengguna seperti id, name, dll.
                // $userId = $user->id;
                $nama_peserta[] = $user->name;
            }
        }

        $respon = evaluasi_pelatihan_permintaan::with('user')
            ->where('id_permintaan', $nilai)
            ->get();
        // dd($respon);
        $respons = [];

        // Iterasi melalui setiap item dalam koleksi $respon
        foreach ($respon as $evaluation) {
            // Akses properti data_respons dari objek evaluasi saat ini
            $dataRespons = $evaluation->data_respons;

            // Periksa apakah data_respons tidak null
            if ($dataRespons !== null) {
                // Mendekode data JSON menjadi array asosiatif
                $decodedDataRespons = json_decode($dataRespons, true);

                // Mengambil nilai-nilai dari array asosiatif dan menambahkannya ke dalam $respons
                $respons[] = array_values($decodedDataRespons);
            }
        }

        $pesertaStatus = peserta_permintaan::where('id_permintaan', $nilai)
            ->get();

        $form1 = form_evaluasi_permintaan::where('id_permintaan', $nilai)->get();
        $showButtons = $form1->isEmpty(); // Check jika data form kosong
        return view('dashboard.evaluasi.showpermintaan', compact('id', 'pesertaStatus', 'data', 'nilai', 'labels', 'respons', 'nama_peserta', 'showButtons'));
    }

    public function showKonsultasi($id)
    {
        // $data = evalPeserta::where('id', $id)->get(); 
        // $id = (int)$id;
        $id = Konsultasi::where('id', '=', $id)->get();
        $jsonString = json_encode($id);
        $data = json_decode($jsonString);
        $nilai = $data[0]->id;
        // dd($id);

        $form = form_evaluasi_konsultasi::where('id_konsultasi', $nilai)->first();
        // dd($form);

        if (!$form || !isset($form->content)) {
            $pesertaStatus = peserta_konsultasi::where('id_konsultasi', $nilai)
                ->get();
            // Tampilkan pesan atau lakukan tindakan yang sesuai jika data form evaluasi tidak tersedia
            $form1 = form_evaluasi_konsultasi::where('id_konsultasi', $nilai)->get();
            $showButtons = $form1->isEmpty(); // Check jika data form kosong
            return view('dashboard.evaluasi.showkonsultasi', compact('nilai','pesertaStatus', 'showButtons'));
        }
        // Decode JSON menjadi array PHP
        $contentArray = json_decode($form->content, true);
        // dd($contentArray);

        // Inisialisasi array untuk menyimpan label
        $labels = [];
        // Iterasi melalui setiap objek dalam array content
        foreach ($contentArray as $item) {
            // Memeriksa apakah tipe bukan header dan bukan paragraph
            if ($item['type'] !== 'header' && $item['type'] !== 'paragraph') {
                // Jika objek memiliki properti 'label', tambahkan label ke dalam array
                if (isset($item['label'])) {
                    $label = strip_tags($item['label']); // Menghilangkan tag HTML dari label

                    $labels[] = $label;
                    // dd($label); // Anda dapat menampilkan label di sini jika perlu
                }
            }
        }

        // dd($labels);

        $peserta = evaluasi_pelatihan_konsultasi::with('user')
            ->where('id_konsultasi', $nilai)
            ->get();
        // dd($peserta); 

        $nama_peserta =  [];
        foreach ($peserta as $evaluation) {
            // Akses informasi pengguna yang terkait dengan evaluasi saat ini
            $user = $evaluation->user;
            // dd($user);
            // Cek jika pengguna ada
            if ($user) {
                // Akses properti pengguna seperti id, name, dll.
                // $userId = $user->id;
                $nama_peserta[] = $user->name;
            }
        }

        $respon = evaluasi_pelatihan_konsultasi::with('user')
            ->where('id_konsultasi', $nilai)
            ->get();
        // dd($respon);
        $respons = [];

        // Iterasi melalui setiap item dalam koleksi $respon
        foreach ($respon as $evaluation) {
            // Akses properti data_respons dari objek evaluasi saat ini
            $dataRespons = $evaluation->data_respons;

            // Periksa apakah data_respons tidak null
            if ($dataRespons !== null) {
                // Mendekode data JSON menjadi array asosiatif
                $decodedDataRespons = json_decode($dataRespons, true);

                // Mengambil nilai-nilai dari array asosiatif dan menambahkannya ke dalam $respons
                $respons[] = array_values($decodedDataRespons);
            }
        }

        $pesertaStatus = peserta_konsultasi::where('id_konsultasi', $nilai)->get();
        
        $form1 = form_evaluasi_konsultasi::where('id_konsultasi', $nilai)->get();
        $showButtons = $form1->isEmpty(); // Check jika data form kosong
        return view('dashboard.evaluasi.showkonsultasi', compact('data','pesertaStatus', 'nilai', 'labels', 'respons', 'nama_peserta', 'showButtons'));
    }

    public function editReguler($id)
    {
        $id_pelatihan = form_evaluasi_pelatihan::where('id_pelatihan', $id)->first();
        return $id_pelatihan;
    }

    public function updateReguler(Request $request)
    {
        //     dd($request->all());
        $id_pelatihan = $request->id;
        $pelatihan = form_evaluasi_pelatihan::where('id_pelatihan', $id_pelatihan)->firstOrFail();
        // dd($pelatihan);
        // $pelatihan->id_pelatihan = $request->id_pelatihan;
        $pelatihan->content = $request->form;
        $pelatihan->update();

        return redirect('/dashboard/evaluasi')->with('success', 'Update form berhasil');
    }

    public function editPermintaan($id)
    {
        $id_permintaan = form_evaluasi_permintaan::where('id_permintaan', $id)->first();
        return $id_permintaan;
    }

    public function updatePermintaan(Request $request)
    {
        // dd($request->all());
        $id_permintaan = $request->id;
        $permintaan = form_evaluasi_permintaan::where('id_permintaan', $id_permintaan)->firstOrFail();
        // dd($permintaan);
        // $permintaan->id_permintaan = $request->id_permintaan;
        $permintaan->content = $request->form;
        $permintaan->update();

        return redirect('/dashboard/evaluasi')->with('success', 'Update form berhasil');
    }

    public function editKonsultasi($id)
    {
        $id_konsultasi = form_evaluasi_konsultasi::where('id_konsultasi', $id)->first();
        return $id_konsultasi;
    }

    public function updateKonsultasi(Request $request)
    {
        //     dd($request->all());
        $id_konsultasi = $request->id;
        $konsultasi = form_evaluasi_konsultasi::where('id_konsultasi', $id_konsultasi)->firstOrFail();
        // dd($pelatihan);
        // $konsultasi->id_pelatihan = $request->id_pelatihan;
        $konsultasi->content = $request->form;
        $konsultasi->update();

        return redirect('/dashboard/evaluasi')->with('success', 'Update form berhasil');
    }
}
