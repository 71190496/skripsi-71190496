@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
        <h1 class="h2">Form Edit Postingan</h1>
    </div>
    <div class="col-lg-8 mb-4 ">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <form method="post" action="/dashboard/postingan/{{ $data->id}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group mb-2">
                        <label for="judul_postingan">Judul Postingan</label>
                        <input type="text" class="form-control" value="{{ $data->judul_postingan }}" placeholder="Masukan judul postingan"
                            name="judul_postingan">
                    </div> 
                    <div class="form-group mb-2">
                        <label for="tanggal">Tanggal Postingan</label>
                        <input type="date" id="tanggal_postingan" value="{{ $data->tanggal_postingan }}" class="form-control" name="tanggal_postingan">
                    </div> 
                    <div class="mb-3">
                        <label for="isi_postingan" class="form-label">Isi Postingan</label>
                        <input id="isi_postingan" type="hidden" value="{{ $data->isi_postingan }}" name="isi_postingan">
                        <trix-editor input="isi_postingan"></trix-editor>
                    </div>
                    <a class="btn btn-success" href="/dashboard/postingan"><i style="width:15px" data-feather="arrow-left"></i>Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan<i style="width:17px" data-feather="save"></i></button>
                </form>
            </div>
        </div>
    </div>
@endsection
