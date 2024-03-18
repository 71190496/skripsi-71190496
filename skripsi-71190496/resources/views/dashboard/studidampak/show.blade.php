@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
        <h1 class="h2">Daftar Studi Dampak Pelatihan</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Tabel Studi Dampak Peserta</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 ">
                            <div id="dataTable_filter" class="dataTables_filter">
                                <label>Search:<input type="search" class="form-control form-control-sm" placeholder=""
                                        aria-controls="dataTable" name="search"></label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-2">
                            @if ($data->isNotEmpty())
                                <a href="{{ route('export.studi', ['id_pelatihan' => $data->first()->pelatihan->id_pelatihan]) }}"
                                    class="btn btn-success"><i style="width:17px" data-feather="file-text"></i></a>
                            @endif
                        </div>



                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Name: activate to sort column ascending"
                                            style="width: 107.2px;">Nama Peserta</th>
                                        <th class="sorting sorting_desc" tabindex="0" aria-controls="dataTable"
                                            rowspan="1" colspan="1"
                                            aria-label="Position: activate to sort column ascending" aria-sort="descending"
                                            style="width: 107.2px;">Perubahan Posisi</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 75.2px;">Posisi Sebelum</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Age: activate to sort column ascending"
                                            style="width: 30.2px;">Posisi Sesudah
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Age: activate to sort column ascending"
                                            style="width: 30.2px;">Topik yang dapat langsung digunakan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 74.2px;">Topik yang dimanfaatkan untuk meningkatkan kinerja</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 66.2px;">Topik yang dirasa sulit dipahami
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 66.2px;">Topik yang tidak relevan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 66.2px;">Peserta merekomendasikan pelatihan pada rekan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 66.2px;">Rekomendasi Pelatihan dari peserta</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($data as $item)
                                        <!-- Tampilkan data hanya jika nama peserta mengandung kata kunci pencarian -->
                                        <tr class="odd">
                                            <td class="">{{ $item->user->name }}</td>
                                            <td class="sorting_1">{{ $item->perubahan_posisi }}</td>
                                            <td>{{ $item->posisi_sebelum }}</td>
                                            <td>{{ $item->posisi_sesudah }}</td>
                                            <td>{{ $item->topik_pekerjaan }}</td>
                                            <td>{{ $item->topik_kinerja }}</td>
                                            <td>{{ $item->topik_sulit }}</td>
                                            <td>{{ $item->topik_tidak_relevan }}</td>
                                            <td>{{ $item->rekomendasi_pelatihan }}</td>
                                            <td>{{ $item->pelatihan_yang_diperlukan }}</td>
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
