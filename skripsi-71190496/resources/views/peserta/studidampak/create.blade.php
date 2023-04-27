@extends('peserta.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Studi Dampak Pelatihan</h1>
</div>

  <div class="col-lg-8">
    <form method="post" action="/dashboard/daftarpelatihan">
      <div class="form-group mb-2">
        <label for="perubahan_posisi">Setelah pelatihan yang anda ikuti, apakah anda mengalami perubahan posisi dalm pekerjaan anda?</label>
        <select id="perubahan_posisi" class="form-select">    
            <option>Ya</option>
            <option>Tidak</option>
        </select>
      </div>
      <div id="posisi-sebelum" class="form-group mb-2" style="display: none">
        <label for="posisi-sebelum">Dari Posisi?</label>
        <input type="text" class="form-control" placeholder="Masukan Posisi Sebelum">
      </div>
      <div id="posisi-sesudah" class="form-group mb-2" style="display: none">
        <label for="posisi-sesudah">Ke Posisi?</label>
        <input type="text" class="form-control" placeholder="Masukan Posisi Sesudah">
      </div>
      <div class="form-group mb-2">
        <label for="materi">Dari materi yang diberikan, topik-topik mana yang langsung dapat digunakan dalam pekerjaan anda?</label>
        <input type="text" class="form-control">
      </div>
      <div class="form-group mb-2">
        <label for="">Dari materi yang diberikan, topik-topik mana yang dapat dimanfaatkan untuk meningkatkan kinerja Unit/ divisi/ departemen/ lembaga anda?</label>
        <input type="text" class="form-control">
      </div>
      <div class="form-group mb-2">
        <label for="nomor_telepon">Dari materi yang diberikan, topik-topik mana yang masih merupakan kesulitan dan perlu diperdalam pemahamannya?</label>
        <input type="text" class="form-control" >
      </div>
      <div class="form-group mb-2">
        <label for="alamat">Dari materi yang diberikan, topik-topik mana yang dianggap tidak relevan?</label>
        <input type="text" class="form-control" >
      </div>
      <div class="form-group mb-2">
        <label for="alamat">Kalau pelatihan yang sama ditawarkan lagi, apakah anda merekomendasikan teman sejawat anda untuk mengikuti atau lembaga anda untuk mengirimkan stafnya?</label>
        <input type="text" class="form-control" >
      </div>
      <div class="form-group mb-2">
        <label for="alamat">Untuk semakin meningkatkan kapasitas anda dan lembaga anda, pelatihan-pelatihan apa yang sangat diperlukan?</label>
        <input type="text" class="form-control">
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
      $(document).ready(function() {
          $('#perubahan_posisi').change(function() {
              if ($(this).val() == 'Ya') {
                  $('#posisi-sebelum').show();
                  $('#posisi-sesudah').show();s
              } else {
                $('#posisi-sebelum').hide();
                $('#posisi-sesudah').hide();
              }
          });
      });
  </script>
@endsection