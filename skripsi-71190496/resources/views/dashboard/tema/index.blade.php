@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Tema Pelatihan</h1>
        <a href="/dashboard/tema/create" class="btn btn-success"><i style="width:17px" data-feather="plus"></i> Tambah
            Tema</a>
    </div>
    @if (Session::has('success'))
        <div class="pt-3">
            <div class="alert alert-success">
                {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    <div class="col-lg-18 mb-4 ">
        {{-- <div class="container"> --}}

        <!-- Project Card Example -->
        <div class="card shadow ">
            <div class="card-header py-3">
                <div class="d-flex justify-content-start">
                    <h6 class="m-0 font-weight-bold text-success">Daftar Tema Pelatihan</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr> 
                                <th class="col-md-3" scope="col">Judul Tema</th>
                                <th class="col-md-1" scope="col">Tanggal Dibuat</th>
                                <th class="col-md-1" scope="col">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr> 
                                    <td>{{ $item['judul_tema'] }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_dibuat)->format('d M Y') }}</td>
                                    <td> 
                                        <a href="{{ url('dashboard/tema/'.$item->id.'/edit') }}" class="btn btn-warning px-2"><i style="width:17px" data-feather="edit"></i></a>
                                        <form class="d-inline m-0" action="/dashboard/tema/{{ $item->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')  
                                            <button class="btn btn-danger" type="submit"><i style="width:17px" data-feather="trash"></i></button>
                                        </form> 
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
