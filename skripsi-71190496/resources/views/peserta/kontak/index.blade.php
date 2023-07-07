@extends('peserta.layouts.main')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>Contact Us</h2>
            <p>Apakah Anda memiliki pertanyaan umum tentang SATUNAMA Training Center? Kirimkan kami pertanyaan dan kami
                akan menjawab Anda secepat yang kami bisa! </p>
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
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
    </section><!-- End Contact Section -->

</main><!-- End #main -->
