@extends('peserta.layouts.coba')

{{-- @section('container') --}}
{{-- <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>Learning Today,<br>Leading Tomorrow</h1>
      <h2>We are team of talented designers making websites with Bootstrap</h2>
      <a href="courses.html" class="btn-get-started">Get Started</a>
    </div>
  </section><!-- End Hero --> --}}
{{-- <main id="main">
    <div id="carouselcontrol"
        class="carousel slide d-flex justify-content-center mb-0"style="width: 100%; height: 80vh; position: relative;"data-ride="carousel"
        data-aos="fade-up" data-aos-delay="0">
        <div class="carousel-inner ">
            <div class="carousel-item active">
                <img class="d-block w-100" src="/img/car1.jpeg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/img/car2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/img/car3.jpg" alt="Third slide">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselcontrol" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselcontrol" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up" data-aos-delay="30">

            <div class="row">
                <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-left" data-aos-delay="30">
                    <img src="/img/stc1.png" class="img-fluid " alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                    <h3>SATUNAMA Training Center.</h3>
                    <p class="fst-italic">
                        SATUNAMA sebagai lembaga swadaya masyarakat mempunyai sejarah yang cukup panjang. Sejarah yang
                        panjang itu bermuatan perkembagan
                        lembaga sesuai dengan dinamika internal lembaga maupun dalam menanggapi perkembangan masyarakat
                        yang
                        dilayaninya. Maka wajar kalau
                        SATUNAMA mempunyai modal yang memadai dalam bentuk pengetahuan dan praktek yang bisa di-share ke
                        banyak pihak melalui pelatihan dan
                        konsultasi.
                    </p>
                </div>
            </div>

            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/WjZ-FUQiJys?si=0HudgvaI0bNaRPaf" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>

            
            

            <div data-mc-src="4e17eba0-b4e4-46cb-988f-547b493cf865#null"></div>

            <script src="https://cdn2.woxo.tech/a.js#64a4fc17bfb5b26c08838d0e" async data-usrc></script>

        </div>
    </section><!-- End About Section --> --}}


<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <div class="carousel-inner" role="listbox">34

            <!-- Slide 1 -->
            <div class="carousel-item active" style="background-image: url(/pesertastyle/assets/img/slide/slide1.jpg);">
                <div class="carousel-container">
                    <div class="carousel-content animate__animated animate__fadeInUp">
                        <h2>Pelatihan Pengembangan Diri dan Interelasi Penyandang Disabilitas Fisik</h2>
                        <p>Bagi seorang pekerja, resiko kecelakaan kerja bisa terjadi kapanpun. Mulai dari ketika dalam
                            perjalanan kerja, kecelakaan di tempat kerja..</p>
                        <div class="text-center"><a
                                href="https://satunama.org/8292/pelatihan-pengembangan-diri-dan-interelasi-penyandang-disabilitas-fisik/"
                                class="btn-get-started">Read More</a></div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item" style="background-image: url(/pesertastyle/assets/img/slide/slide2.jpg);">
                <div class="carousel-container">
                    <div class="carousel-content animate__animated animate__fadeInUp">
                        <h2>Pelatihan Change the Game Academy: Keterampilan Komunikasi, Aspek Penting Fundraiser Era
                            Digital</h2>
                        <p>Keterampilan komunikasi penting bagi para aktivitis yang bergelut di dalam dunia NGO.
                            Kecakapan ini masih relevan di tengah tuntutan bagi NGO untuk semakin mandiri dan semakin
                            berdaya secara finansial melalui aktivitas fundraising (penggalangan dana)..</p>
                        <div class="text-center"><a
                                href="https://satunama.org/8285/pelatihan-change-the-game-academy-keterampilan-komunikasi-aspek-penting-fundraiser-era-digital/"
                                class="btn-get-started">Read More</a></div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item" style="background-image: url(/pesertastyle/assets/img/slide/slide3.jpg);">
                <div class="carousel-container">
                    <div class="carousel-content animate__animated animate__fadeInUp">
                        <h2>Pelatihan Perencanaan, Pengembangan dan Monitoring Program Berbasis Theory of Change (ToC)
                        </h2>
                        <div class="text-center"><a
                                href="https://satunama.org/8276/pelatihan-perencanaan-pengembangan-dan-monitoring-program-berbasis-theory-of-change-toc/"
                                class="btn-get-started">Read More</a></div>
                    </div>
                </div>
            </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
</section>

<section id="about-us" class="about-us">
    <div class="container" data-aos="fade-up"> 

        <div class="row content">
            <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-right">
                <img src="/img/stc1.png" class="img-fluid " alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
                <h3>SATUNAMA Training Center.</h3>
                <p class="fst-italic">
                    SATUNAMA sebagai lembaga swadaya masyarakat mempunyai sejarah yang cukup panjang. Sejarah yang
                    panjang itu bermuatan perkembagan
                    lembaga sesuai dengan dinamika internal lembaga maupun dalam menanggapi perkembangan masyarakat
                    yang
                    dilayaninya. Maka wajar kalau
                    SATUNAMA mempunyai modal yang memadai dalam bentuk pengetahuan dan praktek yang bisa di-share ke
                    banyak pihak melalui pelatihan dan
                    konsultasi.
                </p>
            </div>
        </div>

    </div>
</section>

<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>SATUNAMA YouTube</h2>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <iframe width="560" height="315"
                    src="https://www.youtube.com/embed/WjZ-FUQiJys?si=QLfI-mnh7nD0RS7s" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                data-aos-delay="200">
                <iframe width="560" height="315"
                    src="https://www.youtube.com/embed/E20IeC4_c6A?si=Is782rrHsQsEJ7Bu" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in"
                data-aos-delay="300">
                <iframe width="560" height="315"
                    src="https://www.youtube.com/embed/cHh3LxOk3YE?si=dR_Qn9YZZzKDM7s-" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>

        </div>
</section><!-- End Services Section -->
