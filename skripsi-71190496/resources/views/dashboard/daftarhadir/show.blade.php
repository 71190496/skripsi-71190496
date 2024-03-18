@extends('dashboard.layouts.main')

@section('container')
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <div class="d-flex justify-content-start">
                <h6 class="m-0 font-weight-bold text-success">Tabel Presensi Peserta </h6>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive-md">
                <table class="table table-bordered">
                    <div class="col-sm-12 ">
                        <div id="dataTable_filter" class="dataTables_filter">
                            <label>Search:<input type="search" class="form-control form-control-sm" placeholder=""
                                    aria-controls="dataTable" name="search"></label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 mb-2">
                        @if ($data->isNotEmpty())
                            <a href="{{ route('export.daftarhadir', ['id_pelatihan' => $data->first()->pelatihan->id]) }}"
                                class="btn btn-success"><i style="width:17px" data-feather="file-text"></i></a>
                        @endif
                    </div>
                    <thead>
                        <tr>
                            <th class="col-md-2" >Nama Peserta</th>
                            <th class="col-md-2" >Email Peserta</th>
                            <th class="col-md-2" >No Hp Peserta</th>
                            <th class="col-md-2" >Bukti Kehadiran</th>
                            <th class="col-md-2" >Tanggal Presensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($data as $item)
                                <td>{{ $item->nama_peserta }}</td>
                                <td>{{ $item->email_peserta }}</td>
                                <td>{{ $item->nomor_hp_peserta }}</td>
                                <td><img src="{{ asset('storage/' . $item->image) }}" class="img-fluid" alt="..."></td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
