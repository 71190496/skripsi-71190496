@extends('peserta.layouts.coba')
<link href="{{ asset('pesertastyle/assets/img/stc1.png') }}" rel="icon">

<main id="main">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Permintaan</h2>
                <ol>
                    <li><a href="/peserta/beranda">Beranda</a></li>
                    <li>Permintaan</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    @if (Session::has('success'))
        <div class="container mt-3" data-aos="fade-up">
            <div class="pt-3">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
                </div>
            </div>
        </div>
    @endif
    {{-- <div class="container">
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
    </div> --}}

    {{-- <div class="container mt-4">
        <form id="dynamicForm" method="post" action="{{ route('peserta.permintaan.store') }}">
            @csrf 
            <div class="row row-cols">
                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                        <span class="h6">Check List Training & Konsultasi</span>
                    </div>
                    <div class="row mb-3">
                        <label class="mb-2" for="nama_mitra">Nama Mitra</label>
                        <div class="col">
                            <input type="text" class="form-control" id="nama_mitra" name="nama_mitra"
                                placeholder="Masukan nama mitra" aria-label="Masukan nama Anda">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="mb-2" for="judul_pelatihan">Judul Pelatihan</label>
                        <div class="col">
                            <input type="text" class="form-control" id="judul_pelatihan" name="judul_pelatihan"
                                placeholder="Masukan judul pelatihan" aria-label="Masukan judul pelatihan">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="mb-2" for="waktu_pelaksanaan">Waktu Pelaksanaan</label>
                        <div class="col">
                            <input type="date" class="form-control" id="waktu_pelaksanaan" name="waktu_pelaksanaan">
                        </div>
                    </div>
                    <div>
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                            <span class="h6">Assessment Dasar</span>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Masalah yang sedang dihadapi oleh lembaga</th>
                                    <th>Kebutuhan Lembaga</th>
                                    <th>Materi & topik yang diharapkan dari pelatihan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody1">
                                <tr>
                                    <td><input type="text" name="masalah[]" class="form-control" required></td>
                                    <td><input type="text" name="kebutuhan[]" class="form-control" required></td>
                                    <td><input type="text" name="materi[]" class="form-control" required></td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm addRow1"><i
                                                data-feather="plus"></i></button> 
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                            <span class="h6">Assessment Peserta</span>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Peserta</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Jabatan di Lembaga</th>
                                    <th>Tanggung Jawab Utama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody2">
                                <tr>
                                    <td><input type="text" name="nama_peserta[]" class="form-control" required>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control" name="jenis_kelamin[]"
                                                id="exampleFormControlSelect2">
                                                <option value="">Pilih</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                                <option value="Transgender">Transgender</option>
                                                <option value="Tidak ingin menyebutkan">Tidak ingin menyebutkan
                                                </option>
                                            </select>
                                        </div>
                                    </td>
                                    <td><input type="text" name="jabatan[]" class="form-control" required></td>
                                    <td><input type="text" name="tanggung_jawab[]" class="form-control" required>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm addRow2"><i
                                                data-feather="plus"></i></button> 
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row mb-3">
                        <label class="mb-2" for="request_khusus">Request Khusus</label>
                        <div class="col">
                            <textarea class="form-control" id="request_khusus" name="request_khusus" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-3">Submit</button>
        </form>
    </div> --}}

    <section id="contact" class="contact">
        <div class="row mt-1 justify-content-center" data-aos="fade-up">
            <div class="col-lg-10">
                <div class="form-studi">
                    {{-- <form id="dynamicForm" method="post" action="{{ route('peserta.permintaan.store') }}"> --}}

                    <form id="dynamicForm" method="post" action="{{ route('peserta.permintaan.store') }}"
                        role="form">
                        @csrf
                        <input type="hidden" id="id_user" name="id_user" value="{{ Auth::id() }}">
                        <h4 class="mb-5">Check List Training & Konsultasi</h4>

                        <div class="form-group mt-3">
                            {{-- <label for="nama_mitra">Nama Mitra</label> --}}
                            <h6>Nama Mitra</h6>
                            <select class="form-select @error('id_tema') is-invalid @enderror" name="id_mitra"
                                id="id_mitra">
                                <option value="">Pilih Mitra</option>
                                @foreach ($mitra as $item)
                                    <option value="{{ $item->id_mitra }}"
                                        {{ old('id_mitra') == $item->id_mitra ? 'seltected' : '' }}>
                                        {{ $item->nama_mitra }}</option>
                                @endforeach
                            </select>
                            {{-- <input type="text" class="form-control @error('nama_mitra') is-invalid @enderror"
                                id="nama_mitra" name="nama_mitra" placeholder="Nama Mitra"
                                value="{{ old('nama_mitra') }}" autofocus> --}}
                            {{-- @error('nama_mitra')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror --}}
                        </div>

                        <div class="form-group mt-3">
                            {{-- <label for="judul_pelatihan">Judul Pelatihan</label> --}}
                            <h6>Judul Pelatihan</h6>
                            <input type="text" class="form-control @error('judul_pelatihan') is-invalid @enderror"
                                id="judul_pelatihan" name="judul_pelatihan" placeholder="Judul Pelatihan"
                                value="{{ old('judul_pelatihan') }}">
                            @error('judul_pelatihan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group mt-3">
                                    <label for="jenis_pelatihan">Jenis Pelatihan</label>
                                    <select class="form-select @error('jenis_pelatihan') is-invalid @enderror"
                                        name="jenis_pelatihan" id="jenis_pelatihan">
                                        <option value="">Pilih Jenis Permintaan Pelatihan</option>
                                        <option value="Reguler"
                                            {{ old('jenis_pelatihan') == 'Reguler' ? 'selected' : '' }}>
                                            Reguler</option>
                                        <option value="Permintaan"
                                            {{ old('jenis_pelatihan') == 'Permintaan' ? 'selected' : '' }}>
                                            Permintaan</option>
                                        <option value="Konsultasi"
                                            {{ old('jenis_pelatihan') == 'Konsultasi' ? 'selected' : '' }}>Konsultasi
                                        </option>
                                    </select>
                                    @error('jenis_pelatihan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group mt-3">
                                    <label for="id_tema">Tema Pelatihan</label>
                                    <select class="form-select @error('id_tema') is-invalid @enderror" name="id_tema"
                                        id="id_tema">
                                        <option value="">Pilih Tema Pelatihan</option>
                                        @foreach ($tema as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('id_tema') == $item->id ? 'selected' : '' }}>
                                                {{ $item->judul_tema }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_tema')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <h6>Jadwal Pelaksanaan Pelatihan</h6>
                            <div class="col">
                                <div class="form-group">
                                    <p>Tanggal & Waktu Mulai</p>
                                    <input type="datetime-local"
                                        class="form-control @error('tanggal_waktu_mulai') is-invalid @enderror"
                                        id="tanggal_waktu_mulai" name="tanggal_waktu_mulai"
                                        value="{{ old('tanggal_waktu_mulai') }}">
                                    @error('tanggal_waktu_mulai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <p>Tanggal & Waktu Selesai</p>
                                    <input type="datetime-local"
                                        class="form-control @error('tanggal_waktu_selesai') is-invalid @enderror"
                                        id="tanggal_waktu_selesai" name="tanggal_waktu_selesai"
                                        value="{{ old('tanggal_waktu_selesai') }}">
                                    @error('tanggal_waktu_selesai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <!-- Asessment Dasar -->
                        <div class="form-group mt-3 mb-3">
                            <h6>Asessment Dasar</h6>
                            <p>Masalah yang sedang dihadapi oleh lembaga</p>
                            <textarea class="form-control @error('masalah') is-invalid @enderror" name="masalah" rows="5">{{ old('masalah') }}</textarea>
                            @error('masalah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Kebutuhan lembaga -->
                        <div class="form-group mt-3 mb-3">
                            <p>Kebutuhan lembaga</p>
                            <textarea class="form-control @error('kebutuhan') is-invalid @enderror" name="kebutuhan" rows="5">{{ old('kebutuhan') }}</textarea>
                            @error('kebutuhan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Materi & topik yang diharapkan dari pelatihan -->
                        <div class="form-group mt-3 mb-3">
                            <p>Materi & topik yang diharapkan dari pelatihan</p>
                            <textarea class="form-control @error('materi') is-invalid @enderror" name="materi" rows="5">{{ old('materi') }}</textarea>
                            @error('materi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Asessment Peserta -->
                        <div>
                            <h6>Asessment Peserta</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Peserta</th>
                                        <th>Email Peserta</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Jabatan di Lembaga</th>
                                        <th>Tanggung Jawab Utama</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody2">
                                    <tr>
                                        <td><input type="text" name="nama_peserta[]"
                                                class="form-control @error('nama_peserta.*') is-invalid @enderror"
                                                value="{{ old('nama_peserta.0') }}"></td>
                                        <td><input type="email" name="email_peserta[]"
                                                class="form-control @error('email_peserta.*') is-invalid @enderror"
                                                value="{{ old('email_peserta.0') }}"></td>
                                        <td>
                                            <div class="form-group">
                                                <select
                                                    class="form-control @error('jenis_kelamin.*') is-invalid @enderror"
                                                    name="jenis_kelamin[]" id="exampleFormControlSelect2">
                                                    <option value="">Pilih</option>
                                                    <option value="Laki-laki"
                                                        {{ old('jenis_kelamin.0') == 'Laki-laki' ? 'selected' : '' }}>
                                                        Laki-laki</option>
                                                    <option value="Perempuan"
                                                        {{ old('jenis_kelamin.0') == 'Perempuan' ? 'selected' : '' }}>
                                                        Perempuan</option>
                                                    <option value="Transgender"
                                                        {{ old('jenis_kelamin.0') == 'Transgender' ? 'selected' : '' }}>
                                                        Transgender</option>
                                                    <option value="Tidak ingin menyebutkan"
                                                        {{ old('jenis_kelamin.0') == 'Tidak ingin menyebutkan' ? 'selected' : '' }}>
                                                        Tidak ingin menyebutkan</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td><input type="text" name="jabatan[]"
                                                class="form-control @error('jabatan.*') is-invalid @enderror"
                                                value="{{ old('jabatan.0') }}"></td>
                                        <td><input type="text" name="tanggung_jawab[]"
                                                class="form-control @error('tanggung_jawab.*') is-invalid @enderror"
                                                value="{{ old('tanggung_jawab.0') }}"></td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm addRow2">+ Tambah
                                                Peserta</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            @error('nama_peserta.*')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Request Khusus -->
                        <div class="form-group mt-3">
                            <h6>Request Khusus</h6>
                            <textarea class="form-control @error('request_khusus') is-invalid @enderror" name="request_khusus" rows="5"
                                placeholder="Request Khusus">{{ old('request_khusus') }}</textarea>
                            @error('request_khusus')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div>
            </div>

        </div>
    </section>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        // Add row for Assessment Dasar
        $(".addRow1").click(function() {
            console.log('Tombol tambah Assessment Dasar diklik!');
            $("#tableBody1").append(
                '<tr><td><input type="text" name="masalah[]" class="form-control" ></td><td><input type="text" name="kebutuhan[]" class="form-control" ></td><td><input type="text" name="materi[]" class="form-control" ></td><td><button type="button" class="btn btn-danger btn-sm removeRow">Hapus</button></td></tr>'
            );
        });

        // Add row for Assessment Peserta
        $(".addRow2").click(function() {
            $("#tableBody2").append(
                '<tr><td><input type="text" name="nama_peserta[]" class="form-control" ></td> <td><input type="text" name="email_peserta[]" class="form-control" > </td> <td><div class="form-group"><select class="form-control" name="jenis_kelamin[]"id="exampleFormControlSelect2"><option value="">Pilih</option><option value="Laki-laki">Laki-laki</option><option value="Perempuan">Perempuan</option><option value="Transgender">Transgender</option><option value="Tidak ingin menyebutkan">Tidak ingin menyebutkan</option></select></div></td><td><input type="text" name="jabatan[]" class="form-control" ></td><td><input type="text" name="tanggung_jawab[]" class="form-control" ></td><td><button type="button" class="btn btn-danger btn-sm removeRow">Hapus</button></td></tr>'
            );
        });

        // Remove row on button click
        $(document).on("click", ".removeRow", function() {
            $(this).closest("tr").remove();
        });

        $('.form-control').on('input', function() {
            $(this).removeClass('is-invalid'); // Menghapus kelas 'is-invalid'
            $(this).siblings('.invalid-feedback').remove(); // Menghapus pesan kesalahan
        });
    });
</script>

{{-- <div>
                            <h6>Asessment Dasar</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Masalah yang sedang dihadapi oleh lembaga</th>
                                        <th>Kebutuhan Lembaga</th>
                                        <th>Materi & topik yang diharapkan dari pelatihan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody1">
                                    <tr>
                                        <td><input type="text" name="masalah[]" class="form-control" ></td>
                                        <td><input type="text" name="kebutuhan[]" class="form-control" required></td>
                                        <td><input type="text" name="materi[]" class="form-control" required></td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm addRow1"><i
                                                    data-feather="plus"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> --}}
