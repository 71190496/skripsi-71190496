<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    {{-- <title>{{ $title }}</title> --}}
    <meta content="" name="description">
    <meta content="" name="keywords">

    <title>STC | {{ $title }}</title>
    <link rel="icon"
        href="http://satunama.org/wp-content/uploads/2023/06/Logo-STC-Satunama-Training-Center-768x408.png">

    <!-- Favicons -->
    <link href="{{ asset('stylepeserta/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('stylepeserta/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link href="{{ asset('style/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">



    <!-- Vendor CSS Files -->
    <link href="{{ asset('stylepeserta/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('stylepeserta/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('stylepeserta/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('stylepeserta/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('stylepeserta/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('stylepeserta/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('stylepeserta/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Template Main CSS File -->
    <link href="{{ asset('stylepeserta/assets/css/style.css') }}" rel="stylesheet">

    <!-- select2 -->
    <script src="{{ asset('select2/dist/js/jquery.min.js') }}"></script>
    <link href="{{ asset('select2/dist/css/select2.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('select2/dist/js/select2.min.js') }}"></script>




    <!-- =======================================================
    * Template Name: Mentor
    * Updated: Mar 10 2023 with Bootstrap v5.2.3
    * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>


    {{-- @include('peserta.layouts.header') --}}
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="/peserta/beranda"><img src="/img/stc1.png" alt=""></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            {{-- @php
                $currentUrl = Request::url();
            @endphp --}}

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link {{ Request::is('peserta/beranda*') ? 'active' : '' }}"
                            href="/peserta/beranda">Beranda</a></li>

                    <li class="dropdown"><a href="#"><span>Program Pelatihan</span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a class="dropdown-item" href="/peserta/reguler">Reguler</a></li>
                            <li><a class="dropdown-item" href="/peserta/permintaan/create">Permintaan</a></li>
                            <li><a class="dropdown-item" href="/peserta/konsultasi/create">Konsultasi</a></li>
                        </ul>
                    </li>

                    <li><a class="nav-link {{ Request::is('peserta/kontak*') ? 'active' : '' }}"
                            href="/peserta/kontak">Kontak</a></li>
                    @auth
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                aria-expanded="false" style="display: flex; align-items: center;">
                                <img src="https://www.shutterstock.com/image-vector/profile-blank-icon-empty-photo-600nw-535853269.jpg"
                                    alt="Foto user" class="avatar-img rounded-circle user"
                                    style="width: 25px; height: 25px; border: 1px solid #000; margin-right: 5px;">
                                <span style="margin-right: 5px;">{{ auth()->user()->name }}</span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('profil.index') }}">Profil Saya</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/peserta/pelatihan">Pelatihan Saya</a>
                                </li>
                                {{-- <form id="logoutForm" action="{{ route('logout') }}" method="post"> --}}
                                {{-- @csrf --}}
                                <li>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </li>
                                {{-- </form>  --}}

                            </ul>
                        </li>
                    @else
                        <li><a class="nav-link" href="{{ route('login') }}">Masuk</a></li>
                    @endauth

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda ingin keluar?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <!-- Formulir logout dengan tindakan statis -->
                    <form id="logoutForm" action="/logout" method="post">
                        @csrf
                        <button class="btn btn-danger" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- @include('peserta.layouts.navtabs') --}}


    <main id="id" class="container">
        @yield('container')


    </main>
    @stack('pelatihan')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        < script src = "https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity = "sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
        crossorigin = "anonymous" >
    </script> --}}
    <script src="{{ asset('stylepeserta/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('stylepeserta/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('stylepeserta/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('stylepeserta/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('stylepeserta/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('stylepeserta/assets/js/main.js') }}"></script>
    <script>
        feather.replace()
    </script>

    <!-- Stylesheet Select2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">

    <!-- Skrip Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script src="/js/script.js"></script>
    <script>
        feather.replace()
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Mendengarkan saat modal ditampilkan
        $('#logoutModal').on('show.bs.modal', function(event) {
            // Mendapatkan tombol yang memicu modal
            var button = $(event.relatedTarget);
            // Ambil URL logout dari tombol (jika ada)
            var action = button.closest('form').attr('action');
            // Ubah action form logout pada modal
            $('#logoutForm').attr('action', action);
        });
    </script>

    <!-- Form Builder -->
    <script src="{{ asset('form-builder/form-builder.min.js') }}"></script>
    <script src="{{ asset('form-builder/form-render.min.js') }}"></script>

</body>
@include('peserta.layouts.footer')

</html>
