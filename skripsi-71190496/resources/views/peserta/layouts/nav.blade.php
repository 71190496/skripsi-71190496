<ul class="nav nav-tabs d-flex justify-content-center">
    <li class="nav-item">
      <a class="nav-link" aria-current="page" href="{{ route('peserta.pelatihan.show', ['id' => $pelatihan->id]) }}" style="color: rgb(103, 212, 103)">Materi</a>
    </li>  
    <li class="nav-item">
      <a class="nav-link {{ Request::is('/peserta/daftarhadir/create*') ? 'active' : '' }}" href="{{ route('peserta.daftarhadir.create', ['id' => $pelatihan->id]) }}" tabindex="-1" style="color: rgb(103, 212, 103)">Presensi</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('peserta.evaluasi.create', ['id' => $pelatihan->id]) }}" style="color: rgb(103, 212, 103)">Evaluasi Pelatihan</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ route('peserta.surveykepuasan.create', ['id' => $pelatihan->id]) }}" tabindex="-1" style="color: rgb(103, 212, 103)">Survey Kepuasan</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{ route('peserta.studidampak.create', ['id' => $pelatihan->id]) }}" tabindex="-1" style="color: rgb(103, 212, 103)">Studi Dampak</a>
    </li>
  </ul>

  

  