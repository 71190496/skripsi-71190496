@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
        <h1 class="h2">Detail Fasilitator</h1>
    </div>

    <div class="card shadow ">
        <div class="card-header py-3">
            <div class="d-flex justify-content-start">
                <h6 class="m-0 font-weight-bold text-success">Informasi Fasilitator</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if ($fasilitator)
                    @foreach ($fasilitator as $item)
                        <p>Nama = {{ $item->nama_fasilitator }}</p>
                        <p>Tempat & Tanggal Lahir = {{ $item['tempat_tgl_lahir'] }}</p>
                        <p>Email = {{ $item['email_fasilitator'] }}</p>
                        <p>Alamat = {{ $item['alamat'] }}</p>
                        <p>Jenis Kelamin = {{ $item['id_gender'] }}</p>
                        <p>Asal Lembaga  = {{ $item['asal_lembaga'] }}</p>
                        <p>Deskripsi Fasilitator = {!! $item['body'] !!}</p>
                    @endforeach
                @else
                    <p>Tidak ada data fasilitator yang ditemukan.</p>
                @endif

                {{-- <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th class="col-md-2" scope="col">Nama Fasilitator</th>
                            <th class="col-md-1" scope="col">Internal atau Eksternal</th>
                            <th class="col-md-1" scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item['nama_fasilitator'] }}</td>
                                @if ($item['id_internal_eksternal'] == 1)
                                    <td>Internal</td>
                                @else
                                    <td>Eksternal</td>
                                @endif
                                <td>
                                    <a href="/dashboard/fasilitator/show" class="btn btn-primary px-2"><i style="width:17px"
                                            data-feather="eye"></i></a>
                                    <a href="{{ url('dashboard/fasilitator/' . $item->id . '/edit') }}"
                                        class="btn btn-warning px-2"><i style="width:17px" data-feather="edit"></i></a>
                                    <form class="d-inline m-0" action="/dashboard/fasilitator/{{ $item->id }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit"><i style="width:17px"
                                                data-feather="trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> --}}
            </div>
        </div>
    </div>
@endsection
