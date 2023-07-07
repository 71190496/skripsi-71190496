@extends('peserta.layouts.main')

<main id="main">
    <div class="breadcrumbs">
        <div class="container">
            <h2>Pelatihan Saya</h2>
        </div>
    </div><!-- End Breadcrumbs -->
    @if (Session::has('success'))
        <div class="pt-3">
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        </div>
    @endif
    <section class="container">

        <div class="card-body">
            <div class="table-responsive-md">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="col-md-3" scope="col">Nama Pelatihan</th>
                            <th class="col-md-1" scope="col">Tanggal Mulai</th>
                            <th class="col-md-1" scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelatihans as $item)
                            <tr>
                                <td>{{ $item->pelatihan->nama_pelatihan }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->pelatihan->tanggal_postingan)->format('d M Y') }}
                                </td>
                                <td><a
                                        href="{{ route('peserta.pelatihan.show', ['id' => $item->pelatihan->id]) }}">Lihat</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
