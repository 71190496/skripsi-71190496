@extends('peserta.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Pendaftaran Pelatihan</h1>
    </div>
    @if ($errors->any())
        <div class="pt-3">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif()
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <span class="h6">Data diri peserta</span>
    </div>
    <div class="col-lg-8">
        <form method="post" action="/peserta/daftarpelatihan">
            @csrf
            <div class="form-group mb-2">
                <label for="nama_peserta">Nama Peserta</label>
                <input id="nama_peserta" type="text" class="form-control" @error('nama_peserta') is-invalid @enderror
                    placeholder="Masukan Nama Anda" name="nama_peserta">
                @error('nama_peserta')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>
            <div class="form-group mb-2">
                <label for="gender">Gender</label>
                <select class="form-select" name="id_gender">
                    @foreach ($gender as $item)
                        <option value="{{ $item['id_gender'] }}">{{ $item['nama_gender'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="email_peserta">Email</label>
                <input id="email_peserta" type="email" class="form-control" placeholder="Masukan Email Anda"
                    name="email_peserta">
            </div>
            <div class="form-group mb-2">
                <label for="no_hp">Nomor Telepon</label>
                <input id="no_hp" type="numeric" class="form-control" placeholder="Masukan Nomor Telepon Anda"
                    name="no_hp">
            </div>
            <div class="form-group mb-2">
                <label for="rentang_usia">Rentang Usia</label>
                <select class="form-select" name="id_rentang_usia">
                    @foreach ($rentang_usia as $item)
                        <option value="{{ $item['id_rentang_usia'] }}">{{ $item['usia'] }}</option>
                    @endforeach
                </select>
            </div>
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <span class="h6">Asal daerah peserta</span>
            </div>
            <div class="form-group mb-2">
                <label for="kabupaten_kota">Kota</label>
                <select class="form-select" name="id_kabupaten">
                    @foreach ($kabupaten_kota as $item)
                        <option value="{{ $item['id_kabupaten'] }}">{{ $item['nama_kabupaten_kota'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="provinsi">Provinsi</label>
                <select class="form-select" name="id_provinsi">
                    @foreach ($provinsi as $item)
                        <option value="{{ $item['id_provinsi'] }}">{{ $item['nama_provinsi'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="negara">Negara</label>
                <select class="form-select" name="id_negara">
                    @foreach ($negara as $item)
                        <option value="{{ $item['id_negara'] }}">{{ $item['nama_negara'] }}</option>
                    @endforeach
                </select>
            </div>
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <span class="h6">Organisasi peserta</span>
            </div>
            <div class="form-group mb-2">
                <label for="jenis_organisasi">Jenis Organisasi</label>
                <select name="id_organisasi" class="form-select">
                    @foreach ($organisasis as $item)
                        <option value="{{ $item['id_organisasi'] }}">{{ $item['organisasi'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="nama_organisasi">Nama Organisasi</label>
                <input type="text" class="form-control" placeholder="Masukan Nama Organisasi Anda"
                    name="nama_organisasi">
            </div>
            <div class="form-group mb-2">
                <label for="jabatan_peserta">Jabatan Pada Organisasi</label>
                <input id="jabatan_peserta" type="text" class="form-control" placeholder="Masukan Jabatan Anda"
                    name="jabatan_peserta">
            </div>
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <span class="h6">Pelatihan relevan dan harapan dari pelatihan</span>
            </div>
            <div class="form-group mb-2">
                <label for="pelatihan_relevan">Pelatihan Relevan Yang Pernah DiIkuti</label>
                <input id="pelatihan_relevan" type="text" class="form-control"
                    placeholder="Pelatihan Relevan Yang Penah Anda Ikuti" name="pelatihan_relevan">
            </div>
            <div class="form-group mb-2">
                <label for="harapan_pelatihan">Harapan Dari Pelatihan Ini</label>
                <textarea id="harapan_pelatihan" class="form-control" name="harapan_pelatihan" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
