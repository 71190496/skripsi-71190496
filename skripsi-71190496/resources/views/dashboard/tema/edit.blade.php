@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Edit Tema</h1>
    </div>
    <div class="col-lg-12 mb-4 ">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-start">
                    <h6 class="m-0 font-weight-bold text-success">Tema</h6>
                </div>
            </div>
            <form method="post" action="/dashboard/tema/{{ $tema->id }}">
                @method('PUT')
                @csrf
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label for="judul_tema">Judul Tema</label>
                        <input type="text" class="form-control @error('judul_tema') is-invalid @enderror"
                            placeholder="Masukan judul tema" id="judul_tema" name="judul_tema"
                            value="{{ old('judul_tema') ?? $tema->judul_tema }}">
                        @error('judul_tema')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="tanggal">Tanggal Dibuat</label>
                        <input type="date" id="tanggal_dibuat"
                            class="form-control @error('tanggal_dibuat') is-invalid @enderror" name="tanggal_dibuat"
                            value="{{ old('tanggal_dibuat') ?? $tema->tanggal_dibuat }}">
                        @error('tanggal_dibuat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
