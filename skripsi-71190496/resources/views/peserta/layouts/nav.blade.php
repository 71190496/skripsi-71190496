{{-- <ul class="nav nav-tabs d-flex justify-content-center">
    <li class="nav-item">
      <a class="nav-link" aria-current="page" href="{{ route('peserta.pelatihan.show', ['id' => $pelatihan->id_pelatihan]) }}" style="color: rgb(103, 212, 103)">Materi</a>
    </li>  
    <li class="nav-item">
      <a class="nav-link {{ Request::is('/peserta/daftarhadir/create*') ? 'active' : '' }}" href="{{ route('peserta.daftarhadir.create', ['id' => $pelatihan->id_pelatihan]) }}" tabindex="-1" style="color: rgb(103, 212, 103)">Presensi</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('peserta.evaluasi.create', ['id' => $pelatihan->id_pelatihan]) }}" style="color: rgb(103, 212, 103)">Evaluasi Pelatihan</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ route('peserta.surveykepuasan.create', ['id' => $pelatihan->id_pelatihan]) }}" tabindex="-1" style="color: rgb(103, 212, 103)">Survey Kepuasan</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ route('peserta.studidampak.create', ['id' => $pelatihan->id_pelatihan]) }}" tabindex="-1" style="color: rgb(103, 212, 103)">Studi Dampak</a>
    </li>
  </ul> --}}

<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
        <div class="col-lg-12">
            <div class="sidebar">
                <h3 class="sidebar-title">Menu</h3>
                <div class="sidebar-item categories">
                    <ul>
                        <li class="nav-item {{ Route::currentRouteName() == 'peserta.pelatihan.show' ? 'active' : '' }}">
                            <a class="nav-link" aria-current="page" href="{{ $kembali }}">Materi</a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteName() == 'peserta.sertifikat.show' ? 'active' : '' }}">
                            <a class="nav-link" aria-current="page" href="{{ $sertifikat }}">Sertifikat</a>
                        </li>
                        <li
                            class="nav-item {{ Route::currentRouteName() == 'peserta.daftarhadir.create' ? 'active' : '' }}">
                            <a class="nav-link" aria-current="page" href="{{ $hadir }}">Presensi</a>
                        </li>
                        <li
                            class="nav-item {{ Route::currentRouteName() == 'peserta.evaluasi.create' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ $evaluasi }}">Evaluasi Pelatihan</a>
                        </li>
                        <li
                            class="nav-item {{ Route::currentRouteName() == 'peserta.surveykepuasan.create' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ $survey }}">Survey Kepuasan</a>
                        </li>
                        <li
                            class="nav-item {{ Route::currentRouteName() == 'peserta.studidampak.create' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ $studi }}">Studi Dampak</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>
