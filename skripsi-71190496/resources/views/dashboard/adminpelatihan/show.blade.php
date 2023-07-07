@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
        <h1 class="h2">Daftar Peserta Pelatihan</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Tabel Daftar Peserta</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="dataTable_length"><label>Show <select name="dataTable_length"
                                        aria-controls="dataTable"
                                        class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> entries</label></div>
                        </div>
                        <div class="col-sm-12 col-md-6 d-flex justify-content-end">
                            <div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search"
                                        class="form-control form-control-sm" placeholder=""
                                        aria-controls="dataTable"></label></div>
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
                                            style="width: 107.2px;">Email Peserta</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 75.2px;">No Telepon</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Age: activate to sort column ascending"
                                            style="width: 30.2px;">Usia</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Age: activate to sort column ascending"
                                            style="width: 30.2px;">Jenis Kelamin</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 74.2px;">Kabupaten</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 66.2px;">Provinsi</th>
                                        {{-- <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 66.2px;">Provins</th> --}}
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 66.2px;">Negara</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 66.2px;">Nama Organisasi</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 66.2px;">Jenis Organisasi</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 66.2px;">Jabatan Peserta</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 66.2px;">Dapat Informasi</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 66.2px;">Pelatihan Relevan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 66.2px;">Harapan Pelatihan</th>
                                    </tr>
                                </thead>
                                {{-- <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Nama Peserta</th>
                                        <th rowspan="1" colspan="1">Email Peserta</th>
                                        <th rowspan="1" colspan="1">No Telepon</th>
                                        <th rowspan="1" colspan="1">Usia</th>
                                        <th rowspan="1" colspan="1">Kabupaten</th>
                                        <th rowspan="1" colspan="1">Provinsi</th>
                                        <th rowspan="1" colspan="1">Negara</th>
                                        <th rowspan="1" colspan="1">Nama Organisasi</th>
                                        <th rowspan="1" colspan="1">Pelatihan Relevan</th>
                                        <th rowspan="1" colspan="1">Harapan Pelatihan</th>
                                    </tr>
                                </tfoot> --}}
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr class="odd">
                                            <td class="">{{ $item['nama_peserta'] }}</td>
                                            <td class="sorting_1">{{ $item['email_peserta'] }}</td>
                                            <td>{{ $item['no_hp'] }}</td>
                                            <td>{{ $item->id_rentang_usia }}</td>
                                            <td>{{ $item->id_gender }}</td>
                                            <td>{{ $item->id_kabupaten }}</td>
                                            <td>{{ $item['id_provinsi'] }}</td>
                                            <td>{{ $item['id_negara'] }}</td>
                                            <td>{{ $item['nama_organisasi'] }}</td>
                                            <td>{{ $item['id_organisasi'] }}</td>
                                            <td>{{ $item['jabatan_peserta'] }}</td>
                                            <td>{{ $item['id_informasi'] }}</td>
                                            <td>{{ $item['pelatihan_relevan'] }}</td>
                                            <td>{{ $item['harapan_pelatihan'] }}</td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
                                Showing 1
                                to 57 of 57 entries</div>
                        </div>
                        <div class="col-sm-12 col-md-7 d-flex justify-content-end">
                            <div class="dataTables_paginate paging_simple_numbers " id="dataTable_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a
                                            href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0"
                                            class="page-link">Previous</a></li>
                                    <li class="paginate_button page-item active"><a href="#"
                                            aria-controls="dataTable" data-dt-idx="1" tabindex="0"
                                            class="page-link">1</a></li>
                                    <li class="paginate_button page-item next disabled" id="dataTable_next"><a
                                            href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0"
                                            class="page-link">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
