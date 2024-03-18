@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
        <h1 class="h2">Daftar Fasilitator</h1>
        <div class="d-flex justify-content-end">
            <a href="/dashboard/fasilitator/create" class="btn btn-success"><i style="width:17px" data-feather="plus"></i>
                Tambah
                Fasilitator</a>
        </div>
    </div>
    @if (Session::has('success'))
        <div class="pt-3">
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        </div>
    @endif
    <div class="col-lg-18 mb-4 ">
        {{-- <div class="container"> --}}

        <!-- Project Card Example -->
        <div class="card shadow ">
            <div class="card-header py-3">
                <div class="d-flex justify-content-start">
                    <h6 class="m-0 font-weight-bold text-success">Fasilitator</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="fasilitator" class="table table-bordered display responsive nowrap" width="100%">
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
                                        <a href="{{ route('dashboard.fasilitator.show', $item->id_fasilitator) }}" class="btn btn-primary px-2"><i style="width:17px"
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
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Sertakan jQuery dan DataTables JS -->
    {{-- <link
        href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.0/b-3.0.0/b-html5-3.0.0/fc-5.0.0/fh-4.0.0/r-3.0.0/sc-2.4.0/sp-2.3.0/datatables.min.css"
        rel="stylesheet"> --}}

    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.1/b-3.0.0/sl-2.0.0/datatables.min.css" rel="stylesheet">

    <script src="https://cdn.datatables.net/v/bs5/dt-2.0.1/b-3.0.0/sl-2.0.0/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            // Inisialisasi DataTable
            $('#fasilitator').DataTable({ 
                lengthChange: true,
                responsive: true,
                paging: true, 
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All']
                ],
                rowReorder: true,
                columnDefs: [
                    {
                        orderable: false,
                        targets: 2
                    }
                ]
            }); 
        });
    </script>
@endsection