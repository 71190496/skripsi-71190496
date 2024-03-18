@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.reguler.actions.edit', ['name' => $reguler->id]))

@section('body')

<div class="container-xl">

    <reguler-form :action="'{{ $reguler->resource_url }}'" :data="{{ $reguler->toJson() }}"
        :fasilitator="{{ $id_fasilitator->toJson() }}" v-cloak inline-template>

        <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action"
            novalidate>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-plus"></i> Tambah Pelatihan
                        </div>
                        <div class="card-body">
                            @include('admin.reguler.components.form-elements')
                        </div>

                        <div class="card-header">
                            {{-- Include media uploader --}}
                            @include('brackets/admin-ui::admin.includes.media-uploader', [
                            'mediaCollection' => app(App\Models\Reguler::class)->getMediaCollection('gambar'),
                            'media' => $reguler->getThumbs200ForCollection('gambar'),
                            'label' => 'Gambar Pelatihan',
                            ])
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-12 col-xl-5 col-xxl-4">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-check"></i> Tanggal Pelatihan
                        </div>
                        <div class="card-body">
                            @include('admin.reguler.components.form-tanggal')
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-user"></i> Fasilitator
                        </div>
                        <div class="card-body">
                            @include('admin.reguler.components.form-fasilitator')
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary fixed-cta-button" :disabled="submiting">
                <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                {{ trans('brackets/admin-ui::admin.btn.save') }}
            </button>

        </form>

    </reguler-form>


</div>

@endsection
