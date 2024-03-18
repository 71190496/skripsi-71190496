@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
        <h1 class="h2">Daftar Hadir</h1> 
    </div>
    <div class="col-lg-18 mb-4 ">
        {{-- <div class="container"> --}}

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">

                <div class="d-flex justify-content-start">
                    <h6 class="m-0 font-weight-bold text-success">Reguler</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive-md">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="col-md-3" scope="col">Nama Pelatihan</th>
                                <th class="col-md-1" scope="col">Tanggal</th>
                                <th class="col-md-1" scope="col">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    @if ($item->id_jenis_produk == 3)
                                        <td>{{ $item['nama_pelatihan'] }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('dashboard.daftarhadir.show',['id' => $item->id]) }}" class="btn btn-primary px-2"><i style="width:17px" data-feather="eye"></i></a>
                                            <a href="" class="btn btn-warning px-2"><i style="width:17px" data-feather="edit"></i></a>
                                            <a href="" class="btn btn-danger px-2"><i style="width:17px" data-feather="trash"></i></a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-start">
                    <h6 class="m-0 font-weight-bold text-success">Permintaan</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="col-md-3" scope="col">Nama Pelatihan</th>
                                <th class="col-md-1" scope="col">Tanggal</th>
                                <th class="col-md-1" scope="col">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>

                                    @if ($item->id_jenis_produk == 1)
                                        <td>{{ $item['nama_pelatihan'] }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') }}</td>
                                        <td>
                                            <a href="" class="btn btn-primary px-2"><i style="width:17px" data-feather="eye"></i></a>
                                            <a href="" class="btn btn-warning px-2"><i style="width:17px" data-feather="edit"></i></a>
                                            <a href="" class="btn btn-danger px-2"><i style="width:17px" data-feather="trash"></i></a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-start">
                    <h6 class="m-0 font-weight-bold text-success">Konsultasi</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="col-md-3" scope="col">Nama Pelatihan</th>
                                <th class="col-md-1" scope="col">Tanggal</th>
                                <th class="col-md-1" scope="col">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
