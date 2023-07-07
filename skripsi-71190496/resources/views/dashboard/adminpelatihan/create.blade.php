@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
        <h1 class="h2">Form Tambah Pelatihan</h1>
    </div>
    <div class="col-lg-8 mb-4 ">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <form method="post" action="/dashboard/adminpelatihan" enctype="multipart/form-data" id="data-form">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="nama_pelatihan">Nama Pelatihan</label>
                        <input type="text" class="form-control @error('nama_pelatihan') is-invalid @enderror"
                            placeholder="Masukan Nama Pelatihan" name="nama_pelatihan" id="nama_pelatihan" autofocus
                            value="{{ old('nama_pelatihan') }}">
                        @error('nama_pelatihan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="tema">Tema Pelatihan</label>
                        <select class="form-control" name="id_tema">
                            @foreach ($tema as $item)
                                <option value="{{ $item->id_tema }}">{{ $item->nama_tema }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="jenis_produk">Jenis Layanan</label>
                        <select class="form-control" name="id_jenis_produk">
                            @foreach ($jenis_produk as $item)
                                <option value="{{ $item->id_jenis_produk }}">{{ $item->nama_jenis_produk }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="tanggal">Tanggal Mulai</label>
                        <input type="date" id="tanggal_mulai" class="form-control" name="tanggal_mulai">
                    </div>
                    <div class="form-group mb-2">
                        <label for="tanggal">Tanggal Selesai</label>
                        <input type="date" id="tanggal_selesai" class="form-control" name="tanggal_selesai">
                    </div>

                    <div class="form-group mb-2">
                        <label for="tanggal_posting">Tanggal Posting Pelatihan</label>
                        <input type="date" id="tanggal_posting" class="form-control" name="tanggal_posting">
                    </div>
                    <div class="form-group mb-2">
                        <label for="tanggal_batasan">Tanggal Batas Posting Pelatihan</label>
                        <input type="date" id="tanggal_batasan" class="form-control" name="tanggal_batasan">
                    </div>

                    <div id="fields-container">
                        <div id="fasilitator-pelatihan" class="form-group mb-2">
                            <label for="fasilitator-pelatihan">Fasilitator Pelatihan</label>
                            <select id="selected-value" name="id_fasilitator" class="form-control">
                                @foreach ($fasilitator_pelatihan as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->nama_fasilitator }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- <button type="button" class="btn btn-primary mb-2" id="add-field" name="add-field">+ Tambah
                        Fasilitator</button>
                    <button type="button" class="btn btn-danger mb-2" id="remove-field" name="remove-field">Hapus</button> --}}

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
                        <label for="file" class="form-label">Upload Materi</label>
                        <input class="form-control @error('file') is-invalid @enderror" type="file" id="file"
                            name="file">
                        @error('file')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi_pelatihan" class="form-label">Deskripsi Pelatihan</label>
                        @error('deskripsi_pelatihan')
                            <div class="invalid-feedback">
                                <p class="text-danger">{{ $message }}</p>
                            </div>
                        @enderror
                        <input id="deskripsi_pelatihan" type="hidden" name="deskripsi_pelatihan">
                        <trix-editor input="deskripsi_pelatihan"></trix-editor>
                    </div>
                    <button name="simpan"type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>

        </div>
    </div>



    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // add field button
            $('#add-field').click(function() {
                var field =
                    '<div class="form-group mt-2 mb-2"><label for="fasilitator-pelatihan">Fasilitator Pelatihan</label><select name="fasilitator[]" class="form-control">@foreach ($fasilitator_pelatihan as $item)<option value="{{ $item->id_fasilitator }}">{{ $item->nama_fasilitator }}</option>@endforeach</select></div>';
                $('#fasilitator-pelatihan').append(field);
            });


            // remove field button
            $('#remove-field').click(function() {
                $('#fasilitator-pelatihan .form-group:last-child').remove();
            });

            // save data to PostgreSQL
            $('#data-form').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: '/dashboard/adminpelatihan',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });

        });
    </script> --}}
@endsection
