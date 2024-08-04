@extends('peserta.layouts.coba')
<link href="{{ asset('pesertastyle/assets/img/stc1.png') }}" rel="icon">


<main id="main" data-aos="fade-in">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Evaluasi Pelatihan</h2>
                <ol>
                    <li><a href="/peserta/beranda">Beranda</a></li>
                    <li><a href="/peserta/pelatihan">Pelatihan Saya</a></li>
                    <li><a href="{{ $kembali }}">Detail Pelatihan</a></li>
                    <li>Form Evaluasi Pelatihan</li>
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
                                        {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button> --}}
                                    </div>
                                </div>
                            @endif
                            @if ($id_pelatihan && is_string($formData))
                                @if (!$hasFilledForm)
                                    <div class="php-email-form mb-3">
                                        <h2 class="entry-title">
                                            Form Evaluasi Pelatihan
                                        </h2>

                                        <div class="entry-content">
                                            <p>Evaluasi Pelatihan ini akan membantu kami untuk meningkatkan kualitas
                                                pelatihan
                                                serta memenuhi kebutuhan
                                                dan permintaan anda.</p>
                                            <p>Silahkan menilai dan memberi komentar untuk hal-hal berikut :</p>
                                        </div>
                                    </div>
                                    <!-- Menampilkan formulir evaluasi jika $formData adalah string (data yang valid) -->
                                    <form id="form-eval" action="{{ route('evaluasi.store') }}" method="POST">
                                        @csrf
                                        <!-- Tambahkan input hidden dengan nilai dari $formData -->
                                        {{-- <input type="hidden" name="formData" value="{{ $formData }}"> --}}
                                        <!-- Tambahkan input lainnya sesuai kebutuhan -->
                                        <input type="hidden" name="form_source" value="pelatihan">
                                        <input type="hidden" id="data_respons" name="data_respons">
                                        <input type="hidden" name="id_pelatihan" value="{{ $id_pelatihan }}">
                                        <input type="hidden" id="id_user" name="id_user" value="{{ Auth::id() }}">
                                        {{-- <input type="hidden" id="data_respons" name="data_respons"> --}}
                                        {{-- <input type="submit" value="Submit" class="btn btn-success"> --}}
                                        <div id="fb-render"></div>
                                        <button id="save-button" class="btn btn-success" type="submit">Simpan</button>
                                    </form>
                                @else
                                    <div class="php-email-form mb-3">
                                        <div class="entry-content">
                                            <p>Anda sudah mengisi formulir evaluasi.</p>
                                        </div>
                                    </div>
                                @endif
                            @elseif($id_permintaan && is_string($formData))
                                @if (!$hasFilledForm)
                                    <div class="php-email-form mb-3">
                                        <h2 class="entry-title">
                                            Form Evaluasi Pelatihan
                                        </h2>

                                        <div class="entry-content">
                                            <p>Evaluasi Pelatihan ini akan membantu kami untuk meningkatkan kualitas
                                                pelatihan
                                                serta memenuhi kebutuhan
                                                dan permintaan anda.</p>
                                            <p>Silahkan menilai dan memberi komentar untuk hal-hal berikut :</p>
                                        </div>
                                    </div>
                                    <!-- Menampilkan formulir evaluasi jika $formData adalah string (data yang valid) -->
                                    <form id="form-eval" action="{{ route('evaluasi.store') }}" method="POST">
                                        @csrf
                                        <!-- Tambahkan input hidden dengan nilai dari $formData -->
                                        {{-- <input type="hidden" name="formData" value="{{ $formData }}"> --}}
                                        <!-- Tambahkan input lainnya sesuai kebutuhan -->
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
                                            <p>Anda sudah mengisi formulir evaluasi.</p>
                                        </div>
                                    </div>
                                @endif
                            @elseif($id_konsultasi && is_string($formData))
                                @if (!$hasFilledForm)
                                    <div class="php-email-form mb-3">
                                        <h2 class="entry-title">
                                            Form Evaluasi Pelatihan
                                        </h2>

                                        <div class="entry-content">
                                            <p>Evaluasi Pelatihan ini akan membantu kami untuk meningkatkan kualitas
                                                pelatihan
                                                serta memenuhi kebutuhan
                                                dan permintaan anda.</p>
                                            <p>Silahkan menilai dan memberi komentar untuk hal-hal berikut :</p>
                                        </div>
                                    </div>
                                    <!-- Menampilkan formulir evaluasi jika $formData adalah string (data yang valid) -->
                                    <form id="form-eval" action="{{ route('evaluasi.store') }}" method="POST">
                                        @csrf
                                        <!-- Tambahkan input hidden dengan nilai dari $formData -->
                                        {{-- <input type="hidden" name="formData" value="{{ $formData }}"> --}}
                                        <!-- Tambahkan input lainnya sesuai kebutuhan -->
                                        <input type="hidden" name="form_source" value="konsultasi">
                                        <input type="hidden" id="data_respons" name="data_respons">
                                        <input type="hidden" name="id_konsultasi" value="{{ $id_konsultasi }}">
                                        <input type="hidden" id="id_user" name="id_user"
                                            value="{{ Auth::id() }}">
                                        <div id="fb-render"></div>
                                        <button id="save-button" class="btn btn-success" type="submit">Simpan</button>
                                    </form>
                                @else
                                    <div class="php-email-form mb-3">
                                        <div class="entry-content">
                                            <p>Anda sudah mengisi formulir evaluasi.</p>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <!-- Tampilkan pesan jika $formData tidak sesuai dengan yang diharapkan -->
                                <div class="d-flex justify-content-center mt-5">
                                    <img src="/img/stc1.png" class="img-fluid" alt="">
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <strong>Belum ada form evaluasi.</strong>
                                </div>
                            @endif
                        </article>
                    </div>
                </div>
        </section>
    </section>
