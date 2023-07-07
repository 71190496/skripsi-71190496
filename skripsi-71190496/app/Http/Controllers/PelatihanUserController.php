<?php

namespace App\Http\Controllers;

use App\Models\pelatihan;
use Illuminate\Http\Request;
use App\Models\pelatihanuser;
use Illuminate\Support\Facades\DB;
use App\Models\peserta_pelatihan_test;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class PelatihanUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('peserta.pelatihan.index', [
            'title' => 'Pelatihan Saya',
            'pelatihans' => peserta_pelatihan_test::where('id_user', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function surveykepuasan($id)
    // {
    //     $id_pelatihan = pelatihan::where('id','=',$id)->get();
    //     return view('peserta.surveykepuasan.create', compact('id_pelatihan'));
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pelatihan = pelatihan::find($id);
        $data  = pelatihan::where('id', $id)->get();

        return view('peserta.pelatihan.show', compact('pelatihan', 'data'), [
            'title' => 'Detail Pelatihan Saya',

        ]);
    }

    public function download($id)
    {
        $pelatihan = pelatihan::find($id);

        $file = "file_Path";

        if (!$pelatihan) {
            return redirect()->back()->with('error', 'Pelatihan tidak ditemukan.');
        }

        $filePath = $pelatihan->file;
        $file = storage_path('app/public/' . $filePath);
        $fileName = basename($filePath);

        return response()->download($file, $fileName);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pelatihanuser $pelatihanuser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pelatihanuser $pelatihanuser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pelatihanuser $pelatihanuser)
    {
        //
    }
}
