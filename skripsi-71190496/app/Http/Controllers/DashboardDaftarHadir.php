<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Hadir;
use App\Models\Daftar;
use App\Models\pelatihan;
use App\Models\JenisLayanan;
use App\Models\UserPresensi;
use Illuminate\Http\Request;
use App\Exports\DaftarHadirExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class DashboardDaftarHadir extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = pelatihan::orderBy('id')->get();
        return view('dashboard.daftarhadir.index')->with('data', $data);;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
    //     $data = Pelatihan::find($id);
    //     return view('dashboard.daftarhadir.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        // $pelatihan = Pelatihan::find($id);
        // $batasWaktu = Carbon::parse($pelatihan->batas_waktu);

        // if (Carbon::now()->isAfter($batasWaktu)) {
        //     return redirect()->route('peserta.pelatihan.index')->with('error', 'Batas waktu pengisian daftar hadir sudah berakhir.');
        // }
        // Daftar::create([
        //     'id_pelatihan' => $id,
        //     'id_user' => Auth::user()->id,
        //     'tanggal_daftar' => now(), // Tanggal saat ini
        //     // Informasi lain yang diperlukan
        // ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id_presensi)
    {
        $hadirData = UserPresensi::where('id_presensi', $id_presensi)->get();
        return view('dashboard.daftarhadir.show', ['hadirData' => $hadirData]); 
    }

    public function export(Request $request, $id_pelatihan)
    {
        $data = Hadir::where('id_pelatihan', $id_pelatihan)->get(); 
        return Excel::download(new DaftarHadirExport($data), 'daftarhadir_pelatihan.xlsx');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Daftar $daftar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Daftar $daftar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Daftar $daftar)
    {
        //
    }
}