</main>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<script src="{{ asset('form-builder/form-render.min.js') }}"></script>
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


        $('#form-eval').on('submit', function() {
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


{{-- @if (isset($pertanyaanJawaban) && count($pertanyaanJawaban) > 0)
                                <div class="php-email-form mb-3">
                                    <h2 class="entry-title">
                                        Form Evaluasi Pelatihan
                                    </h2>

                                    <div class="entry-content">
                                        <p>Evaluasi Pelatihan ini akan membantu kami untuk meningkatkan kualitas
                                            pelatihan
                                            serta memenuhi kebutuhan
                                            dan permintaan anda.</p>
                                        <p>Silahkan menilai dan memberi komentar untuk hal-hal berikut :</p>
                                    </div>
                                </div>
                                @if (Session::has('success'))
                                    <div class="pt-3">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ Session::get('success') }}
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                                <form id="myForm" method="post" action="{{ route('evaluasi.store') }}"
                                    enctype="multipart/form-data" role="form">
                                    @csrf
                                    <input type="hidden" name="id_pelatihan" value="{{ $id_pelatihan }}">
                                    <input type="hidden" id="id_user" name="id_user" value="{{ Auth::id() }}">
                                    @foreach ($fasilitators as $index => $item)
                                        <div class="form-survey" style="background-color: rgb(222, 225, 222)">
                                            <div
                                                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                                                <h6 class="entry-content">Fasilitator {{ $loop->iteration }}:
                                                    {{ $item->fasilitator_pelatihan[0]['nama_fasilitator'] ?? 'Tidak ada Fasilitator' }}
                                                </h6>
                                            </div>
                                        </div>

                                        <div class="form-survey">
                                            <div
                                                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                                <h6 for="metode_{{ $index }}" class="entry-content">Metode yang
                                                    digunakan</h6>
                                            </div>
                                            <div class="mx-0 mx-sm-auto">
                                                <div class="text-left mb-3">
                                                    <div class="d-inline mx-3">
                                                        Kurang
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][metode]"
                                                            id="metode1_{{ $index }}" value="1" />
                                                        <label class="form-check-label" for="metode1">1</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][metode]"
                                                            id="metode2_{{ $index }}" value="2" />
                                                        <label class="form-check-label" for="metode2">2</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][metode]"
                                                            id="metode3_{{ $index }}" value="3" />
                                                        <label class="form-check-label" for="metode3">3</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][metode]"
                                                            id="metode4_{{ $index }}" value="4" />
                                                        <label class="form-check-label" for="metode4">4</label>
                                                    </div>
                                                    <div class="d-inline me-4">
                                                        Sangat Baik
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-survey">
                                            <div
                                                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                                <h6 for="respon_peserta_{{ $index }}" class="entry-content">
                                                    Kemampuan merespon peserta</h6>
                                            </div>
                                            <div class="mx-0 mx-sm-auto">
                                                <div class="text-left mb-3">
                                                    <div class="d-inline mx-3">
                                                        Kurang
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" <input
                                                            type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][respon_peserta]"
                                                            id="respon_peserta1_{{ $index }}"
                                                            value="1" />
                                                        <label class="form-check-label"
                                                            for="respon_peserta1">1</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" <input
                                                            type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][respon_peserta]"
                                                            id="respon_peserta2_{{ $index }}"
                                                            value="2" />
                                                        <label class="form-check-label"
                                                            for="respon_peserta2">2</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" <input
                                                            type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][respon_peserta]"
                                                            id="respon_peserta3_{{ $index }}"
                                                            value="3" />
                                                        <label class="form-check-label"
                                                            for="respon_peserta3">3</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" <input
                                                            type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][respon_peserta]"
                                                            id="respon_peserta4_{{ $index }}"
                                                            value="4" />
                                                        <label class="form-check-label"
                                                            for="respon_peserta4">4</label>
                                                    </div>
                                                    <div class="d-inline me-4">
                                                        Sangat Baik
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-survey">
                                            <div
                                                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                                <h6 for="pengembangan_proses_{{ $index }}"
                                                    class="entry-content">
                                                    Pengendalian/pengembangan proses</h6>
                                            </div>
                                            <div class="mx-0 mx-sm-auto">
                                                <div class="text-left mb-3">
                                                    <div class="d-inline mx-3">
                                                        Kurang
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][pengembangan_proses]"
                                                            id="pengembangan_proses1_{{ $index }}"
                                                            value="1" />
                                                        <label class="form-check-label"
                                                            for="pengembangan_proses1">1</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][pengembangan_proses]"
                                                            id="pengembangan_proses2_{{ $index }}"
                                                            value="2" />
                                                        <label class="form-check-label"
                                                            for="pengembangan_proses2">2</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][pengembangan_proses]"
                                                            id="pengembangan_proses3_{{ $index }}"
                                                            value="3" />
                                                        <label class="form-check-label"
                                                            for="pengembangan_proses3">3</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][pengembangan_proses]"
                                                            id="pengembangan_proses4_{{ $index }}"
                                                            value="4" />
                                                        <label class="form-check-label"
                                                            for="pengembangan_proses4">4</label>
                                                    </div>
                                                    <div class="d-inline me-4">
                                                        Sangat Baik
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-survey">
                                            <div
                                                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                                <h6 for="kecukupan_waktu_{{ $index }}" class="entry-content">
                                                    Kecukupan waktu</h6>
                                            </div>
                                            <div class="mx-0 mx-sm-auto">
                                                <div class="text-left mb-3">
                                                    <div class="d-inline mx-3">
                                                        Kurang
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][kecukupan_waktu]"
                                                            id="kecukupan_waktu1_{{ $index }}"
                                                            value="1" />
                                                        <label class="form-check-label"
                                                            for="kecukupan_waktu1">1</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][kecukupan_waktu]"
                                                            id="kecukupan_waktu2_{{ $index }}"
                                                            value="2" />
                                                        <label class="form-check-label"
                                                            for="kecukupan_waktu2">2</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][kecukupan_waktu]"
                                                            id="kecukupan_waktu3_{{ $index }}"
                                                            value="3" />
                                                        <label class="form-check-label"
                                                            for="kecukupan_waktu3">3</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][kecukupan_waktu]"
                                                            id="kecukupan_waktu4_{{ $index }}"
                                                            value="4" />
                                                        <label class="form-check-label"
                                                            for="kecukupan_waktu4">4</label>
                                                    </div>
                                                    <div class="d-inline me-4">
                                                        Sangat Baik
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-survey">
                                            <div
                                                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                                <h6 for="penguasaan_materi_{{ $index }}"
                                                    class="entry-content">
                                                    Penguasaan materi</h6>
                                            </div>
                                            <div class="mx-0 mx-sm-auto">
                                                <div class="text-left mb-3">
                                                    <div class="d-inline mx-3">
                                                        Kurang
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][penguasaan_materi]"
                                                            id="penguasaan_materi1_{{ $index }}"
                                                            value="1" />
                                                        <label class="form-check-label"
                                                            for="penguasaan_materi1">1</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][penguasaan_materi]"
                                                            id="penguasaan_materi2_{{ $index }}"
                                                            value="2" />
                                                        <label class="form-check-label"
                                                            for="penguasaan_materi2">2</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][penguasaan_materi]"
                                                            id="penguasaan_materi3_{{ $index }}"
                                                            value="3" />
                                                        <label class="form-check-label"
                                                            for="penguasaan_materi3">3</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][penguasaan_materi]"
                                                            id="penguasaan_materi4_{{ $index }}"
                                                            value="4" />
                                                        <label class="form-check-label"
                                                            for="penguasaan_materi4">4</label>
                                                    </div>
                                                    <div class="d-inline me-4">
                                                        Sangat Baik
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-survey">
                                            <div
                                                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                                <h6 for="kemampuan_menyampaikan_materi_{{ $index }}"
                                                    class="entry-content">Kemampuan menyampaikan materi</h6>
                                            </div>
                                            <div class="mx-0 mx-sm-auto">
                                                <div class="text-left mb-3">
                                                    <div class="d-inline mx-3">
                                                        Kurang
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][kemampuan_menyampaikan_materi]"
                                                            id="kemampuan_menyampaikan_materi1_{{ $index }}"
                                                            value="1" />
                                                        <label class="form-check-label"
                                                            for="kemampuan_menyampaikan_materi1">1</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][kemampuan_menyampaikan_materi]"
                                                            id="kemampuan_menyampaikan_materi2_{{ $index }}"
                                                            value="2" />
                                                        <label class="form-check-label"
                                                            for="kemampuan_menyampaikan_materi2">2</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][kemampuan_menyampaikan_materi]"
                                                            id="kemampuan_menyampaikan_materi3_{{ $index }}"
                                                            value="3" />
                                                        <label class="form-check-label"
                                                            for="kemampuan_menyampaikan_materi3">3</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][kemampuan_menyampaikan_materi]"
                                                            id="kemampuan_menyampaikan_materi4_{{ $index }}"
                                                            value="4" />
                                                        <label class="form-check-label"
                                                            for="kemampuan_menyampaikan_materi4">4</label>
                                                    </div>
                                                    <div class="d-inline me-4">
                                                        Sangat Baik
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-survey">
                                            <div
                                                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                                <h6 for="catatan_{{ $index }}"class="text-left">CATATAN :
                                                    Apapun
                                                    nilai yang anda berikan di atas,
                                                    mohon diberikan
                                                    penjelasan dalam satu atau dua kalimat di bawah ini:</h6>
                                            </div>
                                            <div class="mb-3">
                                                <textarea class="form-control" name="ratings[{{ $item->id_fasilitator }}][catatan]"
                                                    id="catatan_{{ $index }}" rows="3"></textarea>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="form-eval" style="background-color: rgb(206, 206, 206)">
                                        <h6 class="entry-content">Peserta</h6><br>
                                        <p>Silahkan menilai dan memberi komentar untuk hal-hal berikut :</p>
                                    </div>

                                    <div class="form-survey">
                                        <div
                                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                            <h6 for="partisipasi_peserta" class="entry-content">Partisipasi Peserta
                                            </h6>
                                        </div>
                                        <div class="mx-0 mx-sm-auto">
                                            <div class="text-left mb-3">
                                                <div class="d-inline mx-3">
                                                    Kurang
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="partisipasi_peserta" id="partisipasi_peserta"
                                                        value="1" />
                                                    <label class="form-check-label"
                                                        for="partisipasi_peserta">1</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="partisipasi_peserta" id="partisipasi_peserta"
                                                        value="2" />
                                                    <label class="form-check-label"
                                                        for="partisipasi_peserta">2</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="partisipasi_peserta" id="partisipasi_peserta"
                                                        value="3" />
                                                    <label class="form-check-label"
                                                        for="partisipasi_peserta">3</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="partisipasi_peserta" id="partisipasi_peserta"
                                                        value="4" />
                                                    <label class="form-check-label"
                                                        for="partisipasi_peserta">4</label>
                                                </div>
                                                <div class="d-inline me-4">
                                                    Sangat Baik
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-survey">
                                        <div
                                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                            <h6 for="disiplin_peserta" class="entry-content">Disiplin Peserta</h6>
                                        </div>
                                        <div class="mx-0 mx-sm-auto">
                                            <div class="text-left mb-3">
                                                <div class="d-inline mx-3">
                                                    Kurang
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="disiplin_peserta" id="disiplin_peserta"
                                                        value="1" />
                                                    <label class="form-check-label" for="disiplin_peserta">1</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="disiplin_peserta" id="disiplin_peserta"
                                                        value="2" />
                                                    <label class="form-check-label" for="disiplin_peserta">2</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="disiplin_peserta" id="disiplin_peserta"
                                                        value="3" />
                                                    <label class="form-check-label" for="disiplin_peserta">3</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="disiplin_peserta" id="disiplin_peserta"
                                                        value="4" />
                                                    <label class="form-check-label" for="disiplin_peserta">4</label>
                                                </div>
                                                <div class="d-inline me-4">
                                                    Sangat Baik
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-survey">
                                        <div
                                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                            <h6 for="kemampuan_menyerap_materi" class="entry-content">Kemampuan
                                                Menyerap Materi</h6>
                                        </div>
                                        <div class="mx-0 mx-sm-auto">
                                            <div class="text-left mb-3">
                                                <div class="d-inline mx-3">
                                                    Kurang
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="kemampuan_menyerap_materi"
                                                        id="kemampuan_menyerap_materi" value="1" />
                                                    <label class="form-check-label"
                                                        for="kemampuan_menyerap_materi">1</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="kemampuan_menyerap_materi"
                                                        id="kemampuan_menyerap_materi" value="2" />
                                                    <label class="form-check-label"
                                                        for="kemampuan_menyerap_materi">2</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="kemampuan_menyerap_materi"
                                                        id="kemampuan_menyerap_materi" value="3" />
                                                    <label class="form-check-label"
                                                        for="kemampuan_menyerap_materi">3</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="kemampuan_menyerap_materi"
                                                        id="kemampuan_menyerap_materi" value="4" />
                                                    <label class="form-check-label"
                                                        for="kemampuan_menyerap_materi">4</label>
                                                </div>
                                                <div class="d-inline me-4">
                                                    Sangat Baik
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-survey">
                                        <div
                                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                            <h6 for="keterbukaan_gagasan" class="entry-content">Keterbukaan Gagasan
                                            </h6>
                                        </div>
                                        <div class="mx-0 mx-sm-auto">
                                            <div class="text-left mb-3">
                                                <div class="d-inline mx-3">
                                                    Kurang
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="keterbukaan_gagasan" id="keterbukaan_gagasan"
                                                        value="1" />
                                                    <label class="form-check-label"
                                                        for="keterbukaan_gagasan">1</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="keterbukaan_gagasan" id="keterbukaan_gagasan"
                                                        value="2" />
                                                    <label class="form-check-label"
                                                        for="keterbukaan_gagasan">2</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="keterbukaan_gagasan" id="keterbukaan_gagasan"
                                                        value="3" />
                                                    <label class="form-check-label"
                                                        for="keterbukaan_gagasan">3</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="keterbukaan_gagasan" id="keterbukaan_gagasan"
                                                        value="4" />
                                                    <label class="form-check-label"
                                                        for="keterbukaan_gagasan">4</label>
                                                </div>
                                                <div class="d-inline me-4">
                                                    Sangat Baik
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-survey">
                                        <div
                                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                            <h6 for="catatan_peserta"class="text-left">CATATAN :
                                                Apapun
                                                nilai yang anda berikan di atas,
                                                mohon diberikan
                                                penjelasan dalam satu atau dua kalimat di bawah ini:</h6>
                                        </div>
                                        <div class="mb-3">
                                            <textarea class="form-control" name="catatan_peserta" id="catatan_peserta" rows="3"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-eval" style="background-color: rgb(206, 206, 206)">
                                        <h6 class="entry-content">Materi Pelatihan</h6><br>
                                        <p>Dari topik-topik pembahasan di bawah, manakah yang :</p>
                                    </div>
                                    @foreach ($pertanyaanJawaban as $item)
                                        <div class="form-eval">
                                            <div
                                                class="d-flex justify-content-between flex-wrap flex-md-nowrap pt-3 pb-2 mb-3">
                                                <p>{{ $item['pertanyaan'] }}</p>
                                            </div>
                                            @if (isset($item['jawaban']) && count($item['jawaban']) > 0)
                                                @foreach ($item['jawaban'] as $jawaban)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            value="{{ $jawaban->id_jawaban }}"
                                                            id="jawaban_{{ $jawaban->id_jawaban }}"
                                                            name="jawabans[{{ $jawaban->id_pertanyaan }}][jawaban]">
                                                        <label class="form-check-label text-left"
                                                            for="jawaban_{{ $jawaban->id_jawaban }}">
                                                            {{ $jawaban->jawaban }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    @endforeach

                                    <div class="form-eval" style="background-color: rgb(206, 206, 206)">
                                        <h6 class="entry-content">Fasilitas</h6><br>
                                        <p>Berikan penilaian terhadap fasilitas yang kami sediakan :</p>
                                    </div>

                                    <div class="form-survey">
                                        <div
                                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                            <h6 for="ruang_kelas" class="entry-content">Ruang Kelas</h6>
                                        </div>
                                        <div class="mx-0 mx-sm-auto">
                                            <div class="text-left mb-3">
                                                <div class="d-inline mx-3">
                                                    Tidak Memuaskan
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="ruang_kelas"
                                                        id="ruang_kelas" value="1" />
                                                    <label class="form-check-label" for="ruang_kelas">1</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="ruang_kelas"
                                                        id="ruang_kelas" value="2" />
                                                    <label class="form-check-label" for="ruang_kelas">2</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="ruang_kelas"
                                                        id="ruang_kelas" value="3" />
                                                    <label class="form-check-label" for="ruang_kelas">3</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="ruang_kelas"
                                                        id="ruang_kelas" value="4" />
                                                    <label class="form-check-label" for="ruang_kelas">4</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="ruang_kelas"
                                                        id="ruang_kelas" value="5" />
                                                    <label class="form-check-label" for="ruang_kelas">5</label>
                                                </div>
                                                <div class="d-inline me-4">
                                                    Sangat Memuaskan
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-survey">
                                        <div
                                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                            <h6 for="konsumsi" class="entry-content">Konsumsi</h6>
                                        </div>
                                        <div class="mx-0 mx-sm-auto">
                                            <div class="text-left mb-3">
                                                <div class="d-inline mx-3">
                                                    Kurang Memuaskan
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="konsumsi"
                                                        id="konsumsi" value="1" />
                                                    <label class="form-check-label" for="konsumsi">1</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="konsumsi"
                                                        id="konsumsi" value="2" />
                                                    <label class="form-check-label" for="konsumsi">2</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="konsumsi"
                                                        id="konsumsi" value="3" />
                                                    <label class="form-check-label" for="konsumsi">3</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="konsumsi"
                                                        id="konsumsi" value="4" />
                                                    <label class="form-check-label" for="konsumsi">4</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="konsumsi"
                                                        id="konsumsi" value="5" />
                                                    <label class="form-check-label" for="konsumsi">5</label>
                                                </div>
                                                <div class="d-inline me-4">
                                                    Sangat Memuaskan
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-survey">
                                        <div
                                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                            <h6 for="layanan_panitia" class="entry-content">Layanan Panitia</h6>
                                        </div>
                                        <div class="mx-0 mx-sm-auto">
                                            <div class="text-left mb-3">
                                                <div class="d-inline mx-3">
                                                    Kurang Memuaskan
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="layanan_panitia" id="layanan_panitia" value="1" />
                                                    <label class="form-check-label" for="layanan_panitia">1</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="layanan_panitia" id="layanan_panitia" value="2" />
                                                    <label class="form-check-label" for="layanan_panitia">2</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="layanan_panitia" id="layanan_panitia" value="3" />
                                                    <label class="form-check-label" for="layanan_panitia">3</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="layanan_panitia" id="layanan_panitia" value="4" />
                                                    <label class="form-check-label" for="layanan_panitia">4</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="layanan_panitia" id="layanan_panitia" value="5" />
                                                    <label class="form-check-label" for="layanan_panitia">5</label>
                                                </div>

                                                <div class="d-inline me-4">
                                                    Sangat Memuaskan
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-eval">
                                        <div
                                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 ">
                                            <div class="text-left">
                                                <p>
                                                    Apa yang dapat dilakukan untuk memperbaiki pelatihan ini, baik
                                                    konten/ materi pelatihan maupun fasilitas pelatihan ?
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group mb-2">
                                            <input type="text" class="form-control" placeholder="Jawaban Anda"
                                                name="memperbaiki_pelatihan" id="memperbaiki_pelatihan">
                                        </div>
                                    </div>

                                    <div class="form-eval">
                                        <div
                                            class="d-flex justify-content-between flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 ">
                                            <span for="rekomendasi_peserta"class="text-left">Saya akan merekomendasikan orang lain untuk mengikuti pelatihan ini
                                            </span>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                name="rekomendasi_peserta" id="rekomendasi_peserta" value="Ya" />
                                            <label class="form-check-label" for="rekomendasi_peserta">Ya</label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                name="rekomendasi_peserta" id="rekomendasi_peserta" value="Tidak" />
                                            <label class="form-check-label" for="rekomendasi_peserta">Tidak</label>
                                        </div>
                                    </div>

                                    <div class="form-eval">
                                        <div
                                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-2 ">
                                            <div class="text-left">
                                                <p>
                                                    Jika ya, sebutkan nama, lembaga dan kontak yang bisa dihubungi:

                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group mb-2">
                                            <input type="text" class="form-control" placeholder="Jawaban Anda"
                                                name="kontak" id="kontak">
                                        </div>
                                    </div>

                                    <div class="form-eval">
                                        <div
                                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                            <span for="hal_yang_dipelajari"class="text-left">
                                                Hal yang paling utama yang saya dapatkan / pelajari dari pelatihan ini </span>
                                        </div>
                                        <div class="mb-3">
                                            <textarea class="form-control" name="hal_yang_dipelajari" id="hal_yang_dipelajari" rows="3"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-eval">
                                        <div
                                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                            <span for="pelatihan_dibutuhkan"class="text-left">
                                                Pelatihan apa yang masih saya butuhkan utuk mendukung pekerjaan saya ? </span>
                                        </div>
                                        <div class="mb-3">
                                            <textarea class="form-control" name="pelatihan_dibutuhkan" id="pelatihan_dibutuhkan" rows="3"></textarea>
                                        </div>
                                    </div>

                                    <button class="btn btn-success" type="submit">Simpan</button>
                                </form>
                            @else
                                <div class="d-flex justify-content-center mt-5">
                                    <img src="http://satunama.org/wp-content/uploads/2023/06/Logo-STC-Satunama-Training-Center-768x408.png"
                                        alt="" style="width: 150px; height: auto;">
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <strong>Belum ada Evaluasi Pelatihan.</strong>
                                </div>
                            @endif --}}


{{-- <div class="form-survey pagination">
                                        @if ($fasilitators->currentPage() > 1)
                                        <a href="{{ $fasilitators->url($fasilitators->currentPage() - 1) }}">Previous</a>
                                        @endif
                                        
                                        @if ($fasilitators->hasMorePages())
                                        <a href="{{ $fasilitators->url($fasilitators->currentPage() + 1) }}">Next</a>
                                        @endif
                                    </div> --}}

<!-- Display pagination links with buttons -->
{{-- <div class="form-survey pagination">
                                <a href="{{ $fasilitators->links() }}">next</a>
                            </div> --}}
{{-- {{ route('peserta.studidampak.store') }} --}}
{{-- @foreach ($formpermintaan as $item) --}}
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var currentFasilitator = 1;
        var totalFasilitators = {{ $fasilitators->lastPage() }};

        // Function to show the current fasilitator and hide others
        function showFasilitator(fasilitatorNumber) {
            $('.form-survey').addClass('hidden');
            $('.fasilitator-' + fasilitatorNumber).removeClass('hidden');
        }

        // Show the first fasilitator initially
        showFasilitator(currentFasilitator);

        // Event listener for the "Next" button
        $('#nextFasilitator').on('click', function() {
            if (currentFasilitator < totalFasilitators) {
                currentFasilitator++;
                showFasilitator(currentFasilitator);
            }
        });
    });
</script> --}}

{{-- <div class="container"> --}}
{{-- <form method="post" action="">
        @csrf
        <input type="hidden" name="id_pelatihan" value="{{ $nilai }}">
        <div class="album py-2 px-2" data-aos="fade-up">
            <section class="container d-flex justify-content-center">

                <div class="col-lg-8">
                    <div class="row row-cols">
                        @foreach ($id_pelatihan as $item)
                            @if ($item->fasilitator_pelatihan1)
                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Fasilitator 1:
                                            {{ $item->fasilitator_pelatihan1->nama_fasilitator ?? 'Tidak ada Fasilitator' }}</span><br>
                                    </div>
                                    <p>Silahkan menilai dan memberi komentar untuk hal-hal berikut :</p>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Metode yang digunakan</span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
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
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Kemampuan merespon peserta</span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
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
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Pengendalian/pengembangan proses</span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Kecukupan waktu</span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Penguasaan materi
                                        </span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Kemampuan menyampaikan materi
                                        </span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">CATATAN : Apapun nilai yang anda berikan di atas,
                                            mohon diberikan
                                            penjelasan dalam satu atau dua kalimat di bawah ini:
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                            @endif

                            @if ($item->fasilitator_pelatihan2)
                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Fasilitator 2:
                                            {{ $item->fasilitator_pelatihan2->nama_fasilitator ?? 'Tidak ada Fasilitator' }}</span><br>
                                    </div>
                                    <p>Silahkan menilai dan memberi komentar untuk hal-hal berikut :</p>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Metode yang digunakan</span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Kemampuan merespon peserta</span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Pengendalian/pengembangan proses</span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Kecukupan waktu</span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Penguasaan materi
                                        </span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Kemampuan menyampaikan materi
                                        </span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">CATATAN : Apapun nilai yang anda berikan di atas,
                                            mohon diberikan
                                            penjelasan dalam satu atau dua kalimat di bawah ini:
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                            @endif

                            @if ($item->fasilitator_pelatihan3)
                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Fasilitator 3:
                                            {{ $item->fasilitator_pelatihan3->nama_fasilitator ?? 'Tidak ada Fasilitator' }}</span><br>
                                    </div>
                                    <p>Silahkan menilai dan memberi komentar untuk hal-hal berikut :</p>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Metode yang digunakan</span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Kemampuan merespon peserta</span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Pengendalian/pengembangan proses</span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Kecukupan waktu</span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Penguasaan materi
                                        </span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Kemampuan menyampaikan materi
                                        </span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">CATATAN : Apapun nilai yang anda berikan di atas,
                                            mohon diberikan
                                            penjelasan dalam satu atau dua kalimat di bawah ini:
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                        <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                            <div
                                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                <span class="h6">Materi Pelatihan:
                                    {{ $item->fasilitator_pelatihan1->nama_fasilitator ?? 'Tidak ada Fasilitator' }}</span><br>
                            </div>
                            <p>Dari topik-topik pembahasan di bawah, manakah yang :</p>
                        </div>
                    </div>
                    <a href="{{ $kembali }}" class="btn btn-success">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </section>
        </div>
    </form> --}}
{{-- </div> --}}
