@extends('peserta.layouts.coba')
<link href="{{ asset('pesertastyle/assets/img/stc1.png') }}" rel="icon">

<main id="main" data-aos="fade-in">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Sertifikat</h2>
                <ol>
                    <li><a href="/peserta/beranda">Beranda</a></li>
                    <li><a href="/peserta/pelatihan">Pelatihan Saya</a></li>
                    <li>Sertifikat</li>
                </ol>
            </div>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="container" data-aos="fade-up">


        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-3">
                        @include('peserta.layouts.nav')
                    </div>

                    <div class="col-lg-8 entries">
                        <article class="entry entry-single">
                            <div class="php-email-form mb-3">
                                <h2 class="entry-title">
                                    Sertifikat
                                </h2>
                                <div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="col-md-3" scope="col"></th>
                                                <th class="col-md-1" scope="col">Download File</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <td></td>
                                            <td></td>
                                        </tbody>
                                    </table>
                                </div>
                            </div>



                        </article>
                    </div>
                </div>
            </div>
        </section>
    </section>
</main>
