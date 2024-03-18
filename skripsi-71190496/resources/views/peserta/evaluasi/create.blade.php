@extends('peserta.layouts.coba')
<link href="{{ asset('pesertastyle/assets/img/stc1.png') }}" rel="icon">


<main id="main" data-aos="fade-in">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Evaluasi Pelatihan</h2>
                <ol>
                    <li><a href="/peserta/beranda">Beranda</a></li>
                    <li><a href="/peserta/pelatihan">Pelatihan Saya</a></li>
                    <li><a href="{{ $kembali }}">Detail Pelatihan</a></li>
                    <li>Form Evaluasi Pelatihan</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="container" data-aos="fade-up">
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-3">
                        @include('peserta.layouts.nav')
                    </div>

                    <div class="col-lg-8 entries">
                        <article class="entry entry-single">
                            @if (isset($pertanyaanJawaban) && count($pertanyaanJawaban) > 0)
                                <div class="php-email-form mb-3">
                                    <h2 class="entry-title">
                                        Form Evaluasi Pelatihan
                                    </h2>

                                    <div class="entry-content">
                                        <p>Evaluasi Pelatihan ini akan membantu kami untuk meningkatkan kualitas
                                            pelatihan
                                            serta memenuhi kebutuhan
                                            dan permintaan anda.</p>
                                        <p>Silahkan menilai dan memberi komentar untuk hal-hal berikut :</p>
                                    </div>
                                </div>
                                @if (Session::has('success'))
                                    <div class="pt-3">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ Session::get('success') }}
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                                <form id="myForm" method="post" action="{{ route('evaluasi.store') }}"
                                    enctype="multipart/form-data" role="form">
                                    @csrf
                                    <input type="hidden" name="id_pelatihan" value="{{ $id_pelatihan }}">
                                    <input type="hidden" id="id_user" name="id_user" value="{{ Auth::id() }}">
                                    @foreach ($fasilitators as $index => $item)
                                        <div class="form-survey" style="background-color: rgb(222, 225, 222)">
                                            <div
                                                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                                                <h6 class="entry-content">Fasilitator {{ $loop->iteration }}:
                                                    {{ $item->fasilitator_pelatihan[0]['nama_fasilitator'] ?? 'Tidak ada Fasilitator' }}
                                                </h6>
                                            </div>
                                        </div>

                                        <div class="form-survey">
                                            <div
                                                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                                <h6 for="metode_{{ $index }}" class="entry-content">Metode yang
                                                    digunakan</h6>
                                            </div>
                                            <div class="mx-0 mx-sm-auto">
                                                <div class="text-left mb-3">
                                                    <div class="d-inline mx-3">
                                                        Kurang
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][metode]"
                                                            id="metode1_{{ $index }}" value="1" />
                                                        <label class="form-check-label" for="metode1">1</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][metode]"
                                                            id="metode2_{{ $index }}" value="2" />
                                                        <label class="form-check-label" for="metode2">2</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][metode]"
                                                            id="metode3_{{ $index }}" value="3" />
                                                        <label class="form-check-label" for="metode3">3</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][metode]"
                                                            id="metode4_{{ $index }}" value="4" />
                                                        <label class="form-check-label" for="metode4">4</label>
                                                    </div>
                                                    <div class="d-inline me-4">
                                                        Sangat Baik
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-survey">
                                            <div
                                                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                                <h6 for="respon_peserta_{{ $index }}" class="entry-content">
                                                    Kemampuan merespon peserta</h6>
                                            </div>
                                            <div class="mx-0 mx-sm-auto">
                                                <div class="text-left mb-3">
                                                    <div class="d-inline mx-3">
                                                        Kurang
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" <input
                                                            type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][respon_peserta]"
                                                            id="respon_peserta1_{{ $index }}"
                                                            value="1" />
                                                        <label class="form-check-label"
                                                            for="respon_peserta1">1</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" <input
                                                            type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][respon_peserta]"
                                                            id="respon_peserta2_{{ $index }}"
                                                            value="2" />
                                                        <label class="form-check-label"
                                                            for="respon_peserta2">2</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" <input
                                                            type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][respon_peserta]"
                                                            id="respon_peserta3_{{ $index }}"
                                                            value="3" />
                                                        <label class="form-check-label"
                                                            for="respon_peserta3">3</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" <input
                                                            type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][respon_peserta]"
                                                            id="respon_peserta4_{{ $index }}"
                                                            value="4" />
                                                        <label class="form-check-label"
                                                            for="respon_peserta4">4</label>
                                                    </div>
                                                    <div class="d-inline me-4">
                                                        Sangat Baik
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-survey">
                                            <div
                                                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                                <h6 for="pengembangan_proses_{{ $index }}"
                                                    class="entry-content">
                                                    Pengendalian/pengembangan proses</h6>
                                            </div>
                                            <div class="mx-0 mx-sm-auto">
                                                <div class="text-left mb-3">
                                                    <div class="d-inline mx-3">
                                                        Kurang
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][pengembangan_proses]"
                                                            id="pengembangan_proses1_{{ $index }}"
                                                            value="1" />
                                                        <label class="form-check-label"
                                                            for="pengembangan_proses1">1</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][pengembangan_proses]"
                                                            id="pengembangan_proses2_{{ $index }}"
                                                            value="2" />
                                                        <label class="form-check-label"
                                                            for="pengembangan_proses2">2</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][pengembangan_proses]"
                                                            id="pengembangan_proses3_{{ $index }}"
                                                            value="3" />
                                                        <label class="form-check-label"
                                                            for="pengembangan_proses3">3</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][pengembangan_proses]"
                                                            id="pengembangan_proses4_{{ $index }}"
                                                            value="4" />
                                                        <label class="form-check-label"
                                                            for="pengembangan_proses4">4</label>
                                                    </div>
                                                    <div class="d-inline me-4">
                                                        Sangat Baik
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-survey">
                                            <div
                                                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                                <h6 for="kecukupan_waktu_{{ $index }}" class="entry-content">
                                                    Kecukupan waktu</h6>
                                            </div>
                                            <div class="mx-0 mx-sm-auto">
                                                <div class="text-left mb-3">
                                                    <div class="d-inline mx-3">
                                                        Kurang
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][kecukupan_waktu]"
                                                            id="kecukupan_waktu1_{{ $index }}"
                                                            value="1" />
                                                        <label class="form-check-label"
                                                            for="kecukupan_waktu1">1</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][kecukupan_waktu]"
                                                            id="kecukupan_waktu2_{{ $index }}"
                                                            value="2" />
                                                        <label class="form-check-label"
                                                            for="kecukupan_waktu2">2</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][kecukupan_waktu]"
                                                            id="kecukupan_waktu3_{{ $index }}"
                                                            value="3" />
                                                        <label class="form-check-label"
                                                            for="kecukupan_waktu3">3</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][kecukupan_waktu]"
                                                            id="kecukupan_waktu4_{{ $index }}"
                                                            value="4" />
                                                        <label class="form-check-label"
                                                            for="kecukupan_waktu4">4</label>
                                                    </div>
                                                    <div class="d-inline me-4">
                                                        Sangat Baik
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-survey">
                                            <div
                                                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                                <h6 for="penguasaan_materi_{{ $index }}"
                                                    class="entry-content">
                                                    Penguasaan materi</h6>
                                            </div>
                                            <div class="mx-0 mx-sm-auto">
                                                <div class="text-left mb-3">
                                                    <div class="d-inline mx-3">
                                                        Kurang
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][penguasaan_materi]"
                                                            id="penguasaan_materi1_{{ $index }}"
                                                            value="1" />
                                                        <label class="form-check-label"
                                                            for="penguasaan_materi1">1</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][penguasaan_materi]"
                                                            id="penguasaan_materi2_{{ $index }}"
                                                            value="2" />
                                                        <label class="form-check-label"
                                                            for="penguasaan_materi2">2</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][penguasaan_materi]"
                                                            id="penguasaan_materi3_{{ $index }}"
                                                            value="3" />
                                                        <label class="form-check-label"
                                                            for="penguasaan_materi3">3</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][penguasaan_materi]"
                                                            id="penguasaan_materi4_{{ $index }}"
                                                            value="4" />
                                                        <label class="form-check-label"
                                                            for="penguasaan_materi4">4</label>
                                                    </div>
                                                    <div class="d-inline me-4">
                                                        Sangat Baik
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-survey">
                                            <div
                                                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                                <h6 for="kemampuan_menyampaikan_materi_{{ $index }}"
                                                    class="entry-content">Kemampuan menyampaikan materi</h6>
                                            </div>
                                            <div class="mx-0 mx-sm-auto">
                                                <div class="text-left mb-3">
                                                    <div class="d-inline mx-3">
                                                        Kurang
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][kemampuan_menyampaikan_materi]"
                                                            id="kemampuan_menyampaikan_materi1_{{ $index }}"
                                                            value="1" />
                                                        <label class="form-check-label"
                                                            for="kemampuan_menyampaikan_materi1">1</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][kemampuan_menyampaikan_materi]"
                                                            id="kemampuan_menyampaikan_materi2_{{ $index }}"
                                                            value="2" />
                                                        <label class="form-check-label"
                                                            for="kemampuan_menyampaikan_materi2">2</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][kemampuan_menyampaikan_materi]"
                                                            id="kemampuan_menyampaikan_materi3_{{ $index }}"
                                                            value="3" />
                                                        <label class="form-check-label"
                                                            for="kemampuan_menyampaikan_materi3">3</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="ratings[{{ $item->id_fasilitator }}][kemampuan_menyampaikan_materi]"
                                                            id="kemampuan_menyampaikan_materi4_{{ $index }}"
                                                            value="4" />
                                                        <label class="form-check-label"
                                                            for="kemampuan_menyampaikan_materi4">4</label>
                                                    </div>
                                                    <div class="d-inline me-4">
                                                        Sangat Baik
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-survey">
                                            <div
                                                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                                <h6 for="catatan_{{ $index }}"class="text-left">CATATAN :
                                                    Apapun
                                                    nilai yang anda berikan di atas,
                                                    mohon diberikan
                                                    penjelasan dalam satu atau dua kalimat di bawah ini:</h6>
                                            </div>
                                            <div class="mb-3">
                                                <textarea class="form-control" name="ratings[{{ $item->id_fasilitator }}][catatan]"
                                                    id="catatan_{{ $index }}" rows="3"></textarea>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="form-eval" style="background-color: rgb(206, 206, 206)">
                                        <h6 class="entry-content">Materi Pelatihan</h6><br>
                                        <p>Dari topik-topik pembahasan di bawah, manakah yang :</p>
                                    </div>
                                    @foreach ($pertanyaanJawaban as $item)
                                        <div class="form-eval">
                                            <div
                                                class="d-flex justify-content-between flex-wrap flex-md-nowrap pt-3 pb-2 mb-3">
                                                <p>{{ $item['pertanyaan'] }}</p>
                                            </div>
                                            @if (isset($item['jawaban']) && count($item['jawaban']) > 0)
                                                @foreach ($item['jawaban'] as $jawaban)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            value="{{ $jawaban->id_jawaban }}"
                                                            id="jawaban_{{ $jawaban->id_jawaban }}"
                                                            name="jawabans[{{ $jawaban->id_pertanyaan }}][jawaban]">
                                                        <label class="form-check-label text-left"
                                                            for="jawaban_{{ $jawaban->id_jawaban }}">
                                                            {{ $jawaban->jawaban }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    @endforeach 
                                    <button class="btn btn-success" type="submit">Simpan</button>
                                </form>
                            @else
                                <div class="d-flex justify-content-center mt-5">
                                    <img src="http://satunama.org/wp-content/uploads/2023/06/Logo-STC-Satunama-Training-Center-768x408.png"
                                        alt="" style="width: 150px; height: auto;">
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <strong>Belum ada Evaluasi Pelatihan.</strong>
                                </div>
                            @endif


                            {{-- <div class="form-survey pagination">
                                        @if ($fasilitators->currentPage() > 1)
                                        <a href="{{ $fasilitators->url($fasilitators->currentPage() - 1) }}">Previous</a>
                                        @endif
                                        
                                        @if ($fasilitators->hasMorePages())
                                        <a href="{{ $fasilitators->url($fasilitators->currentPage() + 1) }}">Next</a>
                                        @endif
                                    </div> --}}

                            <!-- Display pagination links with buttons -->
                            {{-- <div class="form-survey pagination">
                                <a href="{{ $fasilitators->links() }}">next</a>
                            </div> --}}
                            {{-- {{ route('peserta.studidampak.store') }} --}}

                        </article>
                    </div>
                </div>
        </section>
    </section>
</main>

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var currentFasilitator = 1;
        var totalFasilitators = {{ $fasilitators->lastPage() }};

        // Function to show the current fasilitator and hide others
        function showFasilitator(fasilitatorNumber) {
            $('.form-survey').addClass('hidden');
            $('.fasilitator-' + fasilitatorNumber).removeClass('hidden');
        }

        // Show the first fasilitator initially
        showFasilitator(currentFasilitator);

        // Event listener for the "Next" button
        $('#nextFasilitator').on('click', function() {
            if (currentFasilitator < totalFasilitators) {
                currentFasilitator++;
                showFasilitator(currentFasilitator);
            }
        });
    });
