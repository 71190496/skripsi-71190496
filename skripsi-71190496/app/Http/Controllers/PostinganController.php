<?php

namespace App\Http\Controllers;

use App\Models\postingan;
use Illuminate\Http\Request;

class PostinganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = postingan::orderBy('id')->get();
        return view('dashboard.postingan.index')->with('data', $data);
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('dashboard.postingan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul_postingan' => 'required',
            'tanggal_postingan' => 'required',
            'image' => 'image|file|max:1024',
            'isi_postingan' => 'required'
        ], [
            'judul_postingan.required' => 'Field judul wajib diisi',
            'tanggal_postingan.required' => 'Field tanggal wajib diisi',
            'image.required' => 'Field upload gambar harus format gambar',
            'isi_postingan.required' => 'Field isi postingan wajib diisi'
        ]);

        $data = [
            'judul_postingan' => $request->judul_postingan,
            'tanggal_postingan' => $request->tanggal_postingan,
            'isi_postingan' => $request->isi_postingan,
            'image' => $request->image,
        ];

        if(($request)->file('image')){
            $data['image'] = $request->file('image')->store('images');
        }

        // dd($data);
        postingan::create($data);
        return redirect()->to('dashboard/postingan')->with('success', 'Berhasil menambah postingan');
    }

    /**
     * Display the specified resource.
     */
    public function show(postingan $postingan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = postingan::find($id);
        return view('dashboard.postingan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = postingan::find($id);
        $data->judul_postingan = $request->judul_postingan;
        $data->isi_postingan = $request->isi_postingan;
        $data->tanggal_postingan = $request->tanggal_postingan;
        $data->save();

        return redirect('/dashboard/postingan')->with('success', 'Berhasil mengupdate data');
        // $request->validate([
        //     'judul_postingan' => 'required',
        //     'isi_postingan' => 'required'
        // ],[
        //     'judul_postingan.required' => 'Field judul wajib diisi',
        //     'isi_postingan.required' => 'Field isi postingan wajib diisi'
        // ]);

        // $data = [
        //     'judul_postingan' => $request->judul_postingan,
        //     'isi_postingan' => $request->isi_postingan
        // ];

        // postingan::where('id',$postingan)->update($data);
        // return redirect()->to('dashboard/postingan')->with('success','Berhasil mengedit postingan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = postingan::find($id);
        $data->delete();

        return redirect('/dashboard/postingan')->with('success', 'Berhasil menghapus postingan');
    }
}
