<?php

namespace App\Http\Controllers;

use App\Models\negara;
use App\Models\Survey;
use App\Models\provinsi;
use App\Models\pelatihan;
use App\Models\permintaan_pelatihan;
use Illuminate\Http\Request;
use App\Models\kabupaten_kota;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PesertaSurveyKepuasan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('peserta.surveykepuasan.index');
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create($id)
    {
        // Ambil data berdasarkan $id
        $pelatihan = pelatihan::with('fasilitator_pelatihan')->where('id_pelatihan', '=', $id)->first();
        $permintaan = permintaan_pelatihan::where('id', $id)->first();

        // Persiapkan data
        $jsonData = [];

        if ($pelatihan) {
            $jsonData['pelatihan'] = $pelatihan;
        }

        if ($permintaan) {
            $jsonData['permintaan'] = $permintaan;
        }

        $jsonString = json_encode($jsonData);
        $dataArray = json_decode($jsonString, true);

        // Inisialisasi variabel id untuk pelatihan dan permintaan
        $id_pelatihan = null;
        $id_permintaan = null;

        // Periksa apakah data yang ditemukan adalah pelatihan atau permintaan
        if (isset($dataArray['pelatihan'])) {
            // Jika data yang ditemukan adalah data pelatihan
            $id_pelatihan = $dataArray['pelatihan']['id_pelatihan'];
        } elseif (isset($dataArray['permintaan'])) {
            // Jika data yang ditemukan adalah data permintaan
            $id_permintaan = $dataArray['permintaan']['id'];
        }
        // dd($id_permintaan);

        // Tentukan tipe data dan proses sesuai kebutuhan
        if ($id_pelatihan !== null) {
            $kembali = route('peserta.pelatihan.show', ['id' => $id]);
            $studi = route('peserta.studidampak.create', ['id' => $id]);
            $hadir = route('peserta.daftarhadir.create', ['id' => $id]);
            $evaluasi = route('peserta.evaluasi.create', ['id' => $id]);
            $survey = route('peserta.surveykepuasan.create', ['id' => $id]);
            $sertifikat = route('peserta.sertifikat.show', ['id' => $id]);
            // Get all facilitators related to the pelatihan

           return view('peserta.surveykepuasan.create', compact('id_pelatihan', 'kembali', 'studi', 'hadir', 'evaluasi', 'survey','sertifikat'), [
                'pelatihan' => $pelatihan,
                'title' => 'Form Survey Kepuasan',
                'negara' => negara::all(),
                'kabupaten_kota' => kabupaten_kota::all(),
                'provinsi' => provinsi::all()
                // Kirim data tambahan jika diperlukan
            ]);
        } elseif ($id_permintaan !== null) {
            $kembali = route('peserta.pelatihan.show', ['id' => $id]);
            $studi = route('peserta.studidampak.create', ['id' => $id]);
            $hadir = route('peserta.daftarhadir.create', ['id' => $id]);
            $evaluasi = route('peserta.evaluasi.create', ['id' => $id]);
            $survey = route('peserta.surveykepuasan.create', ['id' => $id]);
            $sertifikat = route('peserta.sertifikat.show', ['id' => $id]);
           return view('peserta.surveykepuasan.create', compact('id_pelatihan', 'kembali', 'studi', 'hadir', 'evaluasi', 'survey','sertifikat'), [
                'permintaan' => $permintaan,
                'title' => 'Form Survey Kepuasan',
                'negara' => negara::all(),
                'kabupaten_kota' => kabupaten_kota::all(),
                'provinsi' => provinsi::all()
                // Kirim data tambahan jika diperlukan
            ]);
        } else {
            // Tangani kasus di mana tidak ditemukan pelatihan atau permintaan
            // Anda bisa menampilkan pesan kesalahan atau melakukan tindakan lain sesuai kebutuhan
        }
    }
    // public function create($id)
    // {
    //     $id_pelatihan = pelatihan::where('id_pelatihan', '=', $id)->get();
    //     $jsonString = json_encode($id_pelatihan);
    //     $data = json_decode($jsonString);
    //     $nilai = $data[0]->id_pelatihan;
    //     $kembali = route('peserta.pelatihan.show', ['id' => $id]);
    //     $studi = route('peserta.studidampak.create', ['id' => $id]);
    //     $hadir = route('peserta.daftarhadir.create', ['id' => $id]);
    //     $evaluasi = route('peserta.evaluasi.create', ['id' => $id]);
    //     $survey = route('peserta.surveykepuasan.create', ['id' => $id]);
    //     return view('peserta.surveykepuasan.create',  compact('id_pelatihan', 'nilai','kembali','studi','hadir','evaluasi','survey'),[
    //         'title' => 'Form Survey Kepuasan',
    //         'negara' => negara::all(),
    //         'kabupaten_kota' => kabupaten_kota::all(),
    //         'provinsi' => provinsi::all()
    //     ]);
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'tingkat_kepuasan' => 'required',
        //     'relevansi_pekerjaan' => 'required',
        //     'relevansi_biaya' => 'required',
        //     'pembelajaran' => 'required',
        //     'saran' => 'required',
        //     'intensitas_pelatihan' => 'required',
        //     'kabupaten_kota' => 'required',
        //     'provinsi' => 'required',
        //     'pelatihan_lembaga_lain' => 'required',
        // ], [
        //     'tingkat_kepuasan.required' => 'Field ini wajib diisi',
        //     'relevansi_pekerjaan.required' => 'Field ini wajib diisi',
        //     'relevansi_biaya.required' => 'Field ini wajib diisi',
        //     'pembelajaran.required' => 'Field ini wajib diisi',
        //     'saran.required' => 'Field ini wajib diisi',
        //     'intensitas_pelatihan' => 'Field ini wajib diisi',
        //     'kabupaten_kota' => 'Field ini wajib diisi',
        //     'provinsi' => 'Field ini wajib diisi',
        //     'pelatihan_lembaga_lain' => 'Field ini wajib diisi',
        // ]);
        $data = [
            'id_user' => Auth::user()->id,
            'id_pelatihan' => $request->id_pelatihan,
            'tingkat_kepuasan' => $request->tingkat_kepuasan,
            'relevansi_pekerjaan' => $request->relevansi_pekerjaan,
            'relevansi_biaya' => $request->relevansi_biaya,
            'pembelajaran' => $request->pembelajaran,
            'saran' => $request->saran,
            'intensitas_pelatihan' => $request->intensitas_pelatihan,
            'id_negara' => $request->id_negara,
            'id_provinsi' => $request->id_provinsi,
            'id_kabupaten' => $request->id_kabupaten,
            'pelatihan_lembaga_lain' => $request->pelatihan_lembaga_lain,
        ];
        dd($data);
        Survey::create($data);
        $id_pelatihan = $request->id_pelatihan;
        return Redirect::route('peserta.pelatihan.show', ['id' => $id_pelatihan])->with('success', 'Berhasil mengisi studi dampak pelatihan');
    }

    public function getProvinsi($negaraId = null)
    {
        try {
            $provinsiList = Provinsi::where('id_negara', $negaraId)->pluck('nama_provinsi', 'id')->toArray();

            return response()->json(['provinsi' => $provinsiList], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getKabupaten($provinsiId)
    {
        try {
            $kabupatenList = kabupaten_kota::where('id_provinsi', $provinsiId)->pluck('nama_kabupaten_kota', 'id')->toArray();

            return response()->json(['kabupaten' => $kabupatenList], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Survey $survey)
    {
        //
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
}