</script> --}}

{{-- <div class="container"> --}}
{{-- <form method="post" action="">
        @csrf
        <input type="hidden" name="id_pelatihan" value="{{ $nilai }}">
        <div class="album py-2 px-2" data-aos="fade-up">
            <section class="container d-flex justify-content-center">

                <div class="col-lg-8">
                    <div class="row row-cols">
                        @foreach ($id_pelatihan as $item)
                            @if ($item->fasilitator_pelatihan1)
                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Fasilitator 1:
                                            {{ $item->fasilitator_pelatihan1->nama_fasilitator ?? 'Tidak ada Fasilitator' }}</span><br>
                                    </div>
                                    <p>Silahkan menilai dan memberi komentar untuk hal-hal berikut :</p>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Metode yang digunakan</span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tingkat_kepuasan"
                                                    id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tingkat_kepuasan"
                                                    id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tingkat_kepuasan"
                                                    id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tingkat_kepuasan"
                                                    id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Kemampuan merespon peserta</span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tingkat_kepuasan"
                                                    id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tingkat_kepuasan"
                                                    id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tingkat_kepuasan"
                                                    id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tingkat_kepuasan"
                                                    id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Pengendalian/pengembangan proses</span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Kecukupan waktu</span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Penguasaan materi
                                        </span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Kemampuan menyampaikan materi
                                        </span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">CATATAN : Apapun nilai yang anda berikan di atas,
                                            mohon diberikan
                                            penjelasan dalam satu atau dua kalimat di bawah ini:
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                            @endif

                            @if ($item->fasilitator_pelatihan2)
                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Fasilitator 2:
                                            {{ $item->fasilitator_pelatihan2->nama_fasilitator ?? 'Tidak ada Fasilitator' }}</span><br>
                                    </div>
                                    <p>Silahkan menilai dan memberi komentar untuk hal-hal berikut :</p>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Metode yang digunakan</span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Kemampuan merespon peserta</span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Pengendalian/pengembangan proses</span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Kecukupan waktu</span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Penguasaan materi
                                        </span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Kemampuan menyampaikan materi
                                        </span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">CATATAN : Apapun nilai yang anda berikan di atas,
                                            mohon diberikan
                                            penjelasan dalam satu atau dua kalimat di bawah ini:
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                            @endif

                            @if ($item->fasilitator_pelatihan3)
                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Fasilitator 3:
                                            {{ $item->fasilitator_pelatihan3->nama_fasilitator ?? 'Tidak ada Fasilitator' }}</span><br>
                                    </div>
                                    <p>Silahkan menilai dan memberi komentar untuk hal-hal berikut :</p>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Metode yang digunakan</span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Kemampuan merespon peserta</span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Pengendalian/pengembangan proses</span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Kecukupan waktu</span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Penguasaan materi
                                        </span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">Kemampuan menyampaikan materi
                                        </span>
                                    </div>
                                    <div class="mx-0 mx-sm-auto">
                                        <div class="text-left mb-3">
                                            <div class="d-inline mx-3">
                                                Kurang
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan1" value="1" />
                                                <label class="form-check-label" for="tingkat_kepuasan1">1</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan2" value="2" />
                                                <label class="form-check-label" for="tingkat_kepuasan2">2</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan3" value="3" />
                                                <label class="form-check-label" for="tingkat_kepuasan3">3</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="tingkat_kepuasan" id="tingkat_kepuasan4" value="4" />
                                                <label class="form-check-label" for="tingkat_kepuasan4">4</label>
                                            </div>
                                            <div class="d-inline me-4">
                                                Sangat Baik
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                                    <div
                                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                        <span class="h6">CATATAN : Apapun nilai yang anda berikan di atas,
                                            mohon diberikan
                                            penjelasan dalam satu atau dua kalimat di bawah ini:
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                        <div class="card py-4 mx-3 mb-3 justify-content-center" style="width: 95%">
                            <div
                                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                                <span class="h6">Materi Pelatihan:
                                    {{ $item->fasilitator_pelatihan1->nama_fasilitator ?? 'Tidak ada Fasilitator' }}</span><br>
                            </div>
                            <p>Dari topik-topik pembahasan di bawah, manakah yang :</p>
                        </div>
                    </div>
                    <a href="{{ $kembali }}" class="btn btn-success">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </section>
        </div>
    </form> --}}
{{-- </div> --}}
