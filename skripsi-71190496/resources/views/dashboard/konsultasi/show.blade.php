@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Detail Konsultasi</h1>
        <div class="d-flex justify-content-end">
            @if ($showButtons)
                @foreach ($data as $item)
                    {{-- <a href="{{ route('dashboard.konsultasi.peserta', ['id' => $item]) }}" class="btn btn-success mx-1"><i style="width:17px" data-feather="plus"></i> Buatkan Akun Peserta</a> --}}
                    <a href="{{ route('dashboard.konsultasi.create', ['id' => $item]) }}" class="btn btn-success mx-1"><i
                            style="width:17px" data-feather="plus"></i> Buatkan Pelatihan</a>
                @endforeach
            @endif

        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Tabel Detail Konsultasi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="konsultasi" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nama Organisasi</th>
                            <th>Email Organisasi</th>
                            <th>Nomor Telepon Organisasi</th>
                            <th>Negara</th>
                            <th>Provinsi</th>
                            <th>Kabupaten/Kota</th>
                            <th>Deskripsi Kebutuhan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item['nama_organisasi'] }}</td>
                                <td>{{ $item['email'] }}</td>
                                <td>{{ $item['no_hp'] }}</td>
                                <td>{{ $item->negara->nama_negara }}</td>
                                <td>{{ $item->provinsi->nama_provinsi }}</td>
                                <td>{{ $item->kabupaten_kota->nama_kabupaten_kota }}</td>
                                <td>{{ $item->deskripsi_kebutuhan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
            $('#konsultasi').DataTable({
                // dom: 'Bfrtip',
                layout: {
                    topStart: {
                        buttons: [{
                                extend: 'pdfHtml5',
                                orientation: 'potrait',
                                pageSize: 'LEGAL',
                                title: 'Data Detail Konsultasi',
                            },
                            'spacer',
                            {
                                extend: 'excel',
                                title: 'Data Detail Konsultasi',
                            }
                        ]

                    }
                },
                // layout: {
                //     top1: 'searchBuilder'
                // },
                lengthChange: false,
                responsive: true,
                // fixedColumns: {
                //     start: 1
                // },
                paging: true,
                select: true,
                scrollX: true,
                scrollY: 200,
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All']
                ]
            });

            // $('#daftar_hadir').DataTable({
            //     // dom: 'Bfrtip',
            //     layout: {
            //         topStart: {
            //             buttons: [{
            //                     extend: 'pdfHtml5',
            //                     orientation: 'potrait',
            //                     pageSize: 'LEGAL',
            //                     title: 'Data Hadir Peserta Pelatihan ' + nama_pelatihan,
            //                 },
            //                 'spacer',
            //                 {
            //                     extend: 'excel',
            //                     title: 'Data Hadir Peserta Pelatihan ' + nama_pelatihan,
            //                 }
            //             ]

            //         }
            //     },
            //     // layout: {
            //     //     top1: 'searchBuilder'
            //     // },
            //     lengthChange: false,
            //     // responsive: true,
            //     // fixedColumns: {
            //     //     start: 1
            //     // },
            //     paging: true,
            //     select: true,
            //     // scrollX: true,
            //     // scrollY: 200,
            //     lengthMenu: [
            //         [10, 25, 50, -1],
            //         [10, 25, 50, 'All']
            //     ]
            // });
        });
    </script>
@endsection
