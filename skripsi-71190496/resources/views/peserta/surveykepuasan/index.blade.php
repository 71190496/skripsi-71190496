@extends('peserta.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Survey Kepuasan</h1>
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
        <td>1,001</td>
        <td>random</td>
        <td>data</td>
        <td>
          <a href="/peserta/surveykepuasan/create" class="badge bg-success"><span data-feather="edit"></span></a>
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection