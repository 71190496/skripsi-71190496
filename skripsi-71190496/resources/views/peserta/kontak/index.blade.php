@extends('peserta.layouts.coba')
<link href="{{ asset('pesertastyle/assets/img/stc1.png') }}" rel="icon">
<main id="main">


    {{-- <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>Contact Us</h2>
            <p>Apakah Anda memiliki pertanyaan umum tentang SATUNAMA Training Center? Kirimkan kami pertanyaan dan kami
                akan menjawab Anda secepat yang kami bisa! </p>
        </div>
    </div> 

    
    <section id="contact" class="contact">
        <div data-aos="fade-up">
            <iframe style="border:0; width: 100%; height: 350px;"
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d253029.6299746451!2d110.35717700000001!3d-7.727277999999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59b8fe4e6201%3A0x15b92587dba99384!2sYayasan%20SATUNAMA%20Yogyakarta!5e0!3m2!1sid!2sus!4v1685039760103!5m2!1sid!2sus"
                frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="container" data-aos="fade-up">

            <div class="row mt-5">

                <div class="col-lg-4">
                    <div class="info">
                       
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Lokasi:</h4>
                                @foreach ($data as $item)
                                <p>{{ $item->lokasi }}</p>
                                @endforeach
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                @foreach ($data as $item)
                                <p>{{ $item->email }}</p>
                                @endforeach
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Telp:</h4>
                                @foreach ($data as $item)
                                <p>{{ $item->telepon }}</p>
                                @endforeach
                            </div>
                        
                    </div>

                </div>

                <div class="col-lg-8 mt-5 mt-lg-0">

                    <form action="{{ route('kontak.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="nama_peserta" class="form-control" id="nama_peserta"
                                    placeholder="Masukan nama anda" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email_peserta" id="email_peserta"
                                    placeholder="Masukan email anda" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subjek" id="subjek"
                                placeholder="Subjek" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="pesan" rows="5" placeholder="Pesan" required></textarea>
                        </div>
                        <div class="text-center mt-2">
                            <button class="btn btn-success" type="submit">Send Message</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </section>  --}}

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

    <!-- ======= Contact Section ======= -->
    <div class="map-section">
        <iframe style="border:0; width: 100%; height: 350px;"
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d253029.6299746451!2d110.35717700000001!3d-7.727277999999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59b8fe4e6201%3A0x15b92587dba99384!2sYayasan%20SATUNAMA%20Yogyakarta!5e0!3m2!1sid!2sus!4v1685039760103!5m2!1sid!2sus"
                frameborder="0" allowfullscreen></iframe>
    </div>

    <section id="contact" class="contact">
        <div class="container">

            <div class="row justify-content-center" data-aos="fade-up">

                <div class="col-lg-10">

                    <div class="info-wrap rounded-2 border">
                        <div class="row">
                            <div class="col-lg-4 info">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                @foreach ($data as $item)
                                <p>{{ $item->lokasi }}</p>
                                @endforeach
                            </div>

                            <div class="col-lg-4 info mt-4 mt-lg-0">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                @foreach ($data as $item)
                                <p>{{ $item->email }}</p>
                                @endforeach
                            </div>

                            <div class="col-lg-4 info mt-4 mt-lg-0">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                @foreach ($data as $item)
                                <p>{{ $item->telepon }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="row mt-5 justify-content-center" data-aos="fade-up">
                <div class="col-lg-10">
                    <form action="{{ route('peserta.kontak.email') }}" method="post" role="form" class="php-email-form rounded-2 border">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject"
                                placeholder="Subject" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div>

            </div>

        </div>
    </section>

</main>
