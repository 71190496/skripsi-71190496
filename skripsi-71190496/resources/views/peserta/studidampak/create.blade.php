@extends('peserta.layouts.coba')
<link href="{{ asset('pesertastyle/assets/img/stc1.png') }}" rel="icon">



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
                            @if (Session::has('success'))
                                <div class="pt-3">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ Session::get('success') }}
                                    </div>
                                </div>
                            @endif
                            @if ($id_pelatihan && is_string($formData))
                                @if (!$hasFilledForm)
                                    <div class="php-email-form mb-3">
                                        <h2 class="entry-title">
                                            Form Studi Dampak
                                        </h2>

                                        <div class="entry-content">
                                            <p>SATUNAMA berusaha untuk memberikan layanan yang terbaik kepada para
                                                peserta
                                                pelatihan, mulai dari
                                                penyusunan
                                                materi, pelaksanaan, dan pasca pelatihan. Demi pelayanan yang lebih
                                                baik,
                                                kami
                                                mohon umpan balik dari
                                                para
                                                alumni, terutama terkait dengan manfaat dari pelatihan yang anda ikuti.
                                                Untuk
                                                itu silahkan mengisi form
                                                berikut</p>
                                        </div>
                                    </div>

                                    <form id="myForm" method="post"
                                        action="{{ route('peserta.studidampak.store') }}" role="form">
                                        @csrf
                                        <input type="hidden" name="id_pelatihan" value="{{ $id_pelatihan }}">
                                        <input type="hidden" name="form_source" value="pelatihan">
                                        <input type="hidden" id="data_respons" name="data_respons">
                                        <input type="hidden" name="id_pelatihan" value="{{ $id_pelatihan }}">
                                        <input type="hidden" id="id_user" name="id_user" value="{{ Auth::id() }}">

                                        <div id="fb-render"></div>
                                        <button id="save-button" class="btn btn-success" type="submit">Simpan</button>
                                    </form>
                                @else
                                    <div class="php-email-form mb-3">
                                        <div class="entry-content">
                                            <p>Anda sudah mengisi formulir studi dampak.</p>
                                        </div>
                                    </div>
                                @endif
                            @elseif($id_permintaan && is_string($formData))
                                @if (!$hasFilledForm)
                                    <div class="php-email-form mb-3">
                                        <h2 class="entry-title">
                                            Form Studi Dampak
                                        </h2>

                                        <div class="entry-content">
                                            <p>SATUNAMA berusaha untuk memberikan layanan yang terbaik kepada para
                                                peserta
                                                pelatihan, mulai dari
                                                penyusunan
                                                materi, pelaksanaan, dan pasca pelatihan. Demi pelayanan yang lebih
                                                baik,
                                                kami
                                                mohon umpan balik dari
                                                para
                                                alumni, terutama terkait dengan manfaat dari pelatihan yang anda ikuti.
                                                Untuk
                                                itu silahkan mengisi form
                                                berikut</p>
                                        </div>
                                    </div>

                                    <form id="myForm" method="post"
                                        action="{{ route('peserta.studidampak.store') }}" role="form">
                                        @csrf
                                        <input type="hidden" name="form_source" value="permintaan">
                                        <input type="hidden" id="data_respons" name="data_respons">
                                        <input type="hidden" name="id_permintaan" value="{{ $id_permintaan }}">
                                        <input type="hidden" id="id_user" name="id_user" value="{{ Auth::id() }}">

                                        <div id="fb-render"></div>
                                        <button id="save-button" class="btn btn-success" type="submit">Simpan</button>
                                    </form>
                                @else
                                    <div class="php-email-form mb-3">
                                        <div class="entry-content">
                                            <p>Anda sudah mengisi formulir studi dampak.</p>
                                        </div>
                                    </div>
                                @endif
                            @elseif($id_konsultasi && is_string($formData))
                                @if (!$hasFilledForm)
                                    <div class="php-email-form mb-3">
                                        <h2 class="entry-title">
                                            Form Studi Dampak
                                        </h2>

                                        <div class="entry-content">
                                            <p>SATUNAMA berusaha untuk memberikan layanan yang terbaik kepada para
                                                peserta
                                                pelatihan, mulai dari
                                                penyusunan
                                                materi, pelaksanaan, dan pasca pelatihan. Demi pelayanan yang lebih
                                                baik,
                                                kami
                                                mohon umpan balik dari
                                                para
                                                alumni, terutama terkait dengan manfaat dari pelatihan yang anda ikuti.
                                                Untuk
                                                itu silahkan mengisi form
                                                berikut</p>
                                        </div>
                                    </div>

                                    <form id="myForm" method="post"
                                        action="{{ route('peserta.studidampak.store') }}" role="form">
                                        @csrf
                                        <input type="hidden" name="form_source" value="konsultasi">
                                        <input type="hidden" id="data_respons" name="data_respons">
                                        <input type="hidden" name="id_konsultasi" value="{{ $id_konsultasi }}">
                                        <input type="hidden" id="id_user" name="id_user"
                                            value="{{ Auth::id() }}">

                                        <div id="fb-render"></div>
                                        <button id="save-button" class="btn btn-success"
                                            type="submit">Simpan</button>
                                    </form>
                                @else
                                    <div class="php-email-form mb-3">
                                        <div class="entry-content">
                                            <p>Anda sudah mengisi formulir studi dampak.</p>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <!-- Tampilkan pesan jika $formData tidak sesuai dengan yang diharapkan -->
                                <div class="d-flex justify-content-center mt-5">
                                    <img src="/img/stc1.png" class="img-fluid" alt="">
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <strong>Belum ada form studi dampak</strong>
                                </div>
                            @endif
                        </article>
                    </div>
                </div>
            </div>
        </section>
    </section>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<script src="{{ asset('form-builder/form-render.min.js') }}"></script>
{{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script>
    jQuery(function($) {
        var formData = {!! $formData !!}; // Menggunakan PHP Blade untuk menyisipkan data JSON
        var fbRender = $('#fb-render');
        var saveButton = $('#save-button');

        // Render setiap field ke dalam div masing-masing
        formData.forEach(function(field) {
            // Buat div untuk menyimpan field
            var fieldDiv = $('<div class="form-eval"></div>');

            // Tambahkan header dan paragraph ke dalam satu div
            if (field.type === 'header' || field.type === 'paragraph') {
                var element = $('<' + field.type + '></' + field.type + '>').addClass('form-text').html(
                    field.label);
                fieldDiv.append(element);
                // Tambahkan margin antara label dan input
                fieldDiv.css('margin-bottom', '10px');
            } else {
                // Tambahkan label jika ada
                if (field.label) {
                    var label = $('<label></label>').html(field.label);
                    // Tambahkan asterisk (*) jika field required
                    if (field.required) {
                        label.append($('<span>*</span>').css('color', 'red'));
                    }
                    fieldDiv.append(label);
                }
            }



            // Tambahkan input field
            switch (field.type) {
                case 'text':
                    var input = $('<input class="form-control"></input>').attr('type', field
                        .type);
                    // Tambahkan atribut lain jika diperlukan
                    if (field.name) {
                        input.attr('name', field.name);
                    }
                    if (field.required) {
                        input.prop('required', true);
                    }
                    fieldDiv.append(input);
                    break;
                case 'textarea':
                    var textarea = $('<textarea class="form-control form-eval"></textarea>');
                    // Tambahkan atribut lain jika diperlukan
                    if (field.name) {
                        textarea.attr('name', field.name);
                    }
                    if (field.required) {
                        textarea.prop('required', true);
                    }
                    fieldDiv.append(textarea);
                    break;
                case 'radio-group':
                    // Buat div untuk menyimpan radio button
                    var radioDiv;
                    if (field.inline) {
                        radioDiv = $('<div class="form-group"></div>');
                    } else {
                        radioDiv = $('<div></div>');
                    }

                    // Loop melalui nilai-nilai radio dan tambahkan ke radioDiv
                    field.values.forEach(function(value) {
                        var radio = $('<input class="form-check-input"></input>').attr('type',
                            'radio').attr('name', field.name).val(value.value);
                        if (field.required) {
                            radio.prop('required', true);
                        }
                        var label = $('<label class="form-check-label"></label>').append(radio)
                            .append(value.label);
                        // Buat div baru dengan kelas 'form-check' untuk setiap pasangan radio button dan labelnya jika tidak dalam mode inline
                        if (!field.inline) {
                            var radioItemDiv = $('<div class="form-check"></div>');
                            radioItemDiv.append(label);
                            radioDiv.append(radioItemDiv);
                        } else {
                            if (field.inline) {
                                label.addClass('form-check-inline');
                            }
                            radioDiv.append(label);
                        }
                    });
                    // Tambahkan radioDiv ke dalam fieldDiv
                    fieldDiv.append(radioDiv);
                    break;
                case 'check-group':
                    var checkDiv;
                    if (field.inline) {
                        checkDiv = $('<div class="form-group"></div>');
                    } else {
                        checkDiv = $('<div></div>');
                    }

                    field.values.forEach(function(value) {
                        var checkbox = $('<input class="form-check-input"></input>').attr(
                            'type', 'checkbox').attr('name', field.name + '[]').val(value
                            .value);
                        if (field.required) {
                            checkbox.prop('required', true);
                        }
                        var label = $('<label class="form-check-label"></label>').append(
                            checkbox).append(value.label);

                        if (!field.inline) {
                            var checkItemDiv = $('<div class="form-check"></div>');
                            checkItemDiv.append(label);
                            checkDiv.append(checkItemDiv);
                        } else {
                            if (field.inline) {
                                label.addClass('form-check-inline');
                            }
                            checkDiv.append(label);
                        }
                    });
                    fieldDiv.append(checkDiv);
                    break;

                    // Untuk date field
                case 'date':
                    var dateInput = $('<input class="form-control"></input>').attr('type', 'date');
                    // Tambahkan atribut lain jika diperlukan
                    if (field.name) {
                        dateInput.attr('name', field.name);
                    }
                    if (field.required) {
                        dateInput.prop('required', true);
                    }
                    fieldDiv.append(dateInput);
                    break;

                    // Untuk select
                case 'select':
                    var select = $('<select class="form-control"></select>').attr('name', field.name);
                    // Tambahkan atribut lain jika diperlukan
                    if (field.required) {
                        select.prop('required', true);
                    }
                    // Tambahkan opsi select
                    field.values.forEach(function(option) {
                        var optionElement = $('<option></option>').attr('value', option.value)
                            .text(option.label);
                        select.append(optionElement);
                    });
                    fieldDiv.append(select);
                    break;

                    // Untuk file upload
                case 'file':
                    var fileInput = $('<input class="form-control-file"></input>').attr('type', 'file');
                    // Tambahkan atribut lain jika diperlukan
                    if (field.name) {
                        fileInput.attr('name', field.name);
                    }
                    if (field.required) {
                        fileInput.prop('required', true);
                    }
                    fieldDiv.append(fileInput);
                    break;

                    // Untuk field input number
                case 'number':
                    var numberInput = $('<input class="form-control"></input>').attr('type', 'number');
                    // Tambahkan atribut lain jika diperlukan
                    if (field.name) {
                        numberInput.attr('name', field.name);
                    }
                    if (field.required) {
                        numberInput.prop('required', true);
                    }
                    fieldDiv.append(numberInput);
                    break;

                    // Handle jenis field lainnya sesuai kebutuhan
            }

            // Tambahkan field ke dalam div render
            fbRender.append(fieldDiv);
        });


        // Lanjutkan pengiriman formulir
        $('#myForm').on('submit', function() {
            var userData = {}; // Data pengguna dari formulir

            // Ambil nilai dari setiap input dan simpan dalam userData
            $('#fb-render input, #fb-render textarea').each(function() {
                var name = $(this).attr('name');
                var value = $(this).val();

                // Periksa apakah input adalah input radio dan apakah dipilih
                if ($(this).is(':radio') && !$(this).is(':checked')) {
                    // Jika input radio tidak dipilih, jangan masukkan ke dalam userData
                    return; // Lanjutkan ke input berikutnya dalam loop
                }

                // Masukkan nilai input ke dalam userData
                userData[name] = value;
            });

            // Mengubah data respons menjadi string JSON
            var jsonData = JSON.stringify(userData);
            $('#data_respons').val(jsonData);

            console.log(jsonData);

            // Lanjutkan pengiriman formulir
            return true;
        });
    });
</script>

</main>

{{-- $(document).ready(function() {
    //     $('#perubahan_posisi').change(function() {
    //         if ($(this).val() == 'Ya') {
    //             $('#posisi-sebelum').show();
    //             $('#posisi-sesudah').show();

    //         } else {
    //             $('#posisi-sebelum').hide();
    //             $('#posisi-sesudah').hide();
    //         }
    //     });
    // }); --}}
{{-- <div class="form-studi mt-3 mb-2">
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
</div> --}}

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
