@extends('peserta.layouts.main')

<main id="main">
    <div class="breadcrumbs">
        <div class="container">
            <h2>Pelatihan Saya</h2>
        </div>
    </div><!-- End Breadcrumbs -->

    <section class="container">
        @include('peserta.layouts.nav')

        <div class="mt-2">
            @foreach ($data as $item)
                <p>Nama Pelatihan : {{ $item->nama_pelatihan }}</p>
                <p>Deskripsi Pelatihan : {!! $item->deskripsi_pelatihan !!}</p>
            @endforeach
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-3" scope="col">Judul Materi</th>
                    <th class="col-md-1" scope="col">Download File</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    @foreach ($data as $key => $item)
                        <td>{{ $item->file }}</td>  
                        <td><a href="{{ route('peserta.pelatihan.download', $item->id) }}">Download</a></td>
                    @endforeach

                </tr>

            </tbody>
        </table>

    </section>
</main>
