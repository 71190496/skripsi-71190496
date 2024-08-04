@extends('peserta.layouts.coba')
<link href="{{ asset('pesertastyle/assets/img/stc1.png') }}" rel="icon">

<main id="main" data-aos="fade-in">
    <div class="breadcrumbs">
        <div class="container">
            <h2>Pelatihan Saya</h2>
        </div>
    </div><!-- End Breadcrumbs -->

    <section id="team" class="team section-bg">
        <div class="container">

            <div class="section-title aos-init aos-animate" data-aos="fade-up">
                @auth
                    <h2>Selamat
                        Datang, {{ auth()->user()->name }}</h2>
                    <p>Semoga aktivitas pelatihanmu menyenangkan bersama SATUNAMA.</p>
                @endauth
            </div> 
    </section>

    {{-- <div class="col"> --}}
    <section id="contact" class="contact">
        <div class="container">
            <div class="container">
                {{-- <div class="col-md-3">
                    @include('peserta.layouts.sidebar')
                </div> --}}
                {{-- <div class="col-md-9"> --}}
                {{-- <div class="card rounded-2 border p-3 lift mb-3 shadow" data-aos="fade-up">
                    <div class="d-flex py-4">
                        @auth
                            <div class="w-80p h-80p rounded-circle overflow-hidden">
                                <div class="avatar d-inline"><img
                                        src="https://www.shutterstock.com/image-vector/profile-blank-icon-empty-photo-600nw-535853269.jpg"
                                        alt="Foto user" class="avatar-img rounded-circle user"
                                        style="width: 80px; height: 80px;"></div>
                            </div>
                            <div class="flex-grow-1 mt-1 ms-4">
                                <div class="mb-0"><span class="text-muted font-size-14" data-asw-orgfontsize="14"
                                        style="font-size: 14px;">Selamat
                                        Datang,</span></div><span class="d-block mb-2" data-asw-orgfontsize="12"
                                    style="font-size: 12px;">
                                    <h4 class="fw-bolder mb-3" data-asw-orgfontsize="18" style="font-size: 18px;">
                                        {{ auth()->user()->name }}</h4>
                                </span>
                                <hr>
                            </div>
                        @endauth
                    </div>
                </div> --}}


                <div class="card rounded-2 border p-3 lift mb-3 shadow" data-aos="fade-up">
                    <h5>Pelatihan Reguler</h5>
                    <hr>
                    @foreach ($pelatihans as $item)
                        <div class="row gx-0">
                            <div class="col-md-12">
                                <div class="card rounded-2 border p-3 lift mb-3">
                                    <div class="row gx-0">
                                        @if ($item->pelatihan)
                                            <a class="col-auto p-3 d-block"
                                                href="{{ route('peserta.pelatihan.show', ['id' => $item->pelatihan->id_pelatihan]) }}"
                                                style="max-width: 100px;">
                                                <div class="d-flex justify-content-center align-items-center h-100">
                                                    <img src="/img/stc1.png" class="img-fluid" width="100px" height="80">
                                                </div>
                                            </a>
                                            <div class="col-12 col-md-9 col-lg-9 col-xl-9 d-md-block">
                                                <div class="card-body p-3">
                                                    <a class="d-block mb-2"
                                                        href="{{ route('peserta.pelatihan.show', ['id' => $item->pelatihan->id_pelatihan]) }}">
                                                        <h5 class="fw-bolder mb-n1">
                                                            @if ($item->pelatihan)
                                                                {{ $item->pelatihan->nama_pelatihan }}
                                                            @else
                                                                Pelatihan tidak ditemukan
                                                            @endif
                                                        </h5>
                                                    </a>

                                                    <ul class="nav mx-n2 d-block d-md-flex">
                                                        <li class="nav-item px-2 mb-1">
                                                            <div class="d-flex align-items-center">
                                                                <div class="me-1 d-flex text-secondary icon-uxs"><i
                                                                        class="bi bi-calendar2-week"></i></div>
                                                                <div class="font-size-sm">
                                                                    @if ($item->pelatihan && $item->pelatihan->tanggal_mulai)
                                                                        {{ \Carbon\Carbon::parse($item->pelatihan->tanggal_mulai)->locale('id')->isoFormat('D MMMM') }}
                                                                        -
                                                                        {{ \Carbon\Carbon::parse($item->pelatihan->tanggal_selesai)->locale('id')->isoFormat('D MMMM Y') }}
                                                                    @else
                                                                        Tanggal tidak tersedia
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-auto pe-xl-2 d-lg-flex place-center">
                                                <div class="col-auto mt-5 px-auto">
                                                    <a class="btn btn-outline-success btn-xs btn-pill mb-1"
                                                        href="{{ route('peserta.pelatihan.show', ['id' => $item->pelatihan->id_pelatihan]) }}">Lihat
                                                        Detail
                                                    </a>
                                                </div>
                                            </div>
                                        @else
                                            <span>Pelatihan tidak ditemukan</span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="card rounded-2 border p-3 lift mb-3 shadow" data-aos="fade-up">
                    <h5>Pelatihan Permintaan</h5>
                    <hr>
                    @foreach ($permintaans as $item)
                        @if (isset($item->permintaan))
                            @php
                                $id_permintaan = $item->permintaan->id;
                            @endphp
                            <div class="row gx-0">
                                <div class="col-md-12">
                                    <div class="card rounded-2 border p-3 lift mb-3">
                                        <div class="row gx-0">
                                            <a class="col-auto p-3 d-block"
                                                href="{{ route('peserta.pelatihan.show', ['id' => $item->id]) }}"
                                                style="max-width: 100px;">
                                                <div class="d-flex justify-content-center align-items-center h-100">
                                                    <img src="/img/stc1.png" class="img-fluid" width="100px" height="80">
                                                </div>
                                            </a>
                                            <div class="col-12 col-md-9 col-lg-9 col-xl-9 d-md-block">
                                                <div class="card-body p-3">
                                                    <a class="d-block mb-2"
                                                        href="{{ route('peserta.pelatihan.show', ['id' => $item->permintaan->id]) }}">
                                                        <h5 class="fw-bolder mb-n1">
                                                            {{ $item->permintaan->nama_pelatihan }}
                                                        </h5>
                                                    </a>

                                                    <ul class="nav mx-n2 d-block d-md-flex">
                                                        <li class="nav-item px-2 mb-1">
                                                            <div class="d-flex align-items-center">
                                                                <div class="me-1 d-flex text-secondary icon-uxs"><i
                                                                        class="bi bi-calendar2-week"></i></div>
                                                                <div class="font-size-sm">
                                                                    {{ \Carbon\Carbon::parse($item->permintaan->tanggal_mulai)->locale('id')->isoFormat('D MMMM') }}
                                                                    -
                                                                    {{ \Carbon\Carbon::parse($item->permintaan->tanggal_selesai)->locale('id')->isoFormat('D MMMM Y') }}
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-auto pe-xl-2 d-lg-flex place-center">
                                                <div class="col-auto mt-5 px-auto">
                                                    <a class="btn btn-outline-success btn-xs btn-pill mb-1"
                                                        href="{{ route('peserta.pelatihan.show', ['id' => $item->permintaan->id]) }}">Lihat
                                                        Detail
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="card rounded-2 border p-3 lift mb-3 shadow" data-aos="fade-up">
                    <h5>Pelatihan Konsultasi</h5>
                    <hr>
                    @foreach ($konsultasis as $item)
                        @if (isset($item->pelatihan_konsultasi))
                            @php
                                $id_konsultasi = $item->pelatihan_konsultasi->id_konsultasi;
                            @endphp
                            <div class="row gx-0">
                                <div class="col-md-12">
                                    <div class="card rounded-2 border p-3 lift mb-3">
                                        <div class="row gx-0">
                                            <a class="col-auto p-3 d-block"
                                                href="{{ route('peserta.pelatihan.show', ['id' => $item->id]) }}"
                                                style="max-width: 100px;">
                                                <div class="d-flex justify-content-center align-items-center h-100">
                                                    <img src="/img/stc1.png" class="img-fluid" width="100px" height="80">
                                                </div>
                                            </a>
                                            <div class="col-12 col-md-9 col-lg-9 col-xl-9 d-md-block">
                                                <div class="card-body p-3">
                                                    <a class="d-block mb-2"
                                                        href="{{ route('peserta.pelatihan.show', ['id' => $item->pelatihan_konsultasi->id]) }}">
                                                        <h5 class="fw-bolder mb-n1">
                                                            {{ $item->pelatihan_konsultasi->nama_pelatihan }}
                                                        </h5>
                                                    </a>

                                                    <ul class="nav mx-n2 d-block d-md-flex">
                                                        <li class="nav-item px-2 mb-1">
                                                            <div class="d-flex align-items-center">
                                                                <div class="me-1 d-flex text-secondary icon-uxs"><i
                                                                        class="bi bi-calendar2-week"></i></div>
                                                                <div class="font-size-sm">
                                                                    {{ \Carbon\Carbon::parse($item->pelatihan_konsultasi->tanggal_mulai)->locale('id')->isoFormat('D MMMM') }}
                                                                    -
                                                                    {{ \Carbon\Carbon::parse($item->pelatihan_konsultasi->tanggal_selesai)->locale('id')->isoFormat('D MMMM Y') }}
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-auto pe-xl-2 d-lg-flex place-center">
                                                <div class="col-auto mt-5 px-auto">
                                                    <a class="btn btn-outline-success btn-xs btn-pill mb-1"
                                                        href="{{ route('peserta.pelatihan.show', ['id' => $item->konsultasi->id]) }}">Lihat
                                                        Detail
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

            </div>

        </div>







    </section>
    </div>

    </div>
</main>


{{-- <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> --}}
{{-- 
    <section class="container" data-aos="fade-up">
        <div class="card-body">
            <div class="table-responsive-md">
                <label for="">Tabel Pelatihan Reguler</label>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="col-md-3" scope="col">Nama Pelatihan</th>
                            <th class="col-md-1" scope="col">Tanggal Mulai</th>
                            <th class="col-md-1" scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelatihans as $item)
                            <tr>
                                <td>
                                    @if ($item->pelatihan)
                                        {{ $item->pelatihan->nama_pelatihan }}
                                    @else
                                        Pelatihan tidak ditemukan
                                    @endif
                                </td>
                                <td>
                                    @if ($item->pelatihan && $item->pelatihan->tanggal_mulai)
                                        {{ \Carbon\Carbon::parse($item->pelatihan->tanggal_mulai)->format('d M Y') }}
                                    @else
                                        Tanggal tidak tersedia
                                    @endif
                                </td>
                                <td>
                                    @if ($item->pelatihan)
                                        <a href="{{ route('peserta.pelatihan.show', ['id' => $item->pelatihan->id_pelatihan]) }}"
                                            class="btn btn-success">Lihat</a>
                                    @else
                                        <span>Pelatihan tidak ditemukan</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="table-responsive-md">
                <label for="">Tabel konsultasi</label>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="col-md-3" scope="col">Nama Pelatihan</th>
                            <th class="col-md-1" scope="col">Tanggal Mulai</th>
                            <th class="col-md-1" scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permintaan as $item)
                            <tr>
                                <td>
                                    @if ($item->permintaan)
                                        {{ $item->permintaan->judul_pelatihan }}
                                    @else
                                        Pelatihan tidak ditemukan
                                    @endif
                                </td>
                                <td>
                                    @if ($item->permintaan && $item->permintaan->waktu_pelaksanaan)
                                        {{ \Carbon\Carbon::parse($item->permintaan->waktu_pelaksanaan)->format('d M Y') }}
                                    @else
                                        Tanggal tidak tersedia
                                    @endif
                                </td>
                                 
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section> --}}
