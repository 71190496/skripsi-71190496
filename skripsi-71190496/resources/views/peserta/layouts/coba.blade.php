<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>STC | {{ $title }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('pesertastyle/assets/img/stc1.png') }}" rel="icon">
    <link href="{{ asset('pesertastyle/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('pesertastyle/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('pesertastyle/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('pesertastyle/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('pesertastyle/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('pesertastyle/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('pesertastyle/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('pesertastyle/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('pesertastyle/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('pesertastyle/assets/css/style.css') }}" rel="stylesheet">

    <!-- select2 -->
    <script src="{{ asset('select2/dist/js/jquery.min.js') }}"></script>
    <link href="{{ asset('select2/dist/css/select2.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('select2/dist/js/select2.min.js') }}"></script>

</head>

<body>

    @include('peserta.layouts.header')

    <main id="main">

        @yield('container')

    </main>



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="{{ asset('pesertastyle/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('pesertastyle/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('pesertastyle/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('pesertastyle/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('pesertastyle/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('pesertastyle/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('pesertastyle/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('pesertastyle/assets/js/main.js') }}"></script>
    
    <!-- Template Main JS File -->
    <script>
        feather.replace()
    </script>

</body>
@include('peserta.layouts.footer')

</html>
