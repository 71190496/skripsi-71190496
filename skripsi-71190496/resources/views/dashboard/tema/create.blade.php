@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Tambah Postingan</h1>
    </div>
    <div class="col-lg-8 mb-4 ">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <form method="post" action="/dashboard/tema">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="judul_tema">Judul Tema</label>
                        <input type="text" class="form-control @error('judul_tema') is-invalid @enderror"
                            placeholder="Masukan judul tema" id="judul_tema" name="judul_tema">
                        @error('judul_tema')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="tanggal">Tanggal Dibuat</label>
                        <input type="date" id="tanggal_dibuat"
                            class="form-control @error('tanggal_dibuat') is-invalid @enderror" name="tanggal_dibuat">
                        @error('tanggal_dibuat')
                            <div class="invalid-feedback">
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
