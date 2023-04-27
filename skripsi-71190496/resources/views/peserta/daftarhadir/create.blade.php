@extends('peserta.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Pendaftaran Pelatihan</h1>
  </div>

  <div class="col-lg-8">
    <form method="post" action="/peserta/daftarhadir">
      @csrf
      <div class="form-group">
        <label for="Nama Peserta">Nama Peserta</label>
        <input type="text" class="form-control mb-2" placeholder="Masukan Nama Anda" name="nama_peserta">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Email</label>
        <input type="email" class="form-control mb-2" id="exampleFormControlInput1" placeholder="name@example.com" name="email_peserta">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Nomor Kontak</label>
        <input type="text" class="form-control mb-2" id="exampleInputPassword1" placeholder="Masukan Kontak Anda" name="nomor_kontak_peserta">
      </div>
      <div class="form-group">
        <label for="gender">Gender</label>
        <select class="form-select mb-2">    
          @foreach ($gender as $item)    
          <option value="{{ $item['id_gender'] }}">{{ $item['nama_gender'] }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="jenisorganisasi">Jenis Organisasi</label>
        <select class="form-select mb-2">    
          @foreach ($organisasis as $item)    
          <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
          @endforeach
        </select>  
      </div>
      <div class="form-group mb-2">
        <label for="organisasi">Nama Organisasi</label>
        <input type="text" class="form-control" placeholder="Masukan Nama Organisasi Anda" name="nama_organisasi">
      </div>
      <label for="exampleFormControlFile1">Masukan Foto Anda</label>
      <form>
        <div class="form-group mb-3">
          <input type="file" class="form-control-file mb" id="exampleFormControlFile1">
        </div>
      </form>
      <button type="submit" class="btn btn-success mb-3">Simpan</button>
@endsection