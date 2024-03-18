@extends('peserta.layouts.coba')
<link href="{{ asset('pesertastyle/assets/img/stc1.png') }}" rel="icon">

<main id="main" data-aos="fade-in">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Survey Kepuasan</h2>
                <ol>
                    <li><a href="/peserta/beranda">Beranda</a></li>
                    <li><a href="/peserta/pelatihan">Pelatihan Saya</a></li>
                    <li><a href="{{ $kembali }}">Detail Pelatihan</a></li>
                    <li>Survey Kepuasan</li>
                </ol>
            </div>

        </div>
    </section>
    {{-- <div class="breadcrumbs">
        <div class="container">
            <h2>Form Survey Kepuasan</h2>
            <p>Halo kawan-kawan alumni Pelatihan SATUNAMA,

                Terimakasih sudah berpartisipasi dan belajar bersama kami. Berikut adalah survey kepuasan terhadap
                Pelatihan
                Daring yang diadakan oleh SATUNAMA. Hal ini kami butuhkan untuk perbaikan pelatihan kami ke depannya.
                Terimakasih atas masukan teman-teman.

                Salam sehat selalu..</p>
        </div>
    </div><!-- End Breadcrumbs --> --}}
    {{-- <div class="container mt-3">
        @include('peserta.layouts.nav')
    </div> --}}

    <section class="container" data-aos="fade-up">
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-3">
                        @include('peserta.layouts.nav')
                    </div>

                    <div class="col-lg-8 entries">
                        <article class="entry entry-single">
                            <div class="php-email-form mb-3">
                                <h2 class="entry-title">
                                    Form Survey Kepuasan
                                </h2>

                                <div class="entry-content">
                                    <p>Halo kawan-kawan alumni Pelatihan SATUNAMA,<br>

                                        Terimakasih sudah berpartisipasi dan belajar bersama kami. Berikut adalah survey
                                        kepuasan terhadap
                                        Pelatihan
                                        Daring yang diadakan oleh SATUNAMA. Hal ini kami butuhkan untuk perbaikan
                                        pelatihan kami ke depannya.
                                        Terimakasih atas masukan teman-teman.

                                        Salam sehat selalu..</p>
                                </div>
                            </div>
                            <form id="myForm" method="post" role="form"
                                action="{{ route('peserta.surveykepuasan.store') }}">
                                @csrf

                                <input type="hidden" name="id_pelatihan" value="{{ $id_pelatihan }}">
                                {{-- <div class="row row-cols"> --}}

                                <div class="form-survey">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <h6 class="entry-content">Tingkat Kepuasan</h6>
                                    </div>
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="entry-content">Seberapa puas Anda dengan pelatihan di
                                            SATUNAMA?</span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Sangat tidak puas
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tingkat_kepuasan"
                                                    id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tingkat_kepuasan"
                                                    id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tingkat_kepuasan"
                                                    id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tingkat_kepuasan"
                                                    id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat puas
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-survey">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <h6 class="entry-content">Relevansi dengan Pekerjaan</h6>
                                    </div>
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="entry-content"> Seberapa cocok dan membantu topik pelatihan yang
                                            Anda ikuti dengan
                                            pekerjaan Anda?</span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Sangat tidak cocok
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="relevansi_pekerjaan" id="relevansi_pekerjaan1"
                                                    value="1" />
                                                <label class="form-check-label" for="relevansi_pekerjaan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="relevansi_pekerjaan" id="relevansi_pekerjaan2"
                                                    value="2" />
                                                <label class="form-check-label" for="relevansi_pekerjaan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="relevansi_pekerjaan" id="relevansi_pekerjaan3"
                                                    value="3" />
                                                <label class="form-check-label" for="relevansi_pekerjaan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="relevansi_pekerjaan" id="relevansi_pekerjaan4"
                                                    value="4" />
                                                <label class="form-check-label" for="relevansi_pekerjaan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat cocok
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-survey">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <h6 class="entry-content">Relevansi Biaya Pelatihan dengan Fasilitas</h6>
                                    </div>
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="entry-content"> Seberapa relevan fasilitas dengan harga yang Anda
                                            bayar untuk pelatihan
                                            di SATUNAMA?</span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Sangat tidak relevan
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="relevansi_biaya"
                                                    id="relevansi_biaya1" value="1" />
                                                <label class="form-check-label" for="relevansi_biaya1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="relevansi_biaya"
                                                    id="relevansi_biaya2" value="2" />
                                                <label class="form-check-label" for="relevansi_biaya2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="relevansi_biaya"
                                                    id="relevansi_biaya3" value="3" />
                                                <label class="form-check-label" for="relevansi_biaya3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="relevansi_biaya"
                                                    id="relevansi_biaya4" value="4" />
                                                <label class="form-check-label" for="relevansi_biaya4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat relevan
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-survey">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 ">
                                        <div class="text-left">
                                            <h6>
                                                Pembelajaran dari pelatihan
                                            </h6>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 ">
                                        <span class="entry-content"> Hal penting apa yang Anda ambil dari mengikuti
                                            pelatihan
                                            di
                                            SATUNAMA?</span>
                                    </div>

                                    <div class="form-group mb-2">
                                        <input type="text" class="form-control" placeholder="Jawaban Anda"
                                            name="pembelajaran" id="pembelajaran">
                                    </div>
                                </div>

                                <div class="form-survey">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 ">
                                        <div class="text-left">
                                            <h6>
                                                Saran
                                            </h6>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 ">
                                        <span class="entry-content"> Hal apa yang perlu di tambahkan dalam
                                            pelatihan?</span>
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="text" class="form-control" placeholder="Jawaban Anda"
                                            name="saran" id="saran">
                                    </div>
                                </div>

                                <div class="form-survey">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-2 ">
                                        <div class="text-left">
                                            <h6>
                                                Intensitas mengikuti Pelatihan di SATUNAMA
                                            </h6>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 ">
                                        <span class="entry-content"> Berapa kali Anda mengikuti Pelatihan di
                                            SATUNAMA?</span>
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="text" class="form-control" placeholder="Jawaban Anda"
                                            name="intensitas_pelatihan" id="intensitas_pelatihan">
                                    </div>
                                </div>

                                <div class="form-survey">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 ">
                                        <div class="text-left">
                                            <h6>
                                                Asal Daerah Peserta Pelatihan
                                            </h6>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 ">
                                        <span class="entry-content"> Negara, Provinsi & Kabupaten/Kota</span>
                                    </div>
                                    <div class="form-group mb-2">
                                        <div class="row mt-3">
                                            <div class="col-md-4 form-group">
                                                <select class="form-select" name="id_negara" id="id_negara">
                                                    <option value="">Pilih Negara</option>
                                                    @foreach ($negara as $item)
                                                        <option value="{{ $item['id'] }}">{{ $item['nama_negara'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 form-group mt-3 mt-md-0">
                                                <select class="form-select" name="id_provinsi" id="id_provinsi">
                                                    <option value="">Pilih Provinsi</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 form-group mt-3 mt-md-0">
                                                <select class="form-select" name="id_kabupaten" id="id_kabupaten">
                                                    <option value="">Pilih Kota</option>
                                                </select>
                                            </div>
                                        </div>
                                        {{-- <label for="kabupaten_kota">Kota</label>
                                            <select id="kabupaten_kota" class="form-control" name="id_kabupaten">
                                                <option value="">Pilih Kota</option>
                                                @foreach ($kabupaten_kota as $item)
                                                    <option value="{{ $item['id'] }}">
                                                        {{ $item['nama_kabupaten_kota'] }}
                                                    </option>
                                                @endforeach
                                            </select> --}}
                                    </div>
                                </div>

                                <div class="form-survey">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 ">
                                        <div class="text-left">
                                            <h6>
                                                Pelatihan dari Lembaga Pelatihan lain yang pernah di
                                                ikuti
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="mb-2" for="pelatihan_lembaga_lain">Selain di SATUNAMA, apakah
                                            Anda pernah
                                            mengikuti
                                            pelatihan
                                            lainnya?
                                            Sebutkan
                                            lembaga/ instansinya.</label>
                                        <input type="text" class="form-control" placeholder="Jawaban Anda"
                                            name="pelatihan_lembaga_lain" id="pelatihan_lembaga_lain">
                                        <div class="survey text-center mt-3"><button type="submit">Submit</button></div>
                                    </div>
                                </div>
                    </div>
                    </form>
                    </article>
                </div>
            </div>
            </div>
        </section>
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
