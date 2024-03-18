@extends('peserta.layouts.coba')
<link href="{{ asset('pesertastyle/assets/img/stc1.png') }}" rel="icon">

{{-- @section('container') --}}
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Detail Pelatihan</h2>
                <ol>
                    <li><a href="/peserta/beranda">Beranda</a></li>
                    @foreach ($id_pelatihan as $item)
                        <li><a href="/peserta/reguler">Reguler</a></li>
                    @endforeach
                    <li>Detail Pelatihan</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section id="portfolio-details" class="portfolio-details">
        <div class="container" data-aos="fade-up">
            @foreach ($id_pelatihan as $item)
                <div class="row gy-4">

                    <div class="col-lg-8">

                        <div class="portfolio-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">

                                @foreach ($item->gambarPelatihan as $gambar)
                                    <div class="swiper-slide border">
                                        <img src="{{ asset('storage/' . $gambar->path) }}" alt="">
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3>{{ $item->nama_pelatihan }}</h3>
                            <ul>
                                {{-- <li><strong>Category</strong>: Web design</li> --}}
                                <li><strong>Fasilitator</strong> :
                                    @foreach ($item->fasilitator_pelatihan as $fasilitator)
                                        {{ $fasilitator->nama_fasilitator }},
                                    @endforeach
                                <li><strong>Metode</strong> : {{ $item->metode_pelatihan }}</a></li>
                                <li><strong>Kuota Peserta</strong> : {{ $item->kuota_peserta }} orang</a></li>
                                <li><strong>Tanggal Pelatihan</strong> :
                                    {{ \Carbon\Carbon::parse($item->tanggal_mulai)->locale('id')->isoFormat('D MMMM') }}
                                    </td> - <td>
                                        {{ \Carbon\Carbon::parse($item->tanggal_selesai)->locale('id')->isoFormat('D MMMM Y') }}
                                    </td>
                                </li>
                                <li><strong>Fee Pelatihan</strong>: Rp.
                                    {{ number_format($item->fee_pelatihan, 0, ',', '.') }}</a></li>
                                <li><strong>Lokasi Pelatihan</strong> : {{ $item->lokasi_pelatihan }}</a></li>
                            </ul>
                            @if ($item->tanggal_batas_pendaftaran >= now())
                                <!-- Tanggal batas pendaftaran masih berlaku -->
                                <a class="btn btn-success"
                                    href="{{ route('reguler.create', ['id_pelatihan' => $nilai]) }}">Daftar</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row p-2 mt-3">
                    <div class="portfolio-description">
                        <h2 class="border-bottom">Deskripsi Pelatihan</h2>
                        <p>
                            {!! $item->deskripsi_pelatihan !!}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </section><!-- End Portfolio Details Section -->
</main>
{{-- <section id="course-details" class="course-details">
        <div class="container" data-aos="fade-up">


            <div class="row">
                @foreach as $item)
                    <div class="col-lg-8">
                        <img src="{{ asset('storage/' . $item->image) }}" style="width: 100%; max-height: 450px; alt="">
                        <h3>{{ $item->nama_pelatihan }}</h3>
                        <p>
                            {!! $item->deskripsi_pelatihan !!}
                        </p>
                    </div>

                    <div class="col-lg-4">

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Fasilitator</h5>
                            <p>{{ $item->fasilitator_pelatihan->nama_fasilitator ?? 'Tidak ada Fasilitator' }}
                        </div>

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Fee Pelatihan</h5>
                            <p>Rp. {{ $item->fee_pelatihan }}</p>
                        </div>

                        

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Jadwal Pelatihan</h5>
                            <p>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') }}</td> - <td>
                                    {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d M Y') }}</td>
                            </p>
                        </div>

                        @guest
                            <a class="btn btn-success" href="/peserta/daftarpelatihan/">Kembali</a>
                            <a class="btn btn-success" href="/login">Daftar Pelatihan</a>
                        @endguest
                @endforeach
            </div>


        </div>
    </section> --}}

<!-- ======= Cource Details Tabs Section ======= -->








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
