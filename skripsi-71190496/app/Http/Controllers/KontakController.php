<?php

namespace App\Http\Controllers;

use App\Models\kontak;
use App\Models\admin_kontak;
use App\Mail\KontakEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         
        $latestData = admin_kontak::latest()->first();
        $data = [$latestData];
        return view('peserta.kontak.index',compact('data'),[
            'title' => 'Kontak'
        ]);
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        Mail::to('your@email.com')->send(new KontakEmail($data));

        return back()->with('success', 'Your message has been sent. Thank you!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_peserta' => 'required',
            'email_peserta' => 'required',
            'subjek' => 'required',
            'pesan' => 'required',
        ], [
            'nama_peserta.required' => 'Field nama wajib diisi',
            'email.required' => 'Field email wajib diisi',
            'subjek.required' => 'Field nomor hp wajib diisi',
            'pesan.required' => 'Field nomor hp wajib diisi'
        ]);

        $data = [
            'nama_peserta' => $request->nama_peserta,
            'email_peserta' => $request->email_peserta,
            'subjek' => $request->subjek,
            'pesan' => $request->pesan,
        ];
        dd($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(kontak $kontak)
    {
        return view('dashboard.kontak.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kontak $kontak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kontak $kontak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kontak $kontak)
    {
        //
    }
}
