@extends('peserta.layouts.coba')
<link href="{{ asset('pesertastyle/assets/img/stc1.png') }}" rel="icon">

<main id="main" data-aos="fade-in">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Materi</h2>
                <ol>
                    <li><a href="/peserta/beranda">Beranda</a></li>
                    <li><a href="/peserta/pelatihan">Pelatihan Saya</a></li>
                    <li>Materi</li>
                </ol>
            </div>

        </div>
    </section>

    <section class="container" data-aos="fade-up">
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-3">
                        @include('peserta.layouts.nav')
                    </div>

                    <div class="col-lg-9 entries">
                        <article class="entry entry-single">
                            @if (!empty($data))
                                <div class="php-email-form mb-3">
                                    <h2 class="entry-title">
                                        <p>{{ $data[0]->nama_pelatihan }}</p>
                                    </h2>
                                </div>
                                <div class="entry-content">
                                    <p>Deskripsi Pelatihan : {!! $data[0]->deskripsi_pelatihan !!}</p>
                                </div>
                                <h2 class="entry-title">
                                    Materi
                                </h2>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="col-md-3" scope="col">Judul Materi</th>
                                            <th class="col-md-1" scope="col">Download File</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            @if ($item->id_pelatihan && $item->filePelatihan->isNotEmpty())
                                                @foreach ($item->filePelatihan as $file)
                                                    <tr>
                                                        <td>
                                                            {{ basename($file->path) ?? '-' }}
                                                        </td>
                                                        <td><a
                                                                href="{{ asset('storage/' . $file['path']) }}">Download</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                {{-- @if ($item->filePelatihan->isNotEmpty())
                                                        @foreach ($item->filePelatihan as $file)
                                                            <td><a
                                                                    href="{{ asset('storage/' . $file['path']) }}">Download</a>
                                                            </td>
                                                        @endforeach
                                                    
                                                    @endif --}}
                                            @else
                                                <td colspan="2">Belum ada materi yang diupload</td>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            @elseif (!empty($permintaans))
                                {{-- @foreach ($permintaans as $item) --}}
                                <div class="php-email-form mb-3">
                                    <h2 class="entry-title">
                                        <p>{{ $permintaans[0]->nama_pelatihan }}</p>
                                    </h2>
                                </div>
                                <div class="entry-content">
                                    <p>Deskripsi Pelatihan : {!! $permintaans[0]->deskripsi_pelatihan !!}</p>
                                </div>
                                {{-- @endforeach --}}
                                <h2 class="entry-title">
                                    Materi
                                </h2>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="col-md-3" scope="col">Judul Materi</th>
                                            <th class="col-md-1" scope="col">Download File</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($permintaans as $item)
                                                @if ($item->id)
                                                    @foreach ($item->filePermintaan as $file)
                                                        <td>
                                                            {{ basename($file->path) ?? '-' }}
                                                        </td>
                                                    @endforeach
                                                    @if ($item->filePermintaan->isNotEmpty())
                                                        @foreach ($item->filePermintaan as $file)
                                                            <td><a
                                                                    href="{{ asset('storage/' . $file['path']) }}">Download</a>
                                                            </td>
                                                        @endforeach
                                                    @else
                                                        <td colspan="2">Belum ada materi yang diupload</td>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            @elseif (!empty($konsultasis))
                                <div class="php-email-form mb-3">
                                    <h2 class="entry-title">
                                        <p>{{ $konsultasis[0]->nama_pelatihan }}</p>
                                    </h2>
                                </div>
                                <div class="entry-content">
                                    <p>Deskripsi Pelatihan : {!! $konsultasis[0]->deskripsi_pelatihan !!}</p>
                                </div>
                                <h2 class="entry-title">
                                    Materi
                                </h2>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="col-md-3" scope="col">Judul Materi</th>
                                            <th class="col-md-1" scope="col">Download File</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($konsultasis as $item)
                                                @if ($item->id)
                                                    @foreach ($item->filekonsultasi as $file)
                                                        <td>
                                                            {{ basename($file->path) ?? '-' }}
                                                        </td>
                                                    @endforeach
                                                    @if ($item->filekonsultasi->isNotEmpty())
                                                        @foreach ($item->filekonsultasi as $file)
                                                            <td><a
                                                                    href="{{ asset('storage/' . $file['path']) }}">Download</a>
                                                            </td>
                                                        @endforeach
                                                    @else
                                                        <td colspan="2">Belum ada materi yang diupload</td>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            @endif
                        </article>
                    </div>
                </div>
            </div>
        </section>
    </section>
</main>
