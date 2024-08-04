@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Detail Permintaan</h1>
        <div class="d-flex justify-content-end">
            @if ($showButtons)
                @foreach ($data as $item)
                    <a href="{{ route('dashboard.permintaan.create', ['id' => $item]) }}" class="btn btn-success mx-1"><i
                            style="width:17px" data-feather="plus"></i>
                        Buatkan Pelatihan</a>
                @endforeach
            @endif
        </div>
    </div>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Tabel Detail Assesment Dasar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @foreach ($data as $item)
                    {{-- <p><strong>Nama Mitra :</strong> {{ $item->nama_mitra }}</p>
                    <p><strong>Judul Permintaan :</strong> {{ $item->judul_pelatihan }}</p> --}}
                    <table id="assesment" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">Nama Mitra</th>
                                <th scope="col">Judul Pelatihan</th>
                                {{-- <th scope="col">Jenis Pelatihan</th> --}}
                                <th scope="col">Tema Pelatihan</th>
                                <th scope="col">Nomor Hp PIC</th>
                                <th scope="col">Tanggal Mulai Pelatihan</th>
                                <th scope="col">Tanggal Selesai Pelatihan</th>
                                <th scope="col">Masalah Lembaga</th>
                                <th scope="col">Kebutuhan Lembaga</th>
                                <th scope="col">Materi & topik Pelatihan</th>
                                <th scope="col">Request Khusus</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($item->asessment_dasar as $dasar) --}}
                            <tr>
                                <td>{{ $item->mitra->nama_mitra }}</td>
                                <td>{{ $item->judul_pelatihan }}</td>
                                {{-- <td>{{ $item->jenis_pelatihan }}</td> --}}
                                <td>{{ $item->tema->judul_tema }}</td>
                                <td>{{ $item->no_pic }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_waktu_mulai)->locale('id')->isoFormat('D MMMM Y') }}
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_waktu_selesai)->locale('id')->isoFormat('D MMMM Y') }}
                                </td>
                                <td>{{ $item->masalah }}</td>
                                <td>{{ $item->kebutuhan }}</td>
                                <td>{{ $item->materi }}</td>
                                <td>{{ $item->request_khusus }}</td>
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Tabel Detail Assesment Peserta</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="peserta" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nama Peserta</th>
                            <th>Email Peserta</th>
                            <th>Jenis Kelamin</th>
                            <th>Jabatan di Lembaga</th>
                            <th>Tanggung Jawab Utama</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($item->assessment_peserta as $peserta)
                            <tr>
                                <td class="editable">{{ $peserta->nama_peserta }}</td>
                                <td class="editable">{{ $peserta->email_peserta }}</td>
                                <td class="editable">{{ $peserta->jenis_kelamin }}</td>
                                <td class="editable">{{ $peserta->jabatan }}</td>
                                <td class="editable">{{ $peserta->tanggung_jawab }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endforeach
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
            var judul_pelatihan = '{{ $judul_pelatihan }}';
            // Inisialisasi DataTable
            $('#peserta').DataTable({
                layout: {
                    topStart: {
                        buttons: [{
                                extend: 'pdfHtml5',
                                orientation: 'potrait',
                                pageSize: 'LEGAL',
                                title: 'Data Assesment Peserta ' + judul_pelatihan,
                            },
                            'spacer',
                            {
                                extend: 'excel',
                                title: 'Data Assesment Peserta ' + judul_pelatihan,
                            }
                        ]

                    }
                },
                "lengthChange": false,
                "responsive": true,
                "paging": true,
                "select": true,
                scrollX: true,
                scrollY: 200,
            });

            $('#assesment').DataTable({
                layout: {
                    topStart: {
                        buttons: [{
                                extend: 'pdfHtml5',
                                orientation: 'potrait',
                                pageSize: 'LEGAL',
                                title: 'Data Assesment Dasar ' + judul_pelatihan,
                            },
                            'spacer',
                            {
                                extend: 'excel',
                                title: 'Data Assesment Dasar ' + judul_pelatihan,
                            }
                        ]

                    }
                },
                "lengthChange": false,
                "responsive": true,
                "paging": true,
                "select": true,
            });
        });
    </script>
@endsection
