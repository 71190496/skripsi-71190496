    <!-- ======= Header ======= -->
    {{-- <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto"><a href="/peserta/beranda"><img src="/img/stc1.png" alt=""></a></h1> --}}

    {{-- <h1 class="logo me-auto"><a href="/peserta/beranda">STC</a></h1> --}}
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

    {{-- <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link {{ Request::is('/peserta/beranda*') ? 'active' : '' }}"
                            href="/peserta/beranda">Beranda</a></li> --}}
    {{-- <li><a class="nav-link {{ Request::is('peserta/profil*') ? 'active' : '' }}"
                            href="/peserta/profil">Profil</a></li>
                    <li><a class="nav-link {{ Request::is('peserta/postingan*') ? 'active' : '' }}"
                            href="/peserta/postingan">Artikel</a></li> --}}
    {{-- <li class="dropdown"><a href="#"><span>Program Pelatihan</span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a class="dropdown-item" href="/peserta/daftarpelatihan">Reguler</a></li>
                            <li><a class="dropdown-item" href="/peserta/permintaan/create">Permintaan</a></li>
                            <li><a class="dropdown-item" href="/peserta/konsultasi/create">Konsultasi</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link {{ Request::is('peserta/kontak*') ? 'active' : '' }}"
                            href="/peserta/kontak">Kontak</a></li>
                    @auth
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                aria-expanded="false">Selamat Datang, {{ auth()->user()->name }}</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="/peserta/pelatihan">Pelatihan Saya</a>
                                </li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <li>
                                        <button class="dropdown-item" type="submit">Logout</button>
                                    </li>
                                </form>
                            </ul>
                        </li>
                    @else
                        <li><a class="nav-link" href="{{ route('login') }}">Masuk</a></li>
                    @endauth
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar --> --}}

    {{-- <a href="courses.html" class="get-started-btn">Get Started</a>
     --}}
    {{-- </div>
    </header><!-- End Header --> --}}


    <!-- ======= Header ======= -->
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
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" style="display: flex; align-items: center;">
                                <img src="https://www.shutterstock.com/image-vector/profile-blank-icon-empty-photo-600nw-535853269.jpg"
                                    alt="Foto user" class="avatar-img rounded-circle user"
                                    style="width: 25px; height: 25px; border: 1px solid #000; margin-right: 5px;">
                                <span style="margin-right: 5px;">{{ auth()->user()->name }}</span>
                            </a>
                            
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="/peserta/pelatihan">Profil Saya</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/peserta/pelatihan">Pelatihan Saya</a>
                                </li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <li>
                                        <button class="dropdown-item" type="submit">Logout</button>
                                    </li>
                                </form>
                            </ul>
                        </li>
                    @else
                        <li><a class="nav-link" href="{{ route('login') }}">Masuk</a></li>
                    @endauth

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>

    </header><!-- End Header -->


    {{-- <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary">
     <div class="container-fluid">
         <a class="navbar-brand d-inline-flex link-body-emphasis text-decoration-none"href="/">
             <img src="/img/stc.png" width="120" height="35">
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
             aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNavDropdown">
             <ul class="navbar-nav">
                 <li class="nav-item">
                     <a class="nav-link {{ Request::is('/peserta/beranda*') ? 'active' : '' }}"
                         href="/peserta/beranda">Beranda</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link {{ Request::is('peserta/profil*') ? 'active' : '' }}"
                         href="/peserta/profil">Profil</a>
                 </li>
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                         aria-expanded="false">Program Pelatihan</a>
                     <ul class="dropdown-menu">
                         <li><a class="dropdown-item" href="/peserta/reguler">Reguler</a></li>
                         <li><a class="dropdown-item" href="/peserta/permintaan">Permintaan</a></li>
                         <li><a class="dropdown-item" href="/peserta/konsultasi">Konsultasi</a></li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link " href="">Kontak</a>
                 </li>
             </ul>
         </div>
     </div>

     <div class="navbar-nav mx-4 d-flex justify-content-end">
         <div class="nav-item text-nowrap">
             <ul class="navbar-nav">
                 @auth
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                             aria-expanded="false">Selamat Datang, {{ auth()->user()->name }}</a>
                         <ul class="dropdown-menu">
                             <li>
                                 <a class="dropdown-item" href="/peserta/pelatihan">Pelatihan Saya</a>
                             </li>
                             <form action="/logout" method="post">
                                 @csrf
                                 <li>
                                     <button class="dropdown-item" type="submit">Logout</button>
                                 </li>
                             </form>
                         </ul>
                     </li>
                 @endauth
             </ul>
         </div>
     </div>
 </nav> --}}
