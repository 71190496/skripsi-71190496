@extends('peserta.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Pendaftaran Pelatihan</h1>
</div>
  <h4>Reguler</h4>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Pelatihan</th>
          <th scope="col">Waktu</th>
          <th scope="col">Tindakan</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Pelatihan ...</td>
          <td>14 Maret 2023</td>
          <td>
            <a href="/peserta/daftarpelatihan/create"><span>Detail Pelatihan dan Daftar</span></a>
          </td>
        </tr>
      </tbody>
    </table>

    <h4>Permintaan</h4>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Pelatihan</th>
          <th scope="col">Waktu</th>
          <th scope="col">Tindakan</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Pelatihan ...</td>
          <td>14 Maret 2023</td>
          <td>
            <a href="/peserta/daftarpelatihan/show"><span>Detail Pelatihan dan Daftar</span></a>
          </td>
        </tr>
      </tbody>
    </table>

    <h4>Konsultasi</h4>
    <a href="/peserta/daftarpelatihan/konsultasi" class="btn btn-success">Pendaftaran Konsultasi</a>
@endsection