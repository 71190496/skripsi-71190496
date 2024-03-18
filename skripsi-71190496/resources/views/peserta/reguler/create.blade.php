@extends('peserta.layouts.coba')
<link href="{{ asset('pesertastyle/assets/img/stc1.png') }}" rel="icon">

<main id="main">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Detail Pelatihan</h2>
                <ol>
                    <li><a href="/peserta/beranda">Beranda</a></li>
                    <li><a href="/peserta/reguler">Reguler</a></li>
                    @foreach ($id_pelatihan as $item)
                        <li><a href="/peserta/reguler">Form Reguler</a></li>
                    @endforeach
                </ol>
            </div>

        </div>
    </section>

    <section id="contact" class="contact">
        <div class="row mt-1 justify-content-center" data-aos="fade-up">
            <div class="col-lg-10">
                <div class="form-studi mb-3">
                    {{-- <form id="dynamicForm" method="post" action="{{ route('peserta.permintaan.store') }}"> --}}
                    <form id="myForm" method="post" action="{{ route('peserta.reguler.store') }}" role="form"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="id_pelatihan" name="id_pelatihan" value="{{ $nilai }}">
                        <input type="hidden" id="id_user" name="id_user" value="{{ Auth::id() }}">
                        <h4 class="mb-5">Form Pelatihan Reguler</h4>

                        <div class="form-group mt-3">
                            <h6>Nama Peserta</h6>
                            <input type="text" class="form-control @error('nama_peserta') is-invalid @enderror"
                                id="nama_peserta" name="nama_peserta" placeholder="Masukan nama Anda"
                                value="{{ optional($user)->name }}" autocomplete="off">
                            @error('nama_peserta')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6 form-group">
                                <h6>Email Peserta</h6>
                                <input id="email_peserta" type="email"
                                    class="form-control @error('email_peserta') is-invalid @enderror"
                                    placeholder="Masukan Email Anda" name="email_peserta"
                                    value="{{ optional($user)->email }}" autocomplete="off">
                                @error('email_peserta')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <h6>Kontak Personal / Whatsapp</h6>
                                <input id="no_hp" type="numeric"
                                    class="form-control @error('no_hp') is-invalid @enderror"
                                    placeholder="Masukkan Nomor Telepon Anda" name="no_hp" value="{{ old('no_hp') }}"
                                    required autofocus>
                                @error('no_hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6 form-group">
                                <h6>Gender</h6>
                                <select class="form-select @error('gender') is-invalid @enderror" name="gender"
                                    required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki" {{ old('gender') == 'Laki-Laki' ? 'selected' : '' }}>
                                        Laki-Laki</option>
                                    <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                    <option value="Transgender" {{ old('gender') == 'Transgender' ? 'selected' : '' }}>
                                        Transgender</option>
                                    <option value="Tidak ingin menyebutkan"
                                        {{ old('gender') == 'Tidak ingin menyebutkan' ? 'selected' : '' }}>Tidak ingin
                                        menyebutkan</option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <h6>Rentang Usia</h6>
                                <select class="form-select @error('id_rentang_usia') is-invalid @enderror"
                                    name="id_rentang_usia" required>
                                    <option value="">Pilih Rentang Usia</option>
                                    @foreach ($rentang_usia as $item)
                                        <option value="{{ $item['id'] }}"
                                            {{ old('id_rentang_usia') == $item['id'] ? 'selected' : '' }}>
                                            {{ $item['usia'] }}</option>
                                    @endforeach
                                </select>
                                @error('id_rentang_usia')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2">
                            <h6 class="mt-2">Negara, Provinsi & Kabupaten/Kota</h6>
                            <div class="col-md-4">
                                <select class="form-select" name="id_negara" id="id_negara" required>
                                    <option value="">Pilih Negara</option>
                                    @foreach ($negara as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['nama_negara'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-select" name="id_provinsi" id="id_provinsi" required>
                                    <option value="">Pilih Provinsi</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-select" name="id_kabupaten" id="id_kabupaten" required>
                                    <option value="">Pilih Kota</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <h6>Nama Organisasi</h6>
                            <input type="text" class="form-control @error('nama_organisasi') is-invalid @enderror"
                                placeholder="Masukkan Nama Organisasi Anda" name="nama_organisasi" id="nama_organisasi"
                                value="{{ old('nama_organisasi') }}" required>
                            @error('nama_organisasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6 form-group">
                                <h6>Jenis Organisasi</h6>
                                <select name="id_organisasi" id="id_organisasi"
                                    class="form-select @error('id_organisasi') is-invalid @enderror" required>
                                    <option value="">Pilih Jenis Organisasi</option>
                                    @foreach ($jenis_organisasi as $item)
                                        <option value="{{ $item['id'] }}"
                                            {{ old('id_organisasi') == $item['id'] ? 'selected' : '' }}>
                                            {{ $item['organisasi'] }}</option>
                                    @endforeach
                                </select>
                                @error('id_organisasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <h6>Jabatan Pada Organisasi</h6>
                                <input id="jabatan_peserta" type="text"
                                    class="form-control @error('jabatan_peserta') is-invalid @enderror"
                                    placeholder="Masukkan Jabatan Anda" name="jabatan_peserta"
                                    value="{{ old('jabatan_peserta') }}" required>
                                @error('jabatan_peserta')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-3 mb-3">
                            <h6>Dimana Anda Mendapat Info Tentang Pelatihan Ini?</h6>
                            <select name="id_informasi" id="id_informasi"
                                class="form-select @error('id_informasi') is-invalid @enderror" required>
                                <option value="">Pilih Info Pelatihan</option>
                                @foreach ($informasi_pelatihan as $item)
                                    <option value="{{ $item['id'] }}"
                                        {{ old('id_informasi') == $item['id'] ? 'selected' : '' }}>
                                        {{ $item['keterangan'] }}</option>
                                @endforeach
                            </select>
                            @error('id_informasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3 mb-3">
                            <h6>Pelatihan Relevan Yang Pernah DiIkuti?</h6>
                            <input id="pelatihan_relevan" type="text"
                                class="form-control @error('pelatihan_relevan') is-invalid @enderror"
                                placeholder="Pelatihan Relevan Yang Pernah Anda Ikuti" name="pelatihan_relevan"
                                value="{{ old('pelatihan_relevan') }}" required>
                            @error('pelatihan_relevan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3 mb-3">
                            <h6>Upload Bukti Bayar</h6>
                            <p>Silahkan lakukan pembayaran melalui transfer ke Bank BNI 555 777 8967 a.n. Yayasan
                                SATUNAMA Yogyakarta.</p>
                            <input class="form-control @error('bukti_bayar') is-invalid @enderror" type="file"
                                id="bukti_bayar" name="bukti_bayar" required>
                            @error('bukti_bayar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            @if (old('bukti_bayar'))
                                <p>File yang diunggah sebelumnya: {{ old('bukti_bayar') }}</p>
                            @endif
                        </div>


                        <h6>Harapan Dari Pelatihan Ini</h6>
                        <div class="form-floating mb-3">
                            <textarea class="form-control @error('harapan_pelatihan') is-invalid @enderror" placeholder="Leave a comment here"
                                name="harapan_pelatihan" style="height: 100px">{{ old('harapan_pelatihan') }}</textarea>
                            <label for="floatingTextarea2">Request Khusus</label>
                            @error('harapan_pelatihan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-center"><button type="submit">Daftar</button></div>
                    </form>
                </div>
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
        $('#id_provinsi').empty().append('<option value="">Pilih Provinsi</option>').trigger('change');
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
                        options += '<option value="' + key + '" ' + (key == "{{ old('id_provinsi') }}" ? 'selected' : '') + '>' + value + '</option>';
                    });
                    $('#id_provinsi').html(options).trigger('change'); // Aktifkan event change pada elemen provinsi
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
                        options += '<option value="' + key + '" ' + (key == "{{ old('id_kabupaten') }}" ? 'selected' : '') + '>' + value + '</option>';
                    });
                    $('#id_kabupaten').html(options).trigger('change'); // Aktifkan event change pada elemen kota
                },
                error: function(xhr, status, error) {
                    console.error('Error:', xhr.responseText);
                }
            });
        }
    });

    $('.form-control').on('input', function() {
        $(this).removeClass('is-invalid'); // Menghapus kelas 'is-invalid'
        $(this).siblings('.invalid-feedback').remove(); // Menghapus pesan kesalahan
    });
});

</script>
