@extends('peserta.layouts.main')

{{-- @section('container') --}}
<main id="main" data-aos="fade-in">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
            <h2>Artikel</h2>
            <p>Daftar artikel terkait pelatihan SATUANAMA</p>
        </div>
    </div><!-- End Breadcrumbs -->

    <section id="courses" class="courses">
        <div class="container" data-aos="fade-up">
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                @foreach ($data as $item)
                    
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0 mb-3">
                            <div class="course-item">
                                <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid" alt="...">
                                <div class="course-content">
                                    {{-- <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4>Web Development</h4>
                                        <p class="price">$169</p>
                                    </div> --}}
                                    <h3><a href="/peserta/postingan/{{ $item->id }}">{{ $item['judul_postingan'] }}</a>
                                    </h3>
                                    <p>{!! Str::limit($item->isi_postingan, '50') !!}</p>
                                    <div class="trainer d-flex justify-content-between align-items-center">
                                        <div class="trainer-profile d-flex align-items-center">
                                            <a href="/peserta/postingan/{{ $item->id }}">Selengkapnya..</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Course Item-->
</main>