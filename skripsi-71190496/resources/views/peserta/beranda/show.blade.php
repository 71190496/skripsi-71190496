@extends('peserta.layouts.main')

@section('container')
    @foreach ($data as $item)
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{ $item->judul_postingan }}</h1>
        </div>
        <a class="btn btn-success mb-2" href="/peserta/beranda">Kembali ke beranda</a>

        <article class="mb-2">
            <div class="mb-2">
                <small class="mb-2">{{ $item->tanggal_postingan }}</small>
            </div>
            <div style="text-align: justify">
                {!! $item->isi_postingan !!}
            </div>
        </article>
    @endforeach 
@endsection
