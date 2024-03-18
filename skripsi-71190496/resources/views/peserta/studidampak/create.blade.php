@extends('peserta.layouts.coba')
<link href="{{ asset('pesertastyle/assets/img/stc1.png') }}" rel="icon">

{{-- <main id="main" data-aos="fade-in"> --}}

{{-- <div class="breadcrumbs">
        <div class="container">
            <h2>Form Studi Dampak Pelatihan</h2>
            <p>SATUNAMA berusaha untuk memberikan layanan yang terbaik kepada para peserta pelatihan, mulai dari
                penyusunan
                materi, pelaksanaan, dan pasca pelatihan. Demi pelayanan yang lebih baik, kami mohon umpan balik dari
                para
                alumni, terutama terkait dengan manfaat dari pelatihan yang anda ikuti. Untuk itu silahkan mengisi form
                berikut
                ini:</p>
        </div>
    </div>  --}}



{{-- <div class="container mt-3">
        @include('peserta.layouts.nav')
    </div> --}}
{{-- <div class="album py-2 px-2  mb-2" data-aos="fade-up">
        <section class="container d-flex justify-content-center">
            <div class="col-lg-8">
                <form class="php-email-form" method="post" action="{{ route('peserta.studidampak.store') }}">
                    @csrf
                    <input type="hidden" name="id_pelatihan" value="{{ $nilai }}">
                    <div class="row row-cols">
                        <div class="card py-4 mx-3 mb-2 justify-content-center" style="width: 95%">

                            <div class="form-group mb-2">
                                <label for="perubahan_posisi">Setelah pelatihan yang anda ikuti, apakah anda mengalami
                                    perubahan
                                    posisi dalam
                                    pekerjaan anda?</label>
                                <select id="perubahan_posisi" name="perubahan_posisi" class="form-select">
                                    <option>Pilih perubahan posisi</option>
                                    <option>Ya</option>
                                    <option>Tidak</option>
                                </select>
                            </div>

                            <div id="posisi-sebelum" class="form-group mb-2" style="display: none">
                                <label for="posisi_sebelum">Dari Posisi?</label>
                                <input type="text" class="form-control" placeholder="Masukan Posisi Sebelum"
                                    id="posisi_sebelum" name="posisi_sebelum" value="{{ old('posisi_sebelum') }}">
                            </div>

                            <div id="posisi-sesudah" class="form-group mb-2" style="display: none">
                                <label for="posisi_sesudah">Ke Posisi?</label>
                                <input type="text" class="form-control" placeholder="Masukan Posisi Sesudah"
                                    id="posisi_sesudah" name="posisi_sesudah" value="{{ old('posisi_sesudah') }}">
                            </div>

                            <div class="form-group mb-2">
                                <label for="topik_pekerjaan">Dari materi yang diberikan, topik-topik mana yang langsung
                                    dapat
                                    digunakan
                                    dalam
                                    pekerjaan anda?</label>
                                <input type="text"
                                    class="form-control @error('topik_pekerjaan') is-invalid @enderror"
                                    placeholder="Jawaban Anda" id="topik_pekerjaan" name="topik_pekerjaan"
                                    value="{{ old('topik_pekerjaan') }}">
                                @error('topik_pekerjaan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label for="topik_kinerja">Dari materi yang diberikan, topik-topik mana yang dapat
                                    dimanfaatkan
                                    untuk
                                    meningkatkan kinerja Unit/ divisi/ departemen/ lembaga anda?</label>
                                <input type="text" class="form-control @error('topik_kinerja') is-invalid @enderror"
                                    placeholder="Jawaban Anda" id="topik_kinerja" name="topik_kinerja"
                                    value="{{ old('topik_kinerja') }}">
                                @error('topik_kinerja')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label for="topik_sulit">Dari materi yang diberikan, topik-topik mana yang masih
                                    merupakan
                                    kesulitan dan
                                    perlu diperdalam pemahamannya?</label>
                                <input type="text" class="form-control @error('topik_sulit') is-invalid @enderror"
                                    placeholder="Jawaban Anda" id="topik_sulit" name="topik_sulit"
                                    value="{{ old('topik_sulit') }}">
                                @error('topik_sulit')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label for="topik_tidak_relevan">Dari materi yang diberikan, topik-topik mana yang
                                    dianggap
                                    tidak
                                    relevan?</label>
                                <input type="text"
                                    class="form-control @error('topik_tidak_relevan') is-invalid @enderror"
                                    placeholder="Jawaban Anda" id="topik_tidak_relevan" name="topik_tidak_relevan"
                                    value="{{ old('topik_tidak_relevan') }}">
                                @error('topik_tidak_relevan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label for="rekomendasi_pelatihan">Kalau pelatihan yang sama ditawarkan lagi, apakah
                                    anda
                                    merekomendasikan teman
                                    sejawat
                                    anda untuk mengikuti atau lembaga anda untuk mengirimkan stafnya?</label>
                                <input type="text"
                                    class="form-control @error('rekomendasi_pelatihan') is-invalid @enderror"
                                    placeholder="Jawaban Anda" id="rekomendasi_pelatihan" name="rekomendasi_pelatihan"
                                    value="{{ old('rekomendasi_pelatihan') }}">
                                @error('rekomendasi_pelatihan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label for="pelatihan_yang_diperlukan">Untuk semakin meningkatkan kapasitas anda dan
                                    lembaga
                                    anda,
                                    pelatihan-pelatihan apa
                                    yang sangat diperlukan?</label>
                                <input type="text"
                                    class="form-control  @error('pelatihan_yang_diperlukan') is-invalid @enderror"
                                    placeholder="Jawaban Anda" id="pelatihan_yang_diperlukan"
                                    name="pelatihan_yang_diperlukan" value="{{ old('pelatihan_yang_diperlukan') }}">
                                @error('pelatihan_yang_diperlukan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <a href="{{ $kembali }}" class="btn btn-success">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </section>
    </div> --}}

<main id="main" data-aos="fade-in">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Studi Dampak Pelatihan</h2>
                <ol>
                    <li><a href="/peserta/beranda">Beranda</a></li>
                    <li><a href="/peserta/pelatihan">Pelatihan Saya</a></li>
                    <li><a href="{{ $kembali }}">Detail Pelatihan</a></li>
                    <li>Studi Dampak Pelatihan</li>
                </ol>
            </div>

        </div>
    </section>

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
                                    Form Studi Dampak
                                </h2>

                                <div class="entry-content">
                                    <p>SATUNAMA berusaha untuk memberikan layanan yang terbaik kepada para peserta
                                        pelatihan, mulai dari
                                        penyusunan
                                        materi, pelaksanaan, dan pasca pelatihan. Demi pelayanan yang lebih baik, kami
                                        mohon umpan balik dari
                                        para
                                        alumni, terutama terkait dengan manfaat dari pelatihan yang anda ikuti. Untuk
                                        itu silahkan mengisi form
                                        berikut</p>
                                </div>
                            </div>

                            <form id="myForm" method="post" action="{{ route('peserta.studidampak.store') }}"
                                role="form">
                                @csrf
                                <input type="hidden" name="id_pelatihan" value="{{ $id_pelatihan }}">

                                <div class="form-studi mt-3 mb-2">
                                    <div class="row row-cols">
                                        <div class="form-group mb-2">
                                            <label for="perubahan_posisi">Setelah pelatihan yang anda ikuti, apakah
                                                anda mengalami
                                                perubahan
                                                posisi dalam
                                                pekerjaan anda?</label>
                                            <select id="perubahan_posisi" name="perubahan_posisi" class="form-select">
                                                <option>Pilih perubahan posisi</option>
                                                <option>Ya</option>
                                                <option>Tidak</option>
                                            </select>
                                        </div>

                                        <div id="posisi-sebelum" class="form-group mb-2" style="display: none">
                                            <label for="posisi_sebelum">Dari Posisi?</label>
                                            <input type="text" class="form-control"
                                                placeholder="Masukan Posisi Sebelum" id="posisi_sebelum"
                                                name="posisi_sebelum" value="{{ old('posisi_sebelum') }}">
                                        </div>

                                        <div id="posisi-sesudah" class="form-group mb-2" style="display: none">
                                            <label for="posisi_sesudah">Ke Posisi?</label>
                                            <input type="text" class="form-control"
                                                placeholder="Masukan Posisi Sesudah" id="posisi_sesudah"
                                                name="posisi_sesudah" value="{{ old('posisi_sesudah') }}">
                                        </div>
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="topik_pekerjaan">Dari materi yang diberikan, topik-topik mana yang
                                            langsung
                                            dapat
                                            digunakan
                                            dalam
                                            pekerjaan anda?</label>
                                        <input type="text"
                                            class="form-control @error('topik_pekerjaan') is-invalid @enderror"
                                            placeholder="Jawaban Anda" id="topik_pekerjaan" name="topik_pekerjaan"
                                            value="{{ old('topik_pekerjaan') }}">
                                        @error('topik_pekerjaan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="topik_kinerja">Dari materi yang diberikan, topik-topik mana yang
                                            dapat
                                            dimanfaatkan
                                            untuk
                                            meningkatkan kinerja Unit/ divisi/ departemen/ lembaga anda?</label>
                                        <input type="text"
                                            class="form-control @error('topik_kinerja') is-invalid @enderror"
                                            placeholder="Jawaban Anda" id="topik_kinerja" name="topik_kinerja"
                                            value="{{ old('topik_kinerja') }}">
                                        @error('topik_kinerja')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="topik_sulit">Dari materi yang diberikan, topik-topik mana yang masih
                                            merupakan
                                            kesulitan dan
                                            perlu diperdalam pemahamannya?</label>
                                        <input type="text"
                                            class="form-control @error('topik_sulit') is-invalid @enderror"
                                            placeholder="Jawaban Anda" id="topik_sulit" name="topik_sulit"
                                            value="{{ old('topik_sulit') }}">
                                        @error('topik_sulit')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="topik_tidak_relevan">Dari materi yang diberikan, topik-topik mana
                                            yang
                                            dianggap
                                            tidak
                                            relevan?</label>
                                        <input type="text"
                                            class="form-control @error('topik_tidak_relevan') is-invalid @enderror"
                                            placeholder="Jawaban Anda" id="topik_tidak_relevan"
                                            name="topik_tidak_relevan" value="{{ old('topik_tidak_relevan') }}">
                                        @error('topik_tidak_relevan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="rekomendasi_pelatihan">Kalau pelatihan yang sama ditawarkan lagi,
                                            apakah
                                            anda
                                            merekomendasikan teman
                                            sejawat
                                            anda untuk mengikuti atau lembaga anda untuk mengirimkan stafnya?</label>
                                        <input type="text"
                                            class="form-control @error('rekomendasi_pelatihan') is-invalid @enderror"
                                            placeholder="Jawaban Anda" id="rekomendasi_pelatihan"
                                            name="rekomendasi_pelatihan" value="{{ old('rekomendasi_pelatihan') }}">
                                        @error('rekomendasi_pelatihan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="pelatihan_yang_diperlukan">Untuk semakin meningkatkan kapasitas
                                            anda dan
                                            lembaga
                                            anda,
                                            pelatihan-pelatihan apa
                                            yang sangat diperlukan?</label>
                                        <input type="text"
                                            class="form-control  @error('pelatihan_yang_diperlukan') is-invalid @enderror"
                                            placeholder="Jawaban Anda" id="pelatihan_yang_diperlukan"
                                            name="pelatihan_yang_diperlukan"
                                            value="{{ old('pelatihan_yang_diperlukan') }}">
                                        @error('pelatihan_yang_diperlukan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="text-center"> 
                                        <button type="submit">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </article>
                    </div>
                </div>
            </div>
        </section>
    </section>
    {{-- </main> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#perubahan_posisi').change(function() {
                if ($(this).val() == 'Ya') {
                    $('#posisi-sebelum').show();
                    $('#posisi-sesudah').show();

                } else {
                    $('#posisi-sebelum').hide();
                    $('#posisi-sesudah').hide();
                }
            });
        });
    </script>

</main>
