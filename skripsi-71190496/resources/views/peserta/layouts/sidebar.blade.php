<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('peserta/index') ? 'active' : '' }}" 
            href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('peserta/daftarpelatihan*') ? 'active' : '' }}" 
          href="/peserta/daftarpelatihan">
            <span data-feather="file" class="align-text-bottom"></span>
            Daftar Pelatihan
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('peserta/evaluasi*') ? 'active' : '' }}" 
            href="/peserta/evaluasi">
            <span data-feather="shopping-cart" class="align-text-bottom"></span>
            Evaluasi Pelatihan
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('peserta/surveykepuasan*') ? 'active' : '' }}" 
            href="/peserta/surveykepuasan">
            <span data-feather="users" class="align-text-bottom"></span>
            Survey Kepuasan 
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('peserta/studidampak*') ? 'active' : '' }}" 
            href="/peserta/studidampak">
            <span data-feather="bar-chart-2" class="align-text-bottom"></span>
            Studi Dampak Pelatihan
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('peserta/daftarhadir*') ? 'active' : '' }}" 
            href="/peserta/daftarhadir">
            <span data-feather="layers" class="align-text-bottom"></span>
            Daftar Hadir
          </a>
        </li>
      </ul>
    </div>
  </nav>