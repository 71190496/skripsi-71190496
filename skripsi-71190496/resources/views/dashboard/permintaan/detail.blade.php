@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Peserta Permintaan</h1>
        <div class="d-flex justify-content-end">
            @foreach ($permintaan as $item)
                {{-- <a href="{{ route('dashboard.permintaan.create', ['id' => $item]) }}" class="btn btn-success "><i
                    style="width:17px" data-feather="plus"></i>
                Buatkan Pelatihan</a> --}}
                <a href="{{ route('dashboard.permintaan.peserta', ['id' => $item]) }}" class="btn btn-success mx-1"><i
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
                {{-- @foreach ($data as $item) --}}
                {{-- <p><strong>Nama Mitra :</strong> {{ $item->nama_mitra }}</p>
                <p><strong>Judul Permintaan :</strong> {{ $item->judul_pelatihan }}</p> --}}
                <table class="table table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">Nama Peserta</th>
                            <th scope="col">Email Peserta</th>
                            {{-- <th scope="col">Jenis Pelatihan</th> --}}
                            {{-- <th scope="col">Tema Pelatihan</th>
                            <th scope="col">Tanggal Mulai Pelatihan</th>
                            <th scope="col">Tanggal Selesai Pelatihan</th>
                            <th scope="col">Masalah Lembaga</th>
                            <th scope="col">Kebutuhan Lembaga</th>
                            <th scope="col">Materi & topik Pelatihan</th>
                            <th scope="col">Request Khusus</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peserta as $item)
                            <tr>
                                <td>{{ $item->nama_peserta }}</td>
                                <td>{{ $item->email_peserta }}</td>
                                {{-- <td>{{ $item->jenis_pelatihan }}</td> --}}
                                {{-- <td>{{ $item->tema->judul_tema }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_waktu_mulai)->locale('id')->isoFormat('D MMMM Y') }}
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_waktu_selesai)->locale('id')->isoFormat('D MMMM Y') }}
                                </td>
                                <td>{{ $item->masalah }}</td>
                                <td>{{ $item->kebutuhan }}</td>
                                <td>{{ $item->materi }}</td>
                                <td>{{ $item->request_khusus }}</td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
