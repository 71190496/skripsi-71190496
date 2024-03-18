@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
    <h1 class="h2">Daftar Konsultasi</h1>
    
</div>
<div class="col-lg-18 mb-4 ">
    {{-- <div class="container"> --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-start">
                <h6 class="m-0 font-weight-bold text-success">Konsultasi</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="konsultasi" class="display">
                    <thead>
                        <tr>
                            <th class="col-md-3" scope="col">Nama Organisasi</th>
                            <th class="col-md-1" scope="col">Tanggal</th>
                            <th class="col-md-1 text-center" scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($konsultasi as $item)
                        <tr>
                            <td>{{ $item['nama_organisasi'] }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('dashboard.konsultasi.show', $item->id) }}"
                                    class="btn btn-primary px-2"><i style="width:17px" data-feather="eye"></i> Lihat Detail</a>
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
                // layout: {
                //     topStart: {
                //         buttons: [{
                //                 extend: 'pdfHtml5',
                //                 orientation: 'landscape',
                //                 pageSize: 'LEGAL',
                //                 title: 'Data Peserta Pelatihan',
                //             },
                //             'spacer',
                //             {
                //                 extend: 'excel',
                //                 title: 'Data Peserta Pelatihan',
                //             }
                //         ]

                //     }
                // },
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