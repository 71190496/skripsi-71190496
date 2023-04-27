@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Tambah Pelatihan</h1>
    </div>

    <form method="post" action="/dashboard/daftarpelatihan">
        <div class="form-group mb-2">
            <label for="nama_pelatihan">Nama Pelatihan</label>
            <input type="text" class="form-control" placeholder="Masukan Nama Pelatihan" name="nama_pelatihan">
        </div>
        <div class="form-group mb-2">
            <label for="tema">Tema Pelatihan</label>
            <select class="form-select" name="tema">
                @foreach ($tema as $item)
                    <option value="{{ $item['id_tema'] }}">{{ $item['nama_tema'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="jenis_produk">Jenis Layanan</label>
            <select class="form-select" name="jenis_produk">
                @foreach ($jenis_produk as $item)
                    <option value="{{ $item['id_jenis_produk'] }}">{{ $item['nama_jenis_produk'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="tanggal">Tanggal Mulai</label>
            <input type="date" id="tanggal" class="form-control" name="tanggal_mulai">
        </div>
        <div class="form-group mb-2">
            <label for="tanggal">Tanggal Selesai</label>
            <input type="date" id="tanggal" class="form-control" name="tanggal_selesai">
        </div>

        <div id="fasilitator-pelatihan" class="form-group mb-2">
            <label for="fasilitator-pelatihan">Fasilitator Pelatihan</label>
            <select class="form-select">
                @foreach ($fasilitator_pelatihan as $item)
                    <option value="{{ $item['id_fasilitator'] }}">{{ $item['nama_fasilitator'] }}</option>
                @endforeach
            </select>
        </div>
        <button type="button" class="btn btn-primary" id="add-field" name="add-field">Add Field</button>
        <button type="button" class="btn btn-danger" id="remove-field" name="remove-field">Remove Field</button>

        <div class="mb-3">
            <label for="body" class="form-label">Deskripsi Pelatihan</label>
            <input id="body" type="hidden" name="body">
            <trix-editor input="body"></trix-editor>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // add field button
            $('#add-field').click(function() {
                var field =
                    '<div id="fasilitator-pelatihan" class="form-group mb-2"><label for="fasilitator-pelatihan">Fasilitator Pelatihan</label><select class="form-select">@foreach ($fasilitator_pelatihan as $item)<option value="{{ $item->id_fasilitator }}">{{ $item->nama_fasilitator }}</option>@endforeach</select></div>';
                $('#fasilitator-pelatihan').append(field);
            });

            // remove field button
            $('#remove-field').click(function() {
                $('#fasilitator-pelatihan .form-group:last-child').remove();
            });

            // save data to PostgreSQL
            // $('form').on('submit', function(e) {
            //     e.preventDefault();

            //     $.ajax({
            //         url: '/save-data',
            //         type: 'POST',
            //         data: $('form').serialize(),
            //         success: function(response) {
            //             console.log(response);
            //         },
            //         error: function(xhr, status, error) {
            //             console.log(xhr.responseText);
            //         }
            //     });
            // });
        });
    </script>
@endsection
