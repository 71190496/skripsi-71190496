@extends('dashboard.layouts.main')

@section('container')
    @if (Session::has('success'))
        <div class="pt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    <div class="col-lg-18 mb-4 ">
        <form method="post" action="{{ route('dashboard.permintaan.simpan') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="id_permintaan" name="id_permintaan" value="{{ $nilai }}">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-start">
                        <h6 class="m-0 font-weight-bold text-success">Buat Akun Peserta</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nama_peserta" class="form-label">Nama Lengkap Peserta</label>
                        <input type="text" class="form-control @error('nama_peserta') is-invalid @enderror"
                            placeholder="Masukkan Nama Lengkap Peserta" name="nama_peserta" id="nama_peserta"
                            value="{{ old('nama_peserta') }}" autofocus>
                        @error('nama_peserta')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email_peserta" class="form-label">Email Peserta</label>
                        <input type="email" class="form-control @error('email_peserta') is-invalid @enderror"
                            placeholder="Masukkan Email Peserta" name="email_peserta" id="email_peserta"
                            value="{{ old('email_peserta') }}">
                        @error('email_peserta')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Masukkan Password" name="password" id="password" value="{{ old('password') }}">
                        @error('password')
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
