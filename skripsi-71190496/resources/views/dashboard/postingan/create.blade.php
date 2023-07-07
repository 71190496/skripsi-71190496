@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Tambah Postingan</h1>
    </div>
    <div class="col-lg-8 mb-4 ">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <form method="post" action="/dashboard/postingan" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="judul_postingan">Judul Postingan</label>
                        <input type="text" class="form-control @error('judul_postingan') is-invalid @enderror"
                            placeholder="Masukan judul postingan" id="judul_postingan" name="judul_postingan">
                        @error('judul_postingan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="tanggal">Tanggal Postingan</label>
                        <input type="date" id="tanggal_postingan"
                            class="form-control @error('tanggal_postingan') is-invalid @enderror" name="tanggal_postingan">
                        @error('tanggal_postingan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Gambar</label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                            name="image">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="isi_postingan" class="form-label">Isi Postingan</label>
                        <input id="isi_postingan" type="hidden" name="isi_postingan">
                        <trix-editor input="isi_postingan"></trix-editor>
                        @error('isi_postingan')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
