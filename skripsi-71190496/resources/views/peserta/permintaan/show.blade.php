@extends('peserta.layouts.main')

{{-- @section('container') --}}
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Kontak</h2>
                <ol>
                    <li><a href="/peserta/beranda">Beranda</a></li>
                    <li>Kontak</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section id="course-details" class="course-details">
        <div class="container" data-aos="fade-up">

            <div class="row">
                @foreach ($data as $item)
                    <div class="col-lg-8">
                        <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid" alt="">
                        <h3>{{ $item->nama_pelatihan }}</h3>
                        <p>
                            {!! $item->deskripsi_pelatihan !!}
                        </p>
                    </div>

                    <div class="col-lg-4">

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Trainer</h5>
                            <p><a href="#">Walter White</a></p>
                        </div>

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Course Fee</h5>
                            <p>$165</p>
                        </div>

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Available Seats</h5>
                            <p>30</p>
                        </div>

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Schedule</h5>
                            <p>{{ $item->tanggal_mulai }} - {{ $item->tanggal_selesai }}</p>
                        </div>
                        @guest
                            <a class="btn btn-success" href="/peserta/permintaan/">Kembali</a>
                            <a class="btn btn-success" href="/login">Daftar Pelatihan</a>
                        @endguest
                    </div>
                @endforeach

            </div>
    </section>

    @auth
        <!-- ======= Cource Details Tabs Section ======= -->
        <section id="cource-details-tabs" class="cource-details-tabs">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-3">
                        <ul class="nav nav-tabs flex-column">
                            <li class="nav-item">
                                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Modi sit est</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Unde praesentium sed</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Pariatur explicabo vel</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Nostrum qui quasi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Iusto ut expedita aut</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9 mt-4 mt-lg-0">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tab-1">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Architecto ut aperiam autem id</h3>
                                        <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila
                                            parde sonata raqer a videna mareta paulona marka</p>
                                        <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum
                                            eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat
                                            minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui
                                            similique accusamus nostrum rem vero</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/course-details-tab-1.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-2">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Et blanditiis nemo veritatis excepturi</h3>
                                        <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila
                                            parde sonata raqer a videna mareta paulona marka</p>
                                        <p>Ea ipsum voluptatem consequatur quis est. Illum error ullam omnis quia et
                                            reiciendis sunt sunt est. Non aliquid repellendus itaque accusamus eius et velit
                                            ipsa voluptates. Optio nesciunt eaque beatae accusamus lerode pakto madirna
                                            desera vafle de nideran pal</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/course-details-tab-2.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-3">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Impedit facilis occaecati odio neque aperiam sit</h3>
                                        <p class="fst-italic">Eos voluptatibus quo. Odio similique illum id quidem non enim
                                            fuga. Qui natus non sunt dicta dolor et. In asperiores velit quaerat perferendis
                                            aut</p>
                                        <p>Iure officiis odit rerum. Harum sequi eum illum corrupti culpa veritatis
                                            quisquam. Neque necessitatibus illo rerum eum ut. Commodi ipsam minima molestiae
                                            sed laboriosam a iste odio. Earum odit nesciunt fugiat sit ullam. Soluta et
                                            harum voluptatem optio quae</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/course-details-tab-3.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-4">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Fuga dolores inventore laboriosam ut est accusamus laboriosam dolore</h3>
                                        <p class="fst-italic">Totam aperiam accusamus. Repellat consequuntur iure voluptas
                                            iure porro quis delectus</p>
                                        <p>Eaque consequuntur consequuntur libero expedita in voluptas. Nostrum ipsam
                                            necessitatibus aliquam fugiat debitis quis velit. Eum ex maxime error in
                                            consequatur corporis atque. Eligendi asperiores sed qui veritatis aperiam quia a
                                            laborum inventore</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/course-details-tab-4.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-5">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Est eveniet ipsam sindera pad rone matrelat sando reda</h3>
                                        <p class="fst-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.
                                        </p>
                                        <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae
                                            ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet.
                                            Occaecati sed est sint aut vitae molestiae voluptate vel</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/course-details-tab-5.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <div class="container mt-4">
            <form id="dynamicForm" method="post" action="{{ route('peserta.permintaan.store') }}">
                @csrf
                <input type="hidden" id="id_pelatihan" name="id_pelatihan" value="{{ $nilai }}">
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
                                <input type="date" class="form-control" id="waktu_pelaksanaan"
                                    name="waktu_pelaksanaan">
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
                                            {{-- <button type="button" class="btn btn-danger btn-sm removeRow"><i
                                                    data-feather="trash-2"></i></button> --}}
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
                                            {{-- <button type="button" class="btn btn-danger btn-sm removeRow"><i
                                                    data-feather="trash-2"></i></button> --}}
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
        </div>
    @endauth

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Add row for Assessment Dasar
            $(".addRow1").click(function() {
                console.log('Tombol tambah Assessment Dasar diklik!');
                $("#tableBody1").append(
                    '<tr><td><input type="text" name="masalah[]" class="form-control" required></td><td><input type="text" name="kebutuhan[]" class="form-control" required></td><td><input type="text" name="materi[]" class="form-control" required></td><td><button type="button" class="btn btn-danger btn-sm removeRow">Hapus</button></td></tr>'
                );
            });

            // Add row for Assessment Peserta
            $(".addRow2").click(function() {
                $("#tableBody2").append(
                    '<tr><td><input type="text" name="nama_peserta[]" class="form-control" required></td><td><select class="form-control" name="jenis_kelamin[]"><option value="">Pilih</option><option value="Laki-laki">Laki-laki</option><option value="Perempuan">Perempuan</option><option value="Transgender">Transgender</option><option value="Tidak ingin menyebutkan">Tidak ingin menyebutkan</option></select></td><td><input type="text" name="jabatan[]" class="form-control" required></td><td><input type="text" name="tanggung_jawab[]" class="form-control" required></td><td><button type="button" class="btn btn-danger btn-sm removeRow">Hapus</button></td></tr>'
                );
            });

            // Remove row on button click
            $(document).on("click", ".removeRow", function() {
                $(this).closest("tr").remove();
            });
        });
    </script>

</main>


{{-- @foreach ($data as $item)
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2">{{ $item->nama_pelatihan }}</h1>
                        </div>


                        <article class="justify-content-center mb-2">
                            {!! $item->deskripsi_pelatihan !!}
                        </article>
                        <p>Tanggal Mulai : {{ $item->tanggal_mulai }}</p>
                        <p>Tanggal Selesai : {{ $item->tanggal_selesai }}</p>
                    @endforeach

                    <a class="btn btn-primary mb-2" href="/peserta/reguler">Kembali</a>
                    <a class="btn btn-primary mb-2" href="/peserta/reguler/create">Daftar</a> --}}

{{-- @endsection --}}
