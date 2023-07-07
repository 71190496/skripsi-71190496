@extends('peserta.layouts.main')

{{-- @section('container') --}}
<main id="main" data-aos="fade-in">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
            <h2>Pelatihan Permintaan</h2>
            <p>Daftar pelatihan permintaan</p>
        </div>
    </div><!-- End Breadcrumbs -->

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
                                    <h3><a href="/peserta/permintaan/{{ $item->id }}">{{ $item['nama_pelatihan'] }}</a>
                                    </h3>
                                    <p>{!! Str::limit($item->deskripsi_pelatihan, '50') !!}</p>
                                    <div class="trainer d-flex justify-content-between align-items-center">
                                        <div class="trainer-profile d-flex align-items-center">
                                            <a href="/peserta/permintaan/{{ $item->id }}">See More..</a>
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