<?php

namespace App\Http\Controllers;

use App\Models\negara;
use App\Models\provinsi;
use App\Models\pelatihan;
use App\Models\rentang_usia;
use Illuminate\Http\Request;
use App\Models\kabupaten_kota;
use App\Models\jenis_organisasi;
use App\Models\informasi_pelatihan;
use App\Http\Controllers\Controller;
use App\Models\peserta_pelatihan_test;
use App\Models\Tema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegulerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('create'); // Hanya jalankan middleware 'auth' pada method 'create'
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil data pelatihan dari database dengan relasi
        $query = Pelatihan::with(['fasilitator_pelatihan', 'gambarPelatihan', 'tema'])->orderBy('id_pelatihan');

        // Filter berdasarkan bulan
        $selectedMonth = $request->input('monthFilter');
        if ($selectedMonth) {
            $query->whereMonth('tanggal_mulai', $selectedMonth);
        }

        $tema = Tema::all();
        // Terapkan filter berdasarkan tema pelatihan yang dipilih
        if ($request->has('themeFilter')) {
            $query->where('id_tema', $request->themeFilter);
        }

        $buka = $request->has('buka');
        $tutup = $request->has('tutup');

        if ($buka) {
            $query->whereDate('tanggal_batas_pendaftaran', '>', now());
        } elseif ($tutup) {
            $query->whereDate('tanggal_batas_pendaftaran', '<=', now());
        }

        // Ambil data dengan pagination
        $data = $query->cursorPaginate(4);

        // Periksa apakah data kosong setelah menerapkan filter bulan
        // Periksa apakah data kosong setelah menerapkan filter bulan
        if ($selectedMonth && $data->isEmpty()) {
            // Jika tidak ada pelatihan untuk bulan yang dipilih, kirim pesan khusus ke view
            return view('peserta.reguler.index', [
                'title' => 'Pelatihan Reguler',
                'data' => $data,
                'tema' => $tema,
                'emptyMessage' => 'Belum ada pelatihan di bulan ini.',
                'selectedMonth' => $selectedMonth,
            ]);
        }

        return view('peserta.reguler.index', [
            'title' => 'Pelatihan Reguler',
            'data' => $data,
            'tema' => $tema,
            'selectedMonth' => $selectedMonth,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $id = session('id_pelatihan');  // Ambil $id dari session
        $id_pelatihan = pelatihan::with('fasilitator_pelatihan')->where('id_pelatihan', '=', $id)->get(); // Ambil pelatihan berdasarkan $id
        $jsonString = json_encode($id_pelatihan);
        $data = json_decode($jsonString);
        $nilai = $data[0]->id_pelatihan;
        $user = auth()->user();
        $data = pelatihan::where('id_pelatihan', $id)->get();
        return view('peserta.reguler.create', compact('id_pelatihan', 'data', 'nilai', 'user'), [
            'title' => 'Form Pelatihan Reguler',
            'pelatihan' => $id_pelatihan,
            'rentang_usia' => rentang_usia::all(),
            'negara' => negara::all(),
            'provinsi' => provinsi::all(),
            'kabupaten_kota' => kabupaten_kota::all(),
            'jenis_organisasi' => jenis_organisasi::all(),
            'informasi_pelatihan' => informasi_pelatihan::all(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return 'hello';
        // Validasi data formulir
        // dd($request->all());
        $request->validate([
            'nama_peserta' => 'required|string|max:255',
            'email_peserta' => 'required|email|max:255',
            'no_hp' => 'required|numeric',
            'gender' => 'required|string|max:255',
            'id_rentang_usia' => 'required|integer',
            'id_negara' => 'required|integer',
            'id_provinsi' => 'required|integer',
            'id_kabupaten' => 'required|integer',
            'nama_organisasi' => 'nullable|string|max:255',
            'id_organisasi' => 'required|integer',
            'jabatan_peserta' => 'nullable|string|max:255',
            'id_informasi' => 'required|integer',
            'pelatihan_relevan' => 'nullable|string|max:255',
            'bukti_bayar' => 'required|image|max:2048',
            'harapan_pelatihan' => 'required',
        ], [
            'nama_peserta.required' => 'Nama peserta harus diisi.',
            'email_peserta.required' => 'Email peserta harus diisi.',
            'email_peserta.email' => 'Email peserta harus valid.',
            'no_hp.required' => 'Nomor HP harus diisi.',
            'no_hp.numeric' => 'Nomor HP harus diisi dengan angka.',
            'gender.required' => 'Jenis kelamin harus diisi.',
            'id_rentang_usia.required' => 'Rentang usia harus diisi.',
            'id_negara.required' => 'Negara harus diisi.',
            'id_provinsi.required' => 'Provinsi harus diisi.',
            'id_kabupaten.required' => 'Kabupaten harus diisi.',
            'id_organisasi.required' => 'Organisasi harus diisi.',
            'id_informasi.required' => 'Informasi harus diisi.',
            'bukti_bayar.required' => 'Bukti pembayaran harus diunggah.',
            'bukti_bayar.image' => 'Bukti pembayaran harus berupa gambar.',
            'bukti_bayar.max' => 'Bukti pembayaran tidak boleh lebih dari 2MB.',
            'harapan_pelatihan.required' => 'Harapan pelatihan harus diisi.',
            // 'harapan_pelatihan.max' => 'Harapan pelatihan maksimal hanya 255 karakter.',
        ]);

        // $nama_peserta = $request->input('nama_peserta');
        // dd($nama_peserta);
        // Simpan data ke database
        $pelatihan = new peserta_pelatihan_test();
        $pelatihan->id_user = Auth::id();
        $pelatihan->id_pelatihan = $request->id_pelatihan;
        $pelatihan->nama_peserta = $request->input('nama_peserta');
        $pelatihan->email_peserta = $request->input('email_peserta');
        $pelatihan->no_hp = $request->input('no_hp');
        $pelatihan->gender = $request->input('gender');
        $pelatihan->id_rentang_usia = $request->input('id_rentang_usia');
        $pelatihan->id_negara = $request->input('id_negara');
        $pelatihan->id_provinsi = $request->input('id_provinsi');
        $pelatihan->id_kabupaten = $request->input('id_kabupaten');
        $pelatihan->nama_organisasi = $request->input('nama_organisasi');
        $pelatihan->id_organisasi = $request->input('id_organisasi');
        $pelatihan->jabatan_peserta = $request->input('jabatan_peserta');
        $pelatihan->id_informasi = $request->input('id_informasi');
        $pelatihan->pelatihan_relevan = $request->input('pelatihan_relevan');
        $pelatihan->harapan_pelatihan = $request->input('harapan_pelatihan');
        // dd($pelatihan);

        // Simpan file bukti bayar
        if ($request->hasFile('bukti_bayar')) {
            $buktiBayarFile = $request->file('bukti_bayar');
            $originalName = $buktiBayarFile->getClientOriginalName(); // Dapatkan nama asli file

            // Simpan file dengan nama asli
            $buktiBayarPath = $buktiBayarFile->storeAs('bukti_bayar', $originalName);

            // Simpan path file ke dalam model Pelatihan
            $pelatihan->bukti_bayar = $buktiBayarPath;
        }

        // dd($pelatihan);
        $pelatihan->save();
        // Jika berhasil disimpan
        return redirect()->route('peserta.pelatihan.index')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Mengambil detail pelatihan berdasarkan $id_pelatihan
        $id_pelatihan = pelatihan::with(['fasilitator_pelatihan', 'gambarPelatihan'])->where('id_pelatihan', '=', $id)->get();
        // dd($id_pelatihan );
        $jsonString = json_encode($id_pelatihan);
        $data = json_decode($jsonString);
        $nilai = $data[0]->id_pelatihan;
        // dd($nilai);
        // $gambarPelatihan = $id_pelatihan->gambarPelatihan;
        // dd($gambarPelatihan);
        $data = pelatihan::where('id_pelatihan', $id)->get();
        session(['id_pelatihan' => $id]);
        return view('peserta.reguler.show', compact('id_pelatihan', 'data', 'nilai'), [
            'title' => 'Pelatihan Reguler',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
