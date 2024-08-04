@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
        <h1 class="h2">Detail Hasil Form Evaluasi</h1>
        <div class="d-flex justify-content-end">
            @if ($showButtons)
                <a href="{{ route('dashboard.evaluasi.createKonsultasi', ['id' => $nilai]) }}" class="btn btn-success "><i
                        style="width:17px" data-feather="plus"></i>
                    Buat Form Evaluasi</a>
            @endif
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Tabel Daftar Peserta</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="peserta" class="display table dataTable" style="width: 800px; margin: 0 auto;">
                    <thead>
                        <tr>
                            <th>Nama Peserta</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesertaStatus as $peserta)
                            <tr>
                                <td>{{ $peserta->nama_peserta }}</td>
                                <td>{{ $peserta->is_filled ? 'Sudah Mengisi' : 'Belum Mengisi' }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Tabel Evaluasi Pelatihan Peserta</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                @if (empty($labels))
                    <p>Belum ada form evaluasi yang dibuat.</p>
                @else
                    <table id="evaluasi" class="display table dataTable" style="width: 800px; margin: 0 auto;">
                        <thead>
                            <tr>
                                <th>Nama Peserta</th>
                                @foreach ($labels as $item)
                                    <th>{{ $item }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nama_peserta as $index => $nama)
                                <tr>
                                    <td>{{ $nama }}</td> <!-- Menampilkan nama pengguna -->
                                    @foreach ($respons[$index] as $value)
                                        <td>{{ $value }}</td> <!-- Menampilkan data respons -->
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
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
            $('#evaluasi').DataTable({
                // dom: 'Bfrtip',
                layout: {
                    topStart: {
                        buttons: [{
                            extend: 'excel',
                            title: 'Data Peserta Pelatihan',
                        }]

                    }
                },
                // layout: {
                //     top1: 'searchBuilder'
                // },
                lengthChange: false,
                // responsive: true,
                // fixedColumns: {
                //     start: 1
                // },
                paging: true,
                select: true,
                // scrollX: true,
                scrollY: 300,
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All']
                ]
            });

            $('#peserta').DataTable({
                // dom: 'Bfrtip',
                // layout: {
                //     topStart: {
                //         buttons: [{
                //             extend: 'excel',
                //             title: 'Data Evaluasi Peserta Pelatihan',
                //         }]

                //     }
                // },
                // layout: {
                //     top1: 'searchBuilder'
                // },
                lengthChange: false,
                // responsive: true,
                // fixedColumns: {
                //     start: 1
                // },
                paging: true,
                select: true,
                // scrollX: 1200,
                scrollY: 300,
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
            //     responsive: true,
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



{{-- @foreach ($data as $item)
                            <!-- Tampilkan data hanya jika nama peserta mengandung kata kunci pencarian -->
                            <tr>
                                <td class="editable">{{ $item['nama_peserta'] }}</td>
                                <td class="editable">{{ $item['email_peserta'] }}</td>
                                <td class="editable">{{ $item['no_hp'] }}</td>
                                <td class="editable">{{ $item->rentang_usia->usia }}</td>
                                <td class="editable">{{ $item->gender }}</td>
                                <td class="editable">{{ $item->kabupaten_kota->nama_kabupaten_kota }}</td>
                                <td class="editable">{{ $item->provinsi->nama_provinsi }}</td>
                                <td class="editable">{{ $item->negara->nama_negara }}</td>
                                <td class="editable">{{ $item['nama_organisasi'] }}</td>
                                <td class="editable">{{ $item->jenis_organisasi->organisasi }}</td>
                                <td class="editable">{{ $item['jabatan_peserta'] }}</td>
                                <td class="editable">{{ $item->informasi_pelatihan->keterangan }}</td>
                                <td class="editable">{{ $item['pelatihan_relevan'] }}</td>
                                <td class="editable">{{ $item['harapan_pelatihan'] }}</td>
                                <td class="editable">
                                    <a href="{{ asset('storage/' . $item->bukti_bayar) }}" download>
                                        <img src="{{ asset('storage/' . $item->bukti_bayar) }}" alt="Bukti Bayar"
                                            style="max-width: 100px; max-height: 100px;">
                                        {{ basename($item['bukti_bayar']) }}
                                    </a> 
                                </td>
                            </tr>
                        @endforeach --}}
