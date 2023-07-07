@extends('peserta.layouts.main')
<main id="main" data-aos="fade-in">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
            <h2>Artikel</h2>
            @foreach ($data as $item)
                <div
                    class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center">
                    <p class="h2">{{ $item->judul_postingan }}<p>
                </div>
            @endforeach
        </div>
    </div><!-- End Breadcrumbs -->



    <section id="courses" class="courses">
        <div class="container" data-aos="fade-up">
            <div>
                <a class="btn btn-success mb-2" href="/peserta/postingan"> Kembali</a>
            </div>
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                @foreach ($data as $item) 
                    <article class="mb-2">
                        <div class="mb-2">
                            <img style="align-items: center" src="{{ asset('storage/' . $item->image) }}" class="img-fluid" alt="...">
                        </div>
                        <div class="mb-2">
                            <small class="mb-2">{{ \Carbon\Carbon::parse($item->tanggal_postingan)->format('d M Y') }}</small>
                        </div>
                        <div style="text-align: justify">
                            {!! $item->isi_postingan !!}
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
</main>
