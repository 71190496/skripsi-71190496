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
                <thead>
                    <tr>
                        <th class="col-md-3" scope="col">Nama Peserta</th>
                        <th class="col-md-1" scope="col">Tanggal Presensi</th>
                        <th class="col-md-1" scope="col">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($data as $item) --}}
                        <tr>
                            {{-- @if ($item->id_jenis_produk == 3) --}}
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="" class="btn btn-primary px-2"><i style="width:17px" data-feather="eye"></i></a>
                                    <a href="" class="btn btn-warning px-2"><i style="width:17px" data-feather="edit"></i></a>
                                    <a href="" class="btn btn-danger px-2"><i style="width:17px" data-feather="trash"></i></a>
                                </td>
                            {{-- @endif --}}
                        </tr>
                    {{-- @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection