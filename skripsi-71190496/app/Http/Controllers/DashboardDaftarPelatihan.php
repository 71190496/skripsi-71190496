<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Produk;
use App\Models\Tema;
use App\Models\fasilitator_pelatihan_test;
use Illuminate\Http\Request;

class DashboardDaftarPelatihan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.daftarpelatihan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.daftarpelatihan.create', [
            'jenis_produk' => Produk::all(),
            'tema' => Tema::all(),
            'fasilitator_pelatihan' => fasilitator_pelatihan_test::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
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
    public function destroy(Post $post)
    {
        //
    }
}
