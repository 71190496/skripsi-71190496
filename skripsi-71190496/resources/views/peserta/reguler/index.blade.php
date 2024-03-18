@extends('peserta.layouts.coba')
<link href="{{ asset('pesertastyle/assets/img/stc1.png') }}" rel="icon">

{{-- @section('container') --}}
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Reguler</h2>
                <ol>
                    <li><a href="/peserta/beranda">Beranda</a></li>
                    <li>Reguler</li>
                </ol>
            </div>
        </div>
    </section><!-- End Breadcrumbs -->


    <div class="container">
        <div class="row mb-9 mt-5" data-aos="fade-up">
            <div class="col-xl-9 pt-lg-6">
                <div class="col-lg mb-5">
                    @php
                        $sortedData = $data->sortByDesc('id_pelatihan');
                    @endphp
                    @if ($sortedData->isEmpty())
                        @if ($selectedMonth)
                            <div class="d-flex justify-content-center mt-5">
                                <img src="http://satunama.org/wp-content/uploads/2023/06/Logo-STC-Satunama-Training-Center-768x408.png"
                                    alt="" style="width: 150px; height: auto;">
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <strong>Tidak ada pelatihan untuk bulan yang dipilih.</strong>
                            </div>
                        @else
                            <div class="d-flex justify-content-center mt-5">
                                <img src="http://satunama.org/wp-content/uploads/2023/06/Logo-STC-Satunama-Training-Center-768x408.png"
                                    alt="" style="width: 150px; height: auto;">
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <strong>Belum ada pelatihan yang dibuka.</strong>
                            </div>
                        @endif
                    @else
                        @foreach ($sortedData as $item)
                            <div class="card rounded-2 border p-3 lift mb-3 shadow">
                                <div class="row gx-0">
                                    @foreach ($item->gambarPelatihan->groupBy('id_pelatihan') as $gambarPelatihan)
                                        @foreach ($gambarPelatihan as $index => $gambar)
                                            @if ($index === 0)
                                                <a class="col-auto p-3 d-block"
                                                    href="/peserta/reguler/{{ $item->id_pelatihan }}"
                                                    style="max-width: 100px;">
                                                    <div class="d-flex justify-content-center align-items-center h-100">
                                                        <img src="{{ asset('storage/' . $gambar->path) }}"
                                                            alt="" width="100px" height="80">
                                                    </div>
                                                </a>
                                            @endif
                                        @endforeach
                                    @endforeach
                                    <div class="col-12 col-md-9 col-lg-9 col-xl-9 d-md-block">
                                        <div class="card-body p-3">
                                            @if ($item->tanggal_batas_pendaftaran <= now())
                                                <span class="badge badge-danger font-size-sm fw-normal mb-1 rounded-5"
                                                    style="background-color: rgb(222, 77, 110);">
                                                    Tutup
                                                </span>
                                            @else
                                                <span class="badge badge-danger font-size-sm fw-normal mb-1 rounded-5"
                                                    style="background-color: #5bb189">
                                                    Buka
                                                </span>
                                            @endif
                                            <a class="d-block mb-2" href="/peserta/reguler/{{ $item->id_pelatihan }}">
                                                <h5 class="fw-bolder mb-n1">{{ $item['nama_pelatihan'] }}</h5>
                                            </a>
                                            {{-- <span class="text-dark font-size-sm mt-n1">{!! Str::limit($item->deskripsi_pelatihan, '50') !!}</span> --}}
                                            <ul class="nav mx-n2 d-block d-md-flex">
                                                <li class="nav-item px-2 mb-1">
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-1 d-flex text-secondary icon-uxs"><i
                                                                class="bi bi-calendar2-week"></i></div>
                                                        <div class="font-size-sm">
                                                            {{ \Carbon\Carbon::parse($item->tanggal_pendaftaran)->locale('id')->isoFormat('D MMMM') }}
                                                            -
                                                            {{ \Carbon\Carbon::parse($item->tanggal_batas_pendaftaran)->locale('id')->isoFormat('D MMMM Y') }}
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="nav-item px-2 mb-1">
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-1 d-flex text-secondary icon-uxs"><i
                                                                class="bi bi-pass"></i>
                                                        </div>
                                                        <div class="font-size-sm">{{ $item->tema->judul_tema }}
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="nav-item px-2 mb-1">
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-1 d-flex text-secondary icon-uxs"><i
                                                                class="bi bi-geo-alt"></i></div>
                                                        <div class="font-size-sm">
                                                            @if ($item->metode_pelatihan === 'Online')
                                                                Online
                                                            @else
                                                                {{ $item->metode_pelatihan }} -
                                                                {{ $item->lokasi_pelatihan }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="nav-item px-2 mb-1">
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-1 d-flex text-secondary icon-uxs"><i
                                                                class="bi bi-mic"></i>
                                                        </div>
                                                        <div class="font-size-sm">
                                                            @foreach ($item->fasilitator_pelatihan as $fasilitator)
                                                                {{ $fasilitator->nama_fasilitator }},
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-auto pe-xl-2 d-lg-flex place-center">
                                        <div class="col-auto mt-5 px-auto">
                                            <a class="btn btn-outline-success btn-xs btn-pill mb-1"
                                                href="/peserta/reguler/{{ $item->id_pelatihan }}">Lihat Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>


                <div class="d-flex justify-content-left align-items-center my-9">
                    <div class="mb-5 shadow">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
            <div class="col-xl-3 pt-lg-6 px-4 mb-5 mb-xl-0">
                <div>
                    <div class="col-lg-12 mb-5">
                        <div class="card border px-5 pt-6 pb-6 shadow">
                            <div class="d-inline-block rounded-circle mb-4">
                                <div class="icon-circle"
                                    style="background-color: rgb(194, 223, 251); color: rgb(25, 110, 205);">
                                    <i class="fas fa-briefcase fa-2x"></i>
                                </div>
                            </div>
                            <form action="{{ route('reguler.index') }}" method="GET">
                                <div class="mb-3">
                                    <label for="monthFilter" class="form-label">Filter Pelatihan Berdasarkan
                                        Bulan:</label>
                                    <select class="form-select" id="monthFilter" name="monthFilter">
                                        <option value="">Semua Bulan</option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                        {{-- @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}"
                                                {{ old('monthFilter') == $i ? 'selected' : '' }}>
                                                {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                                            </option>
                                        @endfor --}}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-check-label">Filter Pelatihan Berdasarkan Status:</label><br>
                                    <input class="form-check-input" type="checkbox" id="buka" name="buka"
                                        value="buka" {{ old('buka') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="buka">Buka</label><br>
                                    <input class="form-check-input" type="checkbox" id="tutup" name="tutup"
                                        value="tutup" {{ old('tutup') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="tutup">Tutup</label><br>
                                </div>

                                <button type="submit" class="btn btn-outline-success btn-xs btn-pill mb-1">Apply
                                    Filters</button>
                                <a href="{{ route('reguler.index') }}" class="btn btn-secondary">Reset</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<!-- ======= Reguler Section ======= -->
{{-- <section id="reguler" class="reguler">
        <div class="container" data-aos="fade-up">
            <div class="row equal-height-articles">
                @foreach ($data as $item)
                    <div class="col-lg-3 mt-5">
                        <article class="entry">
                            <div class="entry-img" style="height: 200px; overflow: hidden;">
                                @foreach ($item->gambarPelatihan as $gambar)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('storage/' . $gambar->path) }}" alt=""
                                            style="width: auto; height: 100%;">
                                    </div>
                                @endforeach
                            </div>
                            <h5 class="entry-title">
                                <a href="/peserta/reguler/{{ $item->id_pelatihan }}">{{ $item['nama_pelatihan'] }}</a>
                            </h5>
                            <div class="entry-content">
                                <p>{!! Str::limit($item->deskripsi_pelatihan, '50') !!}</p>
                                <div class="read-more">
                                    <a href="/peserta/reguler/{{ $item->id_pelatihan }}">Detail Pelatihan</a>
                                </div>
                            </div>
                        </article> 
                    </div>  
                @endforeach 
            </div> 

            <div class="mb-3"> 
                {{ $data->links() }}
            </div>  
        </div>
    </section>  --}}




{{-- <div class="album py-3 bg-light mb-3">
                    <div class="container">
                        <div class="row row-cols-1 row-csols-sm-2 row-cols-md-3 g-3">
                            @foreach ($data as $item)
                                @if ($item->id_jenis_produk == 3)
                                    <div class="col">
                                        <div class="card shadow-sm">
                                            <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                                                xmlns="http://www.w3.org/2000/svg" role="img"
                                                aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                                                focusable="false"src="/img/jadwal.png" alt="">
                                            <div class="card-body">
                                                <p class="card-text">{{ $item['nama_pelatihan'] }}</p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                        <a href="/peserta/reguler/{{ $item->id }}"
                                                            class="btn btn-success">Detail
                                                            Pelatihan</a>
                                                    </div>
                                                    <small class="text-muted">{{ $item['created_at'] }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div> --}}
{{-- @endsection --}}
