@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Update Fasilitator</h1>
    </div>
    <div class="col-lg-8 mb-4 ">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <form method="post" action="/dashboard/fasilitator/{{ $data->id}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group mb-2">
                        <label for="nama_fasilitator">Nama Fasilitator</label>
                        <input type="text" class="form-control" value="{{ $data->nama_fasilitator }}"placeholder="Masukan Nama Fasilitator"
                            name="nama_fasilitator">
                    </div>
                    <div class="form-group mb-2">
                        <label for="tempat_tgl_lahir">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control" value="{{ $data->tempat_tgl_lahir }}" placeholder="Masukan Tempat dan Tanggal lahir"
                            name="tempat_tgl_lahir">
                    </div>
                    <div class="form-group mb-2">
                        <label for="email_fasilitator">Email</label>
                        <input type="email" class="form-control" value="{{ $data->email_fasilitator }}" placeholder="Masukan Email Anda"
                            name="email_fasilitator">
                    </div>
                    <div class="form-group mb-2">
                        <label for="nomor_telepon">Nomor Telepon</label>
                        <input type="text" class="form-control" value="{{ $data->nomor_telepon }}"placeholder="Masukan Nomor Telepon Anda"
                            name="nomor_telepon">
                    </div>
                    <div class="form-group mb-2">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control"value="{{ $data->alamat }}" placeholder="Masukan Alamat" name="alamat">
                    </div>
                    {{-- <div class="form-group mb-2">
                        <label for="id_gender">Gender</label>
                        <select  name="id_gender" class="form-control">
                            @foreach ($data as $item)
                                <option value="{{ $item->id }}" {{ $item->id_gender == $item->id ? 'selected' : '' }}>{{ $item->nama_gender }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    {{-- <div class="form-group mb-2">
                        <label for="id_internal_eksternal">Fasilitator Internal atau Eksternal</label>
                        <select value="{{ $data->id_internal_eksternal }}" id="internal_eksternal" class="form-control" name="id_internal_eksternal">
                            @foreach ($data as $item)
                                <option value="{{ $item->id_internal_eksternal }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div id="asal-lembaga" class="form-group mb-2" style="display: none">
                        <label for="asal_lembaga">Asal Lembaga</label>
                        <input type="text" class="form-control" value="{{ $data->asal_lembaga }}"placeholder="Masukan Asal lembaga" name="asal_lembaga">
                    </div>
                    <div id="keahlian" class="mb-3" style="display: none">
                        <label for="body" class="form-label"> Tambahkan Keahlian</label>
                        <input value="{{ $data->body }}" id="body" type="hidden" name="body">
                        <trix-editor input="body"></trix-editor>
                    </div>
                    <a class="btn btn-success" href="/dashboard/fasilitator"><i style="width:15px" data-feather="arrow-left"></i>Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
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
