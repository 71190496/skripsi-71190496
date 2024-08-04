@extends('peserta.layouts.coba')
<link href="{{ asset('pesertastyle/assets/img/stc1.png') }}" rel="icon">


{{-- <div class="breadcrumbs">
        <div class="container">
            <h2>Daftar Hadir</h2>
            <p>Mohon bantuan teman-teman peserta untuk menuliskan NAMA
                LENGKAP untuk dicantumkan dalam e-Sertifikat. Terimakasih.</p>
        </div>
    </div>  --}}

{{-- <div class="container mt-3">
        @include('peserta.layouts.nav')
    </div> --}}
{{-- <div class="album py-2 px-2  mb-3" data-aos="fade-up">
        <section class="container d-flex justify-content-center">
            <div class="col-lg-8">
                <form id="myForm" method="post" action="{{ route('peserta.daftarhadir.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_pelatihan" value="{{ $nilai }}">
                    <div class="row row-cols">
                        <div class="card py-4 mx-3 mb-2 justify-content-center" style="width: 95%">

                            <div class="form-group mb-2">
                                <label for="nama_peserta">Nama Lengkap Peserta</label>
                                <input type="text" class="form-control @error('nama_peserta') is-invalid @enderror"
                                    placeholder="Nama Lengkap Anda" id="nama_peserta" name="nama_peserta"
                                    value="{{ old('nama_peserta') }}">
                                @error('nama_peserta')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label for="email_peserta">Email</label>
                                <input type="email" class="form-control @error('email_peserta') is-invalid @enderror"
                                    placeholder="Email Anda" id="email_peserta" name="email_peserta"
                                    value="{{ old('email_peserta') }}">
                                @error('email_peserta')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label for="nomor_hp_peserta">No Handphone</label>
                                <input type="text"
                                    class="form-control @error('nomor_hp_peserta') is-invalid @enderror"
                                    placeholder="No Hp Anda" id="nomor_hp_peserta" name="nomor_hp_peserta"
                                    value="{{ old('nomor_hp_peserta') }}">
                                @error('nomor_hp_peserta')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <a href="{{ $kembali }}" class="btn btn-success">Kembali</a>
                    <button type="button" id="simpanButton" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </section>
    </div> --}}

<main id="main" data-aos="fade-in">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Presensi</h2>
                <ol>
                    <li><a href="/peserta/beranda">Beranda</a></li>
                    <li><a href="/peserta/pelatihan">Pelatihan Saya</a></li>
                    <li><a href="{{ $kembali }}">Detail Pelatihan</a></li>
                    <li>Presensi</li>
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

                    <div class="col-lg-9 entries">
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

                            <form method="post" action="{{ route('peserta.daftarhadir.store') }}" role="form"
                                class="form-studi">
                                @csrf
                                <h2 class="entry-title">
                                    Presensi
                                </h2>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td width="50%">Tanggal Presensi</td>
                                            <td width="25%">Presensi</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <!-- Hidden input to store the date and time -->
                                                <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                                {{-- <input type="hidden" name="tanggal_presensi" id="tanggal_presensi"
                                                    value=""> --}}
                                                <input type="hidden" name="id_pelatihan" id="id_pelatihan"
                                                    value="{{ $id_pelatihan }}">
                                                <input type="hidden" name="id_presensi" id="id_presensi"
                                                    value="{{ $id_presensi }}">
                                                @if ($presensiStatus == 'buka')
                                                    {{-- <button class="btn btn-success" type="button"
                                                        onclick="submitForm()">Presensi</button> --}}
                                                    <button class="btn btn-primary" type="submit">Presensi</button>
                                                @else
                                                    <p>Presensi Tutup</p>
                                                @endif
                                                {{-- <button class="btn btn-success" type="button"
                                                    onclick="submitForm()">Presensi</button> --}}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </article>
                    </div>
                </div>
            </div>
        </section>
    </section>
</main>

<!-- resources/views/presensi.blade.php atau file yang sesuai -->
{{-- <script>
    function submitForm() {
        // Set the current date and time to the hidden input field
        var currentDateTime = new Date().toISOString().slice(0, 19).replace("T", " ");
        document.getElementById('tanggal_presensi').value = currentDateTime;

        // Submit the form
        document.getElementById('myForm').submit();
    }
</script> --}}
{{-- <table class="table">
                                    <tbody>
                                        <tr align="center">
                                            <td>Jumlah Kehadiran </td>
                                            <td>Jumlah Pertemuan </td>
                                            <td>Persentase Kehadiran </td>
                                            <td>Presensi</td> <!-- Kolom untuk tombol presensi -->
                                        </tr>
                                        <tr align="center">
                                            <td>0</td>
                                            <td>0</td>
                                            <td><b>NAN%</b></td>

                                        </tr>
                                        <tr>
                                            <td colspan="4"><em>*Untuk dapat mengikuti Ujian Akhir Semester,
                                                    presentase kehadiran anda harus lebih dari 75%.</em></td>
                                        </tr>
                                    </tbody>
                                </table> --}}


{{-- 

                                <div class="entry-content">
                                    <p>Mohon bantuan teman-teman peserta untuk menuliskan NAMA
                                        LENGKAP untuk dicantumkan dalam e-Sertifikat. Terimakasih.</p>
                                </div>
                                <div class="form-group mt-3 mb-3">
                                    <input type="text"
                                        class="form-control @error('nama_peserta') is-invalid @enderror"
                                        placeholder="Nama Lengkap Anda" id="nama_peserta" name="nama_peserta"
                                        value="{{ old('nama_peserta') }}">
                                    @error('nama_peserta')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input type="email"
                                            class="form-control @error('email_peserta') is-invalid @enderror"
                                            placeholder="Email Anda" id="email_peserta" name="email_peserta"
                                            value="{{ old('email_peserta') }}">
                                        @error('email_peserta')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group mt-3 mt-md-0">
                                        <input type="text"
                                            class="form-control @error('nomor_hp_peserta') is-invalid @enderror"
                                            placeholder="No Hp Anda" id="nomor_hp_peserta" name="nomor_hp_peserta"
                                            value="{{ old('nomor_hp_peserta') }}">
                                        @error('nomor_hp_peserta')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mt-3 mb-3">
                                    <input type="text"
                                        class="form-control @error('nama_peserta') is-invalid @enderror"
                                        placeholder="Nama Lengkap Anda" id="nama_peserta" name="nama_peserta"
                                        value="{{ old('nama_peserta') }}">
                                    @error('nama_peserta')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mt-3 mb-3">
                                    <input type="text"
                                        class="form-control @error('nama_peserta') is-invalid @enderror"
                                        placeholder="Nama Lengkap Anda" id="nama_peserta" name="nama_peserta"
                                        value="{{ old('nama_peserta') }}">
                                    @error('nama_peserta')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="text-center"><button type="submit">Send Message</button></div> --}}

{{-- <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script> --}}
{{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            var canvas = document.getElementById('signatureCanvas');
            var signaturePad = new SignaturePad(canvas);

            var clearButton = document.getElementById('clearButton');
            clearButton.addEventListener('click', function (event) {
                event.preventDefault();
                signaturePad.clear();
            });

            var simpanButton = document.getElementById('simpanButton');
            simpanButton.addEventListener('click', function (event) {
                event.preventDefault(); // Prevent default form submission
                var signatureData = signaturePad.toDataURL();
                var signatureDataInput = document.getElementById('signatureData');
                signatureDataInput.value = signatureData;
                document.getElementById('myForm').submit();
            });
        });
    </script> --}}
