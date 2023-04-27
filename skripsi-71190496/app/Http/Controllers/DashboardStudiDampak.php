<?php

namespace App\Http\Controllers;

use App\Models\Studi;
use Illuminate\Http\Request;

class DashboardStudiDampak extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.studidampak.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

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
    public function show(Studi $studi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Studi $studi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Studi $studi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Studi $studi)
    {
        //
    }
}
