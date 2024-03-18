@extends('peserta.layouts.coba')
<link href="{{ asset('pesertastyle/assets/img/stc1.png') }}" rel="icon">

@section('container')
    <main id="main">


        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Konsultasi</h2>
                    <ol>
                        <li><a href="/peserta/beranda">Beranda</a></li>
                        <li>Form Konsultasi</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

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

        {{-- <div class="album py-2 px-2  mb-3">
            <div class="container" data-aos="fade-up">
                <form method="post" action="/peserta/konsultasi">
                    @csrf
                    <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
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
                                    <option value="Pemerintah">Pemerintah</option>
                                    <option value="Lembaga Pendidikan">Lembaga Pendidikan</option>
                                    <option value="Komunitas">Komunitas</option>
                                    <option value="Organisasi Nirlaba">Organisasi Nirlaba</option>
                                    <option value="Perusahaan">Perusahaan</option>
                                    <option value="Partai Politik">Partai Politik</option>
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
                                <label class="mb-2" for="negara">Negara</label>
                                <div class="col-md-4">
                                    <select class="form-select" name="id_negara" id="id_negara">
                                        <option value="">Pilih Negara</option>
                                        @foreach ($negara as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['nama_negara'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select" name="id_provinsi" id="id_provinsi">
                                        <option value="">Pilih Provinsi</option>
                                        <!-- Options for Provinsi will be populated dynamically using JavaScript -->
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select" name="id_kabupaten" id="id_kabupaten">
                                        <option value="">Pilih Kota</option> 
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
        </div> --}}

        <section id="contact" class="contact">
            <div class="row mt-1 justify-content-center" data-aos="fade-up">
                <div class="col-lg-10">
                    <form method="post" action="/peserta/konsultasi" role="form" class="php-email-form">
                        @csrf
                        <h5 class="mt-3">Data Organisasi</h5>
                        <div class="form-group mt-3">
                            <h6>Nama Organisasi</h6>
                            <input type="text" class="form-control" id="nama_mitra" name="nama_mitra"
                                placeholder="Nama Organisasi" required>
                        </div>

                        <div class="form-group mt-3">
                            <h6>Jenis Organisasi</h6>
                            <select name="jenis_organisasi" id="jenis_organisasi" class="form-select">
                                <option value="Pemerintah">Pemerintah</option>
                                <option value="Lembaga Pendidikan">Lembaga Pendidikan</option>
                                <option value="Komunitas">Komunitas</option>
                                <option value="Organisasi Nirlaba">Organisasi Nirlaba</option>
                                <option value="Perusahaan">Perusahaan</option>
                                <option value="Partai Politik">Partai Politik</option>
                            </select>
                        </div>

                        <div class="row mt-3"> 
                            <div class="col-md-6 form-group">
                                <h6>Email Organisasi</h6>
                                <input id="email" type="email" class="form-control" placeholder=" Email"
                                    name="email">
                            </div> 
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <h6>Nomor Telepon Organisasi</h6>
                                <input id="no_hp" type="numeric" class="form-control"
                                    placeholder="Nomor Telepon" name="no_hp">
                            </div>
                        </div>

                        <h5 class="mt-3">Alamat Organisasi</h5>
                        <div class="row mt-3"> 
                            <div class="col-md-4 form-group">
                                <h6>Negara</h6>
                                <select class="form-select" name="id_negara" id="id_negara">
                                    <option value="">Pilih Negara</option>
                                    @foreach ($negara as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['nama_negara'] }}</option>
                                    @endforeach
                                </select>
                            </div> 
                            <div class="col-md-4 form-group mt-3 mt-md-0">
                                <h6>Provinsi</h6>
                                <select class="form-select" name="id_provinsi" id="id_provinsi">
                                    <option value="">Pilih Provinsi</option> 
                                </select>
                            </div>
                            <div class="col-md-4 form-group mt-3 mt-md-0">
                                <h6>Kabupaten atau Kota</h6>
                                <select class="form-select" name="id_kabupaten" id="id_kabupaten">
                                    <option value="">Pilih Kota</option> 
                                </select>
                            </div>
                        </div>
 
                        <div class="form-group mt-3">
                            <h6>Deskripsi Kebutuhan</h6>
                            <textarea class="form-control" name="deskripsi_kebutuhan" rows="5" id="deskripsi_kebutuhan" placeholder="Deskripsi Kebutuhan" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Submit</button></div>
                    </form>
                </div>

            </div>
        </section>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Inisialisasi Select2 pada elemen-elemen select
            $('#id_negara').select2();
            $('#id_provinsi').select2();
            $('#id_kabupaten').select2();

            // Memantau perubahan pada elemen negara
            $('#id_negara').on('change', function() {
                var negaraId = $(this).val();

                // Hapus opsi sebelumnya pada elemen provinsi dan kota
                $('#id_provinsi').empty().append('<option value="">Pilih Provinsi</option>').trigger(
                    'change');
                $('#id_kabupaten').empty().append('<option value="">Pilih Kota</option>').trigger('change');

                if (negaraId) {
                    // Lakukan AJAX request untuk mendapatkan daftar provinsi
                    $.ajax({
                        url: '/get-provinsi/' + negaraId,
                        type: 'GET',
                        success: function(data) {
                            // Isi dropdown provinsi dengan data yang diterima dari server
                            var options = '<option value="">Pilih Provinsi</option>';
                            $.each(data.provinsi, function(key, value) {
                                options += '<option value="' + key + '">' + value +
                                    '</option>';
                            });
                            $('#id_provinsi').html(options).trigger(
                                'change'); // Aktifkan event change pada elemen provinsi
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', xhr.responseText);
                        }
                    });
                }
            });

            // Memantau perubahan pada elemen provinsi
            $('#id_provinsi').on('change', function() {
                var provinsiId = $(this).val();

                // Hapus opsi sebelumnya pada elemen kota
                $('#id_kabupaten').empty().append('<option value="">Pilih Kota</option>').trigger('change');

                if (provinsiId) {
                    // Lakukan AJAX request untuk mendapatkan daftar kota
                    $.ajax({
                        url: '/get-kabupaten/' + provinsiId,
                        type: 'GET',
                        success: function(data) {
                            // Isi dropdown kota dengan data yang diterima dari server
                            var options = '<option value="">Pilih Kota</option>';
                            $.each(data.kabupaten, function(key, value) {
                                options += '<option value="' + key + '">' + value +
                                    '</option>';
                            });
                            $('#id_kabupaten').html(options).trigger(
                                'change'); // Aktifkan event change pada elemen kota
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>

    {{-- <script>
        $(document).ready(function() {
            // Event handler ketika negara dipilih
            $('#id_negara').change(function() {
                var negaraId = $(this).val();

                // Kosongkan opsi provinsi
                $('#id_provinsi').empty().append('<option value="">Pilih Provinsi</option>');

                // Kosongkan opsi kabupaten/kota
                $('#id_kabupaten').empty().append('<option value="">Pilih Kota</option>');

                // Jika negara dipilih, ambil data provinsi berdasarkan negara
                if (negaraId) {
                    $.ajax({
                        url: '/get-provinsi/' + negaraId,
                        type: 'GET',
                        success: function(data) {
                            // Populate opsi provinsi
                            $.each(data, function(key, value) {
                                $('#id_provinsi').append('<option value="' + value.id +
                                    '">' + value.nama_provinsi + '</option>');
                            });
                        }
                    });
                }
            });

            // Event handler ketika provinsi dipilih
            $('#id_provinsi').change(function() {
                var provinsiId = $(this).val();

                // Kosongkan opsi kabupaten/kota
                $('#id_kabupaten').empty().append('<option value="">Pilih Kota</option>');

                // Jika provinsi dipilih, ambil data kabupaten/kota berdasarkan provinsi
                if (provinsiId) {
                    $.ajax({
                        url: '/get-kabupaten/' + provinsiId,
                        type: 'GET',
                        success: function(data) {
                            // Populate opsi kabupaten/kota
                            $.each(data, function(key, value) {
                                $('#id_kabupaten').append('<option value="' + value.id +
                                    '">' + value.nama_kabupaten_kota + '</option>');
                            });
                        }
                    });
                }
            });
        });
    </script> --}}


    {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}
    {{-- <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('#select2').select2();
        });
    </script> --}}

    {{-- <script>
        $(document).ready(function() {
            console.log('jQuery works!');
        });
    </script> --}}
