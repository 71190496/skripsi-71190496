@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Fasilitator</h1>
    <a href="/dashboard/fasilitator/create" class="btn btn-primary mb-3">Tambah Fasilitator</a>
  </div>
  @if (Session::has('success'))
      <div class="pt-3">
        <div class="alert alert-success">
          {{ Session::get('success') }}
        </div>
      </div>
  @endif
  <div class="table-responsive col-lg-8">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Fasilitator</th>
          <th scope="col">Internal atau Eksternal</th>
          <th scope="col">Tindakan</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item['nama_fasilitator'] }}</td>
          <td>{{ $item['id_internal_eksternal'] }}</td>
          <td>
            <a href="" class="badge bg-info"><span data-feather="eye"></span></a>
            <a href="" class="badge bg-warning"><span data-feather="edit"></span></a>
            <a href="" class="badge bg-danger"><span data-feather="x-circle"></span></a>
          </td>
        </tr>    
        @endforeach
      </tbody>
    </table>
  </div>
@endsection