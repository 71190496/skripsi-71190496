@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
        <h1 class="h2">Form Ubah Lokasi, Email & Telepon</h1>
    </div>
    <div class="col-lg-8 mb-4 ">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <form method="post" action="/dashboard/kontak">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" class="form-control @error('lokasi') is-invalid @enderror"
                            placeholder="Masukan Lokasi" name="lokasi" id="lokasi" autofocus
                            value="{{ old('lokasi') }}">
                        @error('lokasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Masukan Email" name="email" id="email" autofocus value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="telepon">Telepon</label>
                        <input type="text" class="form-control @error('telepon') is-invalid @enderror"
                            placeholder="Masukan Telepon" name="telepon" id="telepon" autofocus
                            value="{{ old('telepon') }}">
                        @error('telepon')
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
