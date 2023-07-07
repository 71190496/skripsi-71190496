@extends('peserta.layouts.main')

@section('container')
    <main id="main">


        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Form Pendaftaran Konsultasi</h2>
            </div>
        </div><!-- End Breadcrumbs -->

        @if ($errors->any())
            <div class="pt-3">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif()

        <div class="album py-2 px-2  mb-3">
            <div class="container" data-aos="fade-up">
                <form method="post" action="/peserta/konsultasi">
                    @csrf
                    <div class="row row-cols">
                        <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                            <div
                                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                                <span class="h6">Organisasi</span>
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-2"for="nama_organisasi">Nama Organisasi</label>
                                <input type="text" class="form-control" placeholder="Masukan Nama Organisasi Anda"
                                    name="nama_organisasi" id="nama_organisasi">
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-2" for="jenis_organisasi">Jenis Organisasi</label>
                                <select name="jenis_organisasi" id="jenis_organisasi" class="form-select">
                                    @foreach ($jenis_organisasi as $item)
                                        <option value="{{ $item['id_organisasi'] }}">{{ $item['organisasi'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-2">
                                <label class="mb-2" for="email">Email</label>
                                <input id="email" type="email" class="form-control" placeholder="Masukan Email Anda"
                                    name="email">
                            </div>
                            <div class="form-group mb-2">
                                <label class="mb-2" for="no_hp">Nomor Telepon</label>
                                <input id="no_hp" type="numeric" class="form-control"
                                    placeholder="Masukan Nomor Telepon Anda" name="no_hp">
                            </div>
                        </div>

                        <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                            <div
                                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                <span class="h6">Alamat Organisasi</span>
                            </div>
                            <div class="row g-3">
                                <label class="mb-2" for="kabupaten_kota">Kota, Provinsi & Negara</label>
                                <div class="col-md-6">
                                    <select class="form-select" name="kabupaten_kota" id="kabupaten_kota">
                                        @foreach ($kabupaten_kota as $item)
                                            <option value="{{ $item['id_kabupaten'] }}">{{ $item['nama_kabupaten_kota'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 ">
                                    <select class="form-select" name="id_provinsi">
                                        @foreach ($provinsi as $item)
                                            <option value="{{ $item['id_provinsi'] }}">{{ $item['nama_provinsi'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-select" name="id_negara">
                                        @foreach ($negara as $item)
                                            <option value="{{ $item['id_negara'] }}">{{ $item['nama_negara'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                            <div
                                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                                <span class="h6">Deskripsi Kebutuhan</span>
                            </div>
                            <div class="form-group mb-2">
                                <textarea id="deskripsi_kebutuhan" class="form-control" name="deskripsi_kebutuhan" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Daftar</button>
                </form>
            </div>
        </div>
        {{-- @endsection --}}
    </main>
