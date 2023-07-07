<div class="container">
    <header class="d-flex justify-content-center py-3">
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/peserta/beranda*') ? 'active' : '' }}"  href="/peserta/beranda">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('peserta/profil*') ? 'active' : '' }}" href="/peserta/profil">Profil</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Program Pelatihan</a>
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
    </header>
  </div>
  