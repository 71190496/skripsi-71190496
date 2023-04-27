@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Tambah Fasilitator</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/fasilitator">
            @csrf
            <div class="form-group mb-2">
                <label for="nama_fasilitator">Nama Fasilitator</label>
                <input type="text" class="form-control" placeholder="Masukan Nama Fasilitator" name="nama_fasilitator">
            </div>
            <div class="form-group mb-2">
                <label for="tempat_tgl_lahir">Tempat, Tanggal Lahir</label>
                <input type="text" class="form-control" placeholder="Masukan Tempat dan Tanggal lahir" name="tempat_tgl_lahir">
            </div>
            <div class="form-group mb-2">
                <label for="email_fasilitator">Email</label>
                <input type="email" class="form-control" placeholder="Masukan Email Anda" name="email_fasilitator">
            </div>
            <div class="form-group mb-2">
                <label for="nomor_telepon">Nomor Telepon</label>
                <input type="text" class="form-control" placeholder="Masukan Nomor Telepon Anda" name="nomor_telepon">
            </div>
            <div class="form-group mb-2">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" placeholder="Masukan Alamat" name="alamat">
            </div>
            <div class="form-group mb-2">
                <label for="gender">Gender</label>
                <select name="id_gender" class="form-select">
                    @foreach ($gender as $item)
                        <option value="{{ $item['id_gender'] }}">{{ $item['nama_gender'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="id_internal_eksternal">Fasilitator Internal atau Eksternal</label>
                <select id="internal_eksternal" class="form-select" name="id_internal_eksternal">
                    @foreach ($internal_eksternal as $item)
                        <option value="{{ $item['id_internal_eksternal'] }}">{{ $item['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div id="asal-lembaga" class="form-group mb-2" style="display: none">
                <label for="asal_lembaga">Asal Lembaga</label>
                <input type="text" class="form-control" placeholder="Masukan Asal lembaga" name="asal_lembaga">
            </div>
            <div id="keahlian" class="mb-3" style="display: none">
                <label for="body" class="form-label"> Tambahkan Keahlian</label>
                <input id="body" type="hidden" name="body">
                <trix-editor input="body"></trix-editor>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#internal_eksternal').change(function() {
                if ($(this).val() == '2') {
                    $('#asal-lembaga').show();
                    $('#keahlian').show();
                } else {
                    $('#asal-lembaga').hide();
                    $('#keahlian').hide();
                }
            });
        });
    </script>
@endsection
