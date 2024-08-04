@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Form Tambah Pelatihan</h1>
    </div>

    <form method="post" action="/dashboard/permintaan/{{ $data->id }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        {{-- <input type="hidden" id="id_permintaan" name="id_permintaan" value="{{ $nilai }}"> --}}
        <div class="row">
            <div class="col-sm-7 mb-4">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <div class="d-flex justify-content-start">
                            <h6 class="m-0 font-weight-bold text-success">Permintaan</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Informasi Pelatihan -->
                        <div class="mb-3">
                            <label for="nama_pelatihan" class="form-label">Nama Pelatihan</label>
                            <input type="text" class="form-control @error('nama_pelatihan') is-invalid @enderror"
                                placeholder="Masukkan Nama Pelatihan" name="nama_pelatihan" id="nama_pelatihan"
                                value="{{ old('nama_pelatihan', $data->nama_pelatihan) }}"  autofocus>
                            @error('nama_pelatihan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
        
                        <div class="mb-3">
                            <label for="tema" class="form-label">Tema Pelatihan</label>
                            <select class="form-control @error('id_tema') is-invalid @enderror" name="id_tema" >
                                <option value="">Pilih Tema Pelatihan</option>
                                @foreach ($tema as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $data->id_tema ? 'selected' : '' }}>
                                        {{ $item->judul_tema }}</option>
                                @endforeach
                            </select>
                            @error('id_tema')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
        
                        <div class="mb-3">
                            <label for="metode_pelatihan" class="form-label">Metode Pelatihan</label>
                            <select class="form-control @error('metode_pelatihan') is-invalid @enderror" name="metode_pelatihan"
                                >
                                <option value="">Pilih Metode Pelatihan</option>
                                <option value="Online" {{ $data->metode_pelatihan === 'Online' ? 'selected' : '' }}>Online
                                </option>
                                <option value="Offline" {{ $data->metode_pelatihan === 'Offline' ? 'selected' : '' }}>Offline
                                </option>
                            </select>
                            @error('metode_pelatihan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
        
                        <div class="mb-3">
                            <label for="lokasi_pelatihan" class="form-label">Lokasi Pelatihan</label>
                            <input type="text" class="form-control @error('lokasi_pelatihan') is-invalid @enderror"
                                placeholder="Masukkan Lokasi Pelatihan" name="lokasi_pelatihan" id="lokasi_pelatihan"
                                value="{{ old('lokasi_pelatihan', $data->lokasi_pelatihan) }}" >
                            @error('lokasi_pelatihan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
        
                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Poster Pelatihan</label>
                            <input value="{{ old('image') }}" class="form-control @error('image.*') is-invalid @enderror"
                                type="file" id="image" name="image[]" multiple>
                            @error('image.*')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            @foreach ($oldImages as $image)
                                <img src="{{ asset('storage/' . $image) }}" alt="Gambar Lama" class="img-thumbnail"
                                    style="max-width: 200px; max-height: 200px;">
                            @endforeach
                        </div>
        
                        <div class="mb-3">
                            <label for="file" class="form-label">Upload Materi</label>
                            <input value="{{ old('file') }}" class="form-control @error('file.*') is-invalid @enderror"
                                type="file" id="file" name="file[]" multiple>
                            @error('file.*')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            @foreach ($oldFiles as $file)
                                @php
                                    $extension = pathinfo($file, PATHINFO_EXTENSION);
                                    $icon = '';
                                    switch ($extension) {
                                        case 'pdf':
                                            $icon = 'fa-file-pdf';
                                            break;
                                        case 'doc':
                                        case 'docx':
                                            $icon = 'fa-file-word';
                                            break;
                                        default:
                                            $icon = 'fa-file'; // Icon default untuk format lainnya
                                            break;
                                    }
                                @endphp
                                <a href="{{ asset('storage/' . $file) }}" download><i
                                        class="fa-solid {{ $icon }}"></i>{{ basename($file) }}</a><br>
                            @endforeach
                        </div>
        
                        <div class="trix-content mb-3">
                            <label for="deskripsi_pelatihan" class="form-label">Deskripsi Pelatihan</label>
                            <input id="deskripsi_pelatihan" type="hidden" name="deskripsi_pelatihan"
                                value="{{ old('deskripsi_pelatihan', $data->deskripsi_pelatihan) }}">
                            <trix-editor input="deskripsi_pelatihan" upload-url="/dashboard/reguler/upload/image"></trix-editor>
                            @error('deskripsi_pelatihan')
                                <div class="invalid-feedback">
                                    <p class="text-danger">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-sm-5 mb-4">
                <!-- Tanggal Pelatihan -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="d-flex justify-content-start">
                            <h6 class="m-0 font-weight-bold text-success">Tanggal Pelatihan</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="tanggal_mulai" class="form-label">Tanggal Mulai Pelatihan</label>
                            <input type="date" id="tanggal_mulai"
                                class="form-control @error('tanggal_mulai') is-invalid @enderror" name="tanggal_mulai"
                                value="{{ old('tanggal_mulai', $data->tanggal_mulai) }}" >
                            @error('tanggal_mulai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
        
                        <div class="mb-3">
                            <label for="tanggal_selesai" class="form-label">Tanggal Selesai Pelatihan</label>
                            <input type="date" id="tanggal_selesai"
                                class="form-control @error('tanggal_selesai') is-invalid @enderror" name="tanggal_selesai"
                                value="{{ old('tanggal_selesai', $data->tanggal_selesai) }}" >
                            @error('tanggal_selesai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
        
                <!-- Fasilitator -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="d-flex justify-content-start">
                            <h6 class="m-0 font-weight-bold text-success">Fasilitator Pelatihan</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <label for="fasilitator-pelatihan">Fasilitator Pelatihan</label>
                        <div class="form-group mb-2">
                            <select id="fasilitator" class="form-control @error('id_fasilitator') is-invalid @enderror"
                                name="id_fasilitator[]"  multiple="multiple" style="width: 100%">
                                @foreach ($fasilitator_pelatihan as $item)
                                    <option value="{{ $item->id_fasilitator }}"
                                        @if (in_array($item->id_fasilitator, $oldIdFasilitator)) selected @endif>{{ $item->nama_fasilitator }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_fasilitator')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <button type="submit" class="btn btn-success mb-3">Simpan</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#fasilitator').select2({
                placeholder: "Pilih Fasilitator",
                theme: "classic"
            });

            $('.form-control').on('input', function() {
                $(this).removeClass('is-invalid'); // Menghapus kelas 'is-invalid'
                $(this).siblings('.invalid-feedback').remove(); // Menghapus pesan kesalahan
            });
        });

        document.addEventListener('trix-initialize', function(event) {
            var editor = event.target.editor;

            // Menonaktifkan grup tombol file-tools
            var fileToolsButtonGroup = editor.toolbarElement.querySelector('[data-trix-button-group="file-tools"]');
            editor.deactivateAttribute('toolbar', fileToolsButtonGroup);
        });
    </script>
@endsection