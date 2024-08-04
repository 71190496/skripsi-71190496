<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use App\Models\Produk;
use App\Models\Survey;
use App\Models\pelatihan;
use App\Models\Konsultasi;
use App\Models\permintaan;
use Illuminate\Http\Request;
use App\Models\permintaan_pelatihan;
use App\Models\form_survey_reguler;
use App\Models\form_survey_permintaan;
use App\Models\form_survey_konsultasi;
use App\Models\survey_pelatihan_reguler;
use App\Models\survey_pelatihan_permintaan;
use App\Models\survey_pelatihan_konsultasi;
use App\Exports\SurveyKepuasanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\fasilitator_pelatihan_test;
use App\Models\pelatihan_konsultasi;
use App\Models\peserta_konsultasi;
use App\Models\peserta_pelatihan_test;
use App\Models\peserta_permintaan;

class DashboardSurvey extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = pelatihan::orderBy('id_pelatihan')->get();
        $data2 = permintaan::orderBy('id')->get();
        $data3 = pelatihan_konsultasi::orderBy('id_konsultasi')->get();
        return view('dashboard.surveykepuasan.index', compact('data', 'data2', 'data3'));
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
        return view('dashboard.surveykepuasan.create')->with('id_pelatihan', $id_pelatihan);
    }

    public function createPermintaan($id)
    {
        $id = permintaan::with('fasilitator_permintaan')->where('id', '=', $id)->get();
        $jsonString = json_encode($id);
        $data = json_decode($jsonString);
        $id_permintaan = $data[0]->id;
        // dd($id_permintaan);
        return view('dashboard.surveykepuasan.createpermintaan')->with('id_permintaan', $id_permintaan);
    }

    public function createKonsultasi($id)
    {
        $id = Konsultasi::where('id', '=', $id)->get();
        $jsonString = json_encode($id);
        $data = json_decode($jsonString);
        $id_konsultasi = $data[0]->id;
        // dd($id_permintaan);
        return view('dashboard.surveykepuasan.createKonsultasi')->with('id_konsultasi', $id_konsultasi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all()); 
        $pelatihan = new form_survey_reguler();
        $pelatihan->id_pelatihan = $request->id_pelatihan;
        $contentArray = json_decode($request->form, true);
        $pelatihan->content =  $contentArray;
        $pelatihan->save();

        return redirect()->route('dashboard.surveykepuasan.index')->with('success', 'Form berhasil disimpan.');
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

        $form = form_survey_reguler::where('id_pelatihan', $nilai)->first();
        // dd($form);

        if (!$form || !isset($form->content)) {
            $pesertaStatus = peserta_pelatihan_test::with('pelatihan', 'gender', 'rentang_usia', 'negara', 'provinsi', 'kabupaten_kota', 'informasi_pelatihan')
                ->where('id_pelatihan', $nilai)
                ->get();
            // Tampilkan pesan atau lakukan tindakan yang sesuai jika data form evaluasi tidak tersedia
            $form1 = form_survey_reguler::where('id_pelatihan', $nilai)->get();
            $showButtons = $form1->isEmpty(); // Check if $permintaan is empty
            return view('dashboard.surveykepuasan.show', compact('nilai','pesertaStatus', 'showButtons'));
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

        // dd($labels);

        $peserta = survey_pelatihan_reguler::with('user', 'provinsi', 'kabupaten_kota')
            ->where('id_pelatihan', $nilai)
            ->get();
        // dd($peserta); 

        $nama_peserta =  [];
        foreach ($peserta as $evaluation) {
            $user = $evaluation->user;
            $provinsi = $evaluation->provinsi;
            $kabupaten_kota = $evaluation->kabupaten_kota;

            if ($user && $provinsi && $kabupaten_kota) {
                $nama_peserta[] = [
                    'nama_peserta' => $user->name,
                    'nama_provinsi' => $provinsi->nama_provinsi,
                    'nama_kabupaten_kota' => $kabupaten_kota->nama_kabupaten_kota
                ];
            }
        }

        $respon = survey_pelatihan_reguler::with('user')
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

        $form1 = form_survey_reguler::where('id_pelatihan', $nilai)->get();
        $showButtons = $form1->isEmpty(); // Check if $permintaan is empty
        return view('dashboard.surveykepuasan.show', compact('data','pesertaStatus', 'nilai', 'labels', 'respons', 'nama_peserta', 'showButtons'));
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

        $form = form_survey_permintaan::where('id_permintaan', $nilai)->first();
        // dd($form);

        if (!$form || !isset($form->content)) {
            $pesertaStatus = peserta_permintaan::where('id_permintaan', $nilai)->get();
            // Tampilkan pesan atau lakukan tindakan yang sesuai jika data form evaluasi tidak tersedia
            $form1 = form_survey_permintaan::where('id_permintaan', $nilai)->get();
            $showButtons = $form1->isEmpty(); // Check if $permintaan is empty
            return view('dashboard.surveykepuasan.showpermintaan', compact('nilai','pesertaStatus', 'showButtons'));
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

        $peserta = survey_pelatihan_permintaan::with('user', 'provinsi', 'kabupaten_kota')
            ->where('id_permintaan', $nilai)
            ->get();
        // dd($peserta); 

        $nama_peserta =  [];
        foreach ($peserta as $evaluation) {
            $user = $evaluation->user;
            $provinsi = $evaluation->provinsi;
            $kabupaten_kota = $evaluation->kabupaten_kota;

            if ($user && $provinsi && $kabupaten_kota) {
                $nama_peserta[] = [
                    'nama_peserta' => $user->name,
                    'nama_provinsi' => $provinsi->nama_provinsi,
                    'nama_kabupaten_kota' => $kabupaten_kota->nama_kabupaten_kota
                ];
            }
        }

        $respon = survey_pelatihan_permintaan::with('user')
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
        $pesertaStatus = peserta_permintaan::where('id_permintaan', $nilai)->get();

        $form1 = form_survey_permintaan::where('id_permintaan', $nilai)->get();
        $showButtons = $form1->isEmpty(); // Check if $permintaan is empty
        return view('dashboard.surveykepuasan.showpermintaan', compact('id','pesertaStatus', 'data', 'nilai', 'labels', 'respons', 'nama_peserta', 'showButtons'));
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

        $form = form_survey_konsultasi::where('id_konsultasi', $nilai)->first();
        // dd($form);

        if (!$form || !isset($form->content)) {
            $pesertaStatus = peserta_konsultasi::where('id_konsultasi', $nilai)->get();
            // Tampilkan pesan atau lakukan tindakan yang sesuai jika data form evaluasi tidak tersedia
            $form1 = form_survey_konsultasi::where('id_konsultasi', $nilai)->get();
            $showButtons = $form1->isEmpty(); // Check if $permintaan is empty
            return view('dashboard.surveykepuasan.showkonsultasi', compact('nilai','pesertaStatus', 'showButtons'));
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

        $peserta = survey_pelatihan_konsultasi::with('user', 'provinsi', 'kabupaten_kota')
            ->where('id_konsultasi', $nilai)
            ->get();
        // dd($peserta); 

        $nama_peserta =  [];
        foreach ($peserta as $evaluation) {
            $user = $evaluation->user;
            $provinsi = $evaluation->provinsi;
            $kabupaten_kota = $evaluation->kabupaten_kota;

            if ($user && $provinsi && $kabupaten_kota) {
                $nama_peserta[] = [
                    'nama_peserta' => $user->name,
                    'nama_provinsi' => $provinsi->nama_provinsi,
                    'nama_kabupaten_kota' => $kabupaten_kota->nama_kabupaten_kota
                ];
            }
        }

        $respon = survey_pelatihan_konsultasi::with('user')
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

        $form1 = form_survey_konsultasi::where('id_konsultasi', $nilai)->get();
        $showButtons = $form1->isEmpty(); // Check if $permintaan is empty
        return view('dashboard.surveykepuasan.showkonsultasi', compact('id','pesertaStatus', 'data', 'nilai', 'labels', 'respons', 'nama_peserta', 'showButtons'));
    }

    public function export(Request $request, $id_pelatihan)
    {
        $data = Survey::with('provinsi', 'kabupaten_kota')
            ->where('id_pelatihan', $id_pelatihan)
            ->get();
        return Excel::download(new SurveyKepuasanExport($data), 'survey_pelatihan.xlsx');
    }

    public function savePermintaan(Request $request)
    {
        // dd($request->all());
        $permintaan = new form_survey_permintaan();
        $permintaan->id_permintaan = $request->id_permintaan;
        $contentArray = json_decode($request->form, true);
        $permintaan->content = $contentArray;
        // dd($permintaan);
        $permintaan->save();
        return redirect()->route('dashboard.surveykepuasan.index')->with('success', 'Form berhasil disimpan.');
    }

    public function saveKonsultasi(Request $request)
    {
        // dd($request->all());
        $konsultasi = new form_survey_konsultasi();
        $konsultasi->id_konsultasi = $request->id_konsultasi;
        $contentArray = json_decode($request->form, true);
        $konsultasi->content = $contentArray;
        $konsultasi->save();
        return redirect()->route('dashboard.surveykepuasan.index')->with('success', 'Form berhasil disimpan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Survey $survey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Survey $survey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Survey $survey)
    {
        //
    }

    public function editReguler($id)
    {
        $id_pelatihan = form_survey_reguler::where('id_pelatihan', $id)->first();
        return $id_pelatihan;
    }

    public function updateReguler(Request $request)
    {
        //     dd($request->all());
        $id_pelatihan = $request->id;
        $pelatihan = form_survey_reguler::where('id_pelatihan', $id_pelatihan)->firstOrFail();
        // dd($pelatihan);
        // $pelatihan->id_pelatihan = $request->id_pelatihan;
        $pelatihan->content = $request->form;
        $pelatihan->update();

        return redirect('/dashboard/surveykepuasan')->with('success', 'Update form berhasil');
    }

    public function editPermintaan($id)
    {
        $id_permintaan = form_survey_permintaan::where('id_permintaan', $id)->first();
        return $id_permintaan;
    }

    public function updatePermintaan(Request $request)
    {
        // dd($request->all());
        $id_permintaan = $request->id;
        $permintaan = form_survey_permintaan::where('id_permintaan', $id_permintaan)->firstOrFail();
        // dd($permintaan);
        // $permintaan->id_permintaan = $request->id_permintaan;
        $permintaan->content = $request->form;
        $permintaan->update();

        return redirect('/dashboard/surveykepuasan')->with('success', 'Update form berhasil');
    }

    public function editKonsultasi($id)
    {
        $id_konsultasi = form_survey_konsultasi::where('id_konsultasi', $id)->first();
        return $id_konsultasi;
    }

    public function updateKonsultasi(Request $request)
    {
        //     dd($request->all());
        $id_konsultasi = $request->id;
        $konsultasi = form_survey_konsultasi::where('id_konsultasi', $id_konsultasi)->firstOrFail();
        // dd($pelatihan);
        // $konsultasi->id_pelatihan = $request->id_pelatihan;
        $konsultasi->content = $request->form;
        $konsultasi->update();

        return redirect('/dashboard/surveykepuasan')->with('success', 'Update form berhasil');
    }
}
