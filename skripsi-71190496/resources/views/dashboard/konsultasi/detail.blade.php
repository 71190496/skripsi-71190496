@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Peserta Konsultasi</h1>
        <div class="d-flex justify-content-end">
            @foreach ($konsultasi as $item)
                <a href="{{ route('dashboard.konsultasi.peserta', ['id_konsultasi' => $item->id_konsultasi]) }}" class="btn btn-success mx-1"><i
                        style="width:17px" data-feather="plus"></i>
                    Buatkan Akun Peserta</a>
            @endforeach

        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Tabel Peserta</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">Nama Peserta</th>
                            <th scope="col">Email Peserta</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peserta as $item)
                            <tr>
                                <td>{{ $item->nama_peserta }}</td>
                                <td>{{ $item->email_peserta }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
