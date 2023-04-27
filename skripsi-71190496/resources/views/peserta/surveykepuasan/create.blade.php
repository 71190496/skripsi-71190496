@extends('peserta.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Survey Kepuasan</h1>
    </div>
    <form action="">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <td style="text-align: center">Sangat Tidak Puas</td>
                    <td style="text-align: center">Kurang Puas</td>
                    <td style="text-align: center">Puas</td>
                    <td style="text-align: center">Sangat Puas</td>
                </tr>
            </thead>
            <tbody>
                <td>Seberapa puas Anda dengan pelatihan di SATUNAMA?</td>
                <td style="text-align: center">
                    <label for="option1">1</label>
                    <input type="radio" id="option1" name="option" value="option1">
                </td>
                <td style="text-align: center">
                    <label for="option2">2</label>
                    <input type="radio" id="option2" name="option" value="option2">
                </td>
                <td style="text-align: center">
                    <label for="option3">3</label>
                    <input type="radio" id="option3" name="option" value="option3">
                </td>
                <td style="text-align: center">
                    <label for="option3">4</label>
                    <input type="radio" id="option4" name="option" value="option4">
                </td>
                <tr>
                    <td style="text-align: left">Seberapa cocok dan membantu topik pelatihan yang Anda ikuti dengan
                        pekerjaan Anda?</td>
                    <td style="text-align: center">
                        <label for="option1">1</label>
                        <input type="radio" id="option1" name="option" value="option1">
                    </td>
                    <td style="text-align: center">
                        <label for="option2">2</label>
                        <input type="radio" id="option2" name="option" value="option2">
                    </td>
                    <td style="text-align: center">
                        <label for="option3">3</label>
                        <input type="radio" id="option3" name="option" value="option3">
                    </td>
                    <td style="text-align: center">
                        <label for="option3">4</label>
                        <input type="radio" id="option4" name="option" value="option4">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: left">Seberapa relevan fasilitas dengan harga yang Anda bayar untuk pelatihan di
                        SATUNAMA?</td>
                    <td style="text-align: center">
                        <label for="option1">1</label>
                        <input type="radio" id="option1" name="option" value="option1">
                    </td>
                    <td style="text-align: center">
                        <label for="option2">2</label>
                        <input type="radio" id="option2" name="option" value="option2">
                    </td>
                    <td style="text-align: center">
                        <label for="option3">3</label>
                        <input type="radio" id="option3" name="option" value="option3">
                    </td>
                    <td style="text-align: center">
                        <label for="option3">4</label>
                        <input type="radio" id="option4" name="option" value="option4">
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="form-group mb-2">
            <label for="pembelajaran">Hal penting apa yang Anda ambil dari mengikuti pelatihan di SATUNAMA?</label>
            <input type="text" class="form-control">
        </div>
        <div class="form-group mb-2">
            <label for="saran">Hal apa yang perlu di tambahkan dalam pelatihan?</label>
            <input type="text" class="form-control">
        </div>
        <div class="form-group mb-2">
            <label for="intensitas_pelatihan">Berapa kali Anda mengikuti Pelatihan di SATUNAMA?</label>
            <input type="text" class="form-control">
        </div>
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <span class="h6">Asal daerah peserta</span>
        </div>
        <div>
            <div class="form-group mb-2">
                <label for="kota">Kota</label>
                <select id="inputState" class="form-control">
                    @foreach ($kabupaten_kota as $item)
                        <option value="{{ $item['id_kabupaten'] }}">{{ $item['nama_kabupaten_kota'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <select id="inputState" class="form-control">
                    @foreach ($provinsi as $item)
                        <option value="{{ $item['id_provinsi'] }}">{{ $item['nama_provinsi'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group mt-2 mb-2">
            <label for="pelatihan_lembaga">Selain di SATUNAMA, apakah Anda pernah mengikuti pelatihan lainnya? Sebutkan
                lembaga/ instansinya.</label>
            <input type="text" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
@endsection
