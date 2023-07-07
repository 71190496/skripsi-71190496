@extends('peserta.layouts.main')

{{-- @section('container') --}}
<main id="main" data-aos="fade-in">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
            <h2>Pelatihan Reguler</h2>
            <p>Daftar pelatihan reguler</p>
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
        <div class="container" data-aos="fade-up">
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                @foreach ($data as $item)
                    @if ($item->id_jenis_produk == 3)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0 mb-3">
                            <div class="course-item">
                                <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid" alt="...">
                                <div class="course-content">
                                    {{-- <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4>Web Development</h4>
                                        <p class="price">$169</p>
                                    </div> --}}
                                    <h3><a href="/peserta/reguler/{{ $item->id }}">{{ $item['nama_pelatihan'] }}</a>
                                    </h3>
                                    <p>{!! $item->deskripsi_pelatihan !!}</p>
                                    <div class="trainer d-flex justify-content-between align-items-center">
                                        <div class="trainer-profile d-flex align-items-center">
                                            <a href="/peserta/reguler/{{ $item->id }}">See More..</a>
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
