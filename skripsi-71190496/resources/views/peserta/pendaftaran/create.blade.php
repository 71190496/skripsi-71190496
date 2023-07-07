@extends('peserta.layouts.main')

<main id="main">
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>Form Pendaftaran Pelatihan</h2>
        </div>
    </div><!-- End Breadcrumbs -->
    <div class="container">
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
    </div>
   
    <div class="album py-2 px-2  mb-3" data-aos="fade-up">
        <div class="container">
            <form method="post" action="{{ route('daftarpelatihan.store') }}">
                @csrf
                <input type="hidden" id="id_pelatihan" name="id_pelatihan" value="{{ $pelatihan->id_pelatihan }}">
                <div class="row row-cols">
                    <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                            <span class="h6">Data diri peserta</span>
                        </div>
                        <div class="row mb-3">
                            <label class="mb-2"for="nama_peserta">Nama Peserta</label>
                            <div class="col">
                                <input type="text" class="form-control" id="nama_peserta" name="nama_peserta"
                                    placeholder="Masukan nama Anda" aria-label="Masukan nama Anda">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="mb-2"for="nama_peserta">Email & Nomor Telepon</label>
                            <div class="col">
                                <input id="email_peserta" type="email" class="form-control"
                                    placeholder="Masukan Email Anda" name="email_peserta">
                            </div>
                            <div class="col">
                                <input id="no_hp" type="numeric" class="form-control"
                                    placeholder="Masukan Nomor Telepon Anda" name="no_hp">
                            </div>
                        </div>
                        <div class="row">
                            <label class="mb-2"for="nama_peserta">Gender & Rentang Usia</label>
                            <div class="col">
                                <select class="form-select" name="id_gender">
                                    @foreach ($gender as $item)
                                        <option value="{{ $item['id_gender'] }}">{{ $item['nama_gender'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select" name="id_rentang_usia">
                                    @foreach ($rentang_usia as $item)
                                        <option value="{{ $item['id_rentang_usia'] }}">{{ $item['usia'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                            <span class="h6">Asal daerah peserta</span>
                        </div>
                        <div class="row g-3">
                            <label for="nama_peserta">Kota, Provinsi & Negara</label>
                            <div class="col-md-6">
                                <select class="form-select" name="id_kabupaten">
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


                    <div class="card py-4 mx-3 mb-3" style="width: 95%">
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                            <span class="h6">Organisasi peserta</span>
                        </div>
                        <div class="row mb-3">
                            <label class="mb-2" for="nama_organisasi">Nama Organisasi</label>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Masukan Nama Organisasi Anda"
                                    name="nama_organisasi" id="nama_organisasi">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="mb-2" for="id_organisasi">Jenis Organisasi</label>
                            <div class="col">
                                <select name="id_organisasi" id="id_organisasi" class="form-select">
                                    @foreach ($jenis_organisasi as $item)
                                        <option value="{{ $item['id_organisasi'] }}">{{ $item['organisasi'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label class="mb-2" for="jabatan_peserta">Jabatan Pada Organisasi</label>
                            <div class="col">
                                <input id="jabatan_peserta" type="text" class="form-control"
                                    placeholder="Masukan Jabatan Anda" name="jabatan_peserta">
                            </div>
                        </div>
                    </div>

                    <div class="card py-4 mx-3 mb-3" style="width: 95%">
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                            <span class="h6">Informasi Pelatihan</span>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="mb-2" for="id_informasi">Dimana Anda Mendapat Info Tentang Pelatihan Ini ?</label>
                            <div class="col">
                                <select name="id_informasi" id="id_informasi" class="form-select">
                                    @foreach ($informasi_pelatihan as $item)
                                        <option value="{{ $item['id_informasi'] }}">{{ $item['keterangan'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                    </div>

                    <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                            <span class="h6">Pelatihan relevan dan harapan dari pelatihan</span>
                        </div>
                        <div class="form-group row-3 mb-3">
                            <label class="mb-2"for="pelatihan_relevan">Pelatihan Relevan Yang Pernah DiIkuti</label>
                            <div class="col">
                                <input id="pelatihan_relevan" type="text" class="form-control"
                                    placeholder="Pelatihan Relevan Yang Penah Anda Ikuti" name="pelatihan_relevan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="mb-2" for="harapan_pelatihan">Harapan Dari Pelatihan Ini</label>
                            <div class="col">
                                <textarea id="harapan_pelatihan" class="form-control" name="harapan_pelatihan" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="btn btn-success" href="/peserta/daftarpelatihan">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
</main>
