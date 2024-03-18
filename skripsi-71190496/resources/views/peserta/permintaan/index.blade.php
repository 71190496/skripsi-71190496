@extends('peserta.layouts.coba')
<link href="{{ asset('pesertastyle/assets/img/stc1.png') }}" rel="icon">

{{-- @section('container') --}}
<main id="main" data-aos="fade-in">
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

    <section id="courses" class="courses">
        <div class="container" data-aos="fade-up">
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                @foreach ($data as $item)
                    @if ($item->id_jenis_produk == 1)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0 mb-3">
                            <div class="course-item">
                                <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid" alt="...">
                                <div class="course-content">
                                    {{-- <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4>Web Development</h4>
                                        <p class="price">$169</p>
                                    </div> --}}
                                    <h3><a href="/peserta/permintaan/{{ $item->id_pelatihan }}">{{ $item['nama_pelatihan'] }}</a>
                                    </h3>
                                    <p>{!! Str::limit($item->deskripsi_pelatihan, '50') !!}</p>
                                    <div class="trainer d-flex justify-content-between align-items-center">
                                        <div class="trainer-profile d-flex align-items-center">
                                            <a href="/peserta/permintaan/{{ $item->id_pelatihan }}">See More..</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Course Item-->
</main>