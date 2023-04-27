@extends('peserta.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Pendaftaran Pelatihan</h1>
  </div>

  <div class="col-lg-8">
    <form method="post" action="/dashboard/daftarpelatihan">
      <div class="form-group">
        <label for="Nama Peserta">Nama Peserta</label>
        <input type="text" class="form-control" placeholder="Masukan Nama Anda">
      </div>
      <div class="form-group">
        <label for="gender">Gender</label>
        <select class="form-select">    
          <option>Laki-Laki</option>
          <option>Perempuan</option>
          <option>Transgender</option>
          <option>Tidak ingin menyebutkan</option>
        </select>
      </div>
      <div class="form-group">
        <label for="kota">Kota</label>
        <select id="inputState" class="form-control">
          <option selected>Choose...</option>
          <option>...</option>
        </select>
      <div class="form-group">
        <label for="provinsi">Provinsi</label>
        <select id="inputState" class="form-control">
          <option selected>Choose...</option>
          <option>...</option>
        </select>
        <div class="form-group">
          <label for="negara">Negara</label>
          <select id="negara" class="form-control">
            <option selected>Choose...</option>
            <option>...</option>
          </select>
        </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" placeholder="Masukan Email Anda">
      </div>
      <div class="form-group">
        <label for="notelepon">Nomor Telepon</label>
        <input type="text" class="form-control" placeholder="Masukan Nomor Telepon Anda">
      </div>
      <div class="form-group">
        <label for="usia">Rentang Usia</label>
        <select class="form-select">    
          <option>20 - 25</option>
          <option>26 - 30</option>
          <option>31 - 35</option>
          <option>36 - 40</option>
          <option>36 - 40</option>
          <option>41 - 50</option>
          <option>>50</option>
        </select>
      </div>
      <div class="form-group">
        <label for="jenisorganisasi">Jenis Organisasi</label>
        <select class="form-select">    
          <option>Komunitas</option>
          <option>Organisasi Non-Profit</option>
          <option>Lembaga Pendidikan</option>
          <option>Instansi Pemerintahan</option>
          <option>Perusahaan</option>
          <option>Personal</option>
        </select>  
      </div>
      <div class="form-group">
        <label for="organisasi">Nama Organisasi</label>
        <input type="text" class="form-control" placeholder="Masukan Nama Organisasi Anda">
      </div>
      <div class="form-group">
        <label for="jabatan">Jabatan Pada Organisasi</label>
        <input type="text" class="form-control" placeholder="Masukan Jabatan Anda">
      </div>
      <div class="form-group">
        <label for="pelatihanrelevan">Pelatihan Relevan Yang Pernah DiIkuti</label>
        <input type="text" class="form-control" placeholder="Pelatihan Relevan Yang Penah Anda Ikuti">
      </div>
      <div class="form-group">
        <label for="harapan">Harapan Dari Pelatihan Ini</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <div></div>
      <div class="form-check">
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
    </form>
  </div>
@endsection