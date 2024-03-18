@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
        <h1 class="h2">Daftar Survey Kepuasan Pelatihan</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Tabel Survey Kepuasan Peserta</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    {{-- <div class="row">
                        <div class="col-sm-12">
                            <div id="dataTable_filter" class="dataTables_filter">
                                <label>Search:<input type="search" class="form-control form-control-sm" placeholder=""
                                        aria-controls="dataTable" name="search"></label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-2">
                            @if ($data->isNotEmpty())
                                <a href="{{ route('export.survey', ['id_pelatihan' => $data->first()->pelatihan->id_pelatihan]) }}"
                                    class="btn btn-success"><i style="width:17px" data-feather="file-text"></i></a>
                            @endif
                        </div>



                    </div> --}}
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="survey" class="display table dataTable" id="dataTable" width="100%"
                                cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Name: activate to sort column ascending"
                                            style="width: 107.2px;">Nama Peserta</th>
                                        <th class="sorting sorting_desc" tabindex="0" aria-controls="dataTable"
                                            rowspan="1" colspan="1"
                                            aria-label="Position: activate to sort column ascending" aria-sort="descending"
                                            style="width: 107.2px;">Tingkat Kepuasan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 75.2px;">Relevansi dengan Pekerjaan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Age: activate to sort column ascending"
                                            style="width: 30.2px;">Relevansi Biaya Pelatihan dengan Fasilitas</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Age: activate to sort column ascending"
                                            style="width: 30.2px;">Pembelajaran dari pelatihan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 74.2px;">Saran</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 66.2px;">Intensitas mengikuti Pelatihan di SATUNAMA</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 66.2px;">Provinsi</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 66.2px;">Kota</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 66.2px;">Pelatihan dari Lembaga Pelatihan lain yang pernah di
                                            ikuti</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($data as $item)
                                        <!-- Tampilkan data hanya jika nama peserta mengandung kata kunci pencarian -->
                                        <tr class="odd">
                                            <td class="">{{ $item->user->name }}</td>
                                            <td class="sorting_1">{{ $item->tingkat_kepuasan }}</td>
                                            <td>{{ $item->relevansi_pekerjaan }}</td>
                                            <td>{{ $item->relevansi_biaya }}</td>
                                            <td>{{ $item->pembelajaran }}</td>
                                            <td>{{ $item->saran }}</td>
                                            <td>{{ $item->intensitas_pelatihan }}</td>
                                            <td>{{ $item->provinsi->nama_provinsi }}</td>
                                            <td>{{ $item->kabupaten_kota->nama_kabupaten_kota }}</td>
                                            <td>{{ $item->pelatihan_lembaga_lain }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Sertakan jQuery dan DataTables JS -->
    <link
        href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.0/b-3.0.0/b-html5-3.0.0/fc-5.0.0/fh-4.0.0/r-3.0.0/sc-2.4.0/sp-2.3.0/datatables.min.css"
        rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.print.min.js"></script>
    <script
        src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.0/b-3.0.0/b-html5-3.0.0/fc-5.0.0/fh-4.0.0/r-3.0.0/sc-2.4.0/sp-2.3.0/datatables.min.js">
    </script>

    <script>
        $(document).ready(function() {
            // Inisialisasi DataTable
            $('#survey').DataTable({ 
                layout: {
                    topStart: {
                        buttons: [{
                                extend: 'pdfHtml5',
                                orientation: 'landscape',
                                pageSize: 'LEGAL',
                                title: 'Data Peserta Pelatihan',
                            },
                            'spacer',
                            {
                                extend: 'excel',
                                title: 'Data Peserta Pelatihan',
                            }
                        ]

                    }
                },
                // fixedColumns: {
                //     start: 2
                // },
                // layout: {
                //     top1: 'searchBuilder'
                // },
                lengthChange: false,
                responsive: true,
                paging: true,
                select: true,
                scrollX: true,
                scrollY: 200,
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All']
                ]
            });
        });
    </script>
@endsection