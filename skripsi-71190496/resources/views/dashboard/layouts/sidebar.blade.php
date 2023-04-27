<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" 
            href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/daftarpelatihan*') ? 'active' : '' }}" 
          href="/dashboard/daftarpelatihan">
            <span data-feather="file" class="align-text-bottom"></span>
            Daftar Pelatihan
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/evaluasi*') ? 'active' : '' }}" 
            href="/dashboard/evaluasi">
            <span data-feather="shopping-cart" class="align-text-bottom"></span>
            Evaluasi Pelatihan
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/surveykepuasan*') ? 'active' : '' }}" 
            href="/dashboard/surveykepuasan">
            <span data-feather="users" class="align-text-bottom"></span>
            Survey Kepuasan 
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/studidampak*') ? 'active' : '' }}" 
            href="/dashboard/studidampak">
            <span data-feather="bar-chart-2" class="align-text-bottom"></span>
            Studi Dampak Pelatihan
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/daftarhadir*') ? 'active' : '' }}" 
            href="/dashboard/daftarhadir">
            <span data-feather="layers" class="align-text-bottom"></span>
            Daftar Hadir
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/fasilitator*') ? 'active' : '' }}" 
          href="/dashboard/fasilitator">
          <span data-feather="users" class="align-text-bottom"></span>
          Fasilitator
        </a>
      </li>
      </ul>
    </div>
  </nav>