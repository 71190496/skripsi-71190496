<div class="form-group row align-items-center"
    :class="{ 'has-danger': errors.has('nama_pelatihan'), 'has-success': fields.nama_pelatihan && fields.nama_pelatihan.valid }">
    <label for="nama_pelatihan" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Nama Pelatihan</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nama_pelatihan" v-validate="'required'" @input="validate($event)"
            class="form-control"
            :class="{
                'form-control-danger': errors.has('nama_pelatihan'),
                'form-control-success': fields.nama_pelatihan &&
                    fields.nama_pelatihan.valid
            }"
            id="nama_pelatihan" name="nama_pelatihan" placeholder="{{ trans('admin.reguler.columns.nama_pelatihan') }}">
        <div v-if="errors.has('nama_pelatihan')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nama_pelatihan') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{ 'has-danger': errors.has('metode_pelatihan'), 'has-success': fields.metode_pelatihan && fields.metode_pelatihan.valid }">
    <label for="metode_pelatihan" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Metode Pelatihan</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select class="form-control" id="metode_pelatihan" name="metode_pelatihan" v-model="form.metode_pelatihan" v-validate="'required'" placeholder="Pilih Metode Pelatihan">
            <option value="">Pilih Metode Pelatihan</option>
            <option value="Offline">Offline</option>
            <option value="Online">Online</option>
        </select>
        {{-- <input type="text" v-model="form.metode_pelatihan" v-validate="'required'" @input="validate($event)"
            class="form-control"
            :class="{
                'form-control-danger': errors.has('metode_pelatihan'),
                'form-control-success': fields.metode_pelatihan && fields
                    .metode_pelatihan.valid
            }"
            id="metode_pelatihan" name="metode_pelatihan" placeholder="Metode Pelatihan"> --}}
        <div v-if="errors.has('metode_pelatihan')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('metode_pelatihan') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{ 'has-danger': errors.has('lokasi_pelatihan'), 'has-success': fields.lokasi_pelatihan && fields.lokasi_pelatihan.valid }">
    <label for="lokasi_pelatihan" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Lokasi Pelatihan</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.lokasi_pelatihan" v-validate="'required'" @input="validate($event)"
            class="form-control"
            :class="{
                'form-control-danger': errors.has('lokasi_pelatihan'),
                'form-control-success': fields.lokasi_pelatihan &&
                    fields.lokasi_pelatihan.valid
            }"
            id="lokasi_pelatihan" name="lokasi_pelatihan" placeholder="Lokasi Pelatihan">
        <div v-if="errors.has('lokasi_pelatihan')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('lokasi_pelatihan') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{ 'has-danger': errors.has('fee_pelatihan'), 'has-success': fields.fee_pelatihan && fields.fee_pelatihan.valid }">
    <label for="fee_pelatihan" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Fee Pelatihan</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="number" v-model="form.fee_pelatihan" v-validate="'required'" @input="validate($event)"
            class="form-control"
            :class="{
                'form-control-danger': errors.has('fee_pelatihan'),
                'form-control-success': fields.fee_pelatihan &&
                    fields.fee_pelatihan.valid
            }"
            id="fee_pelatihan" name="fee_pelatihan" placeholder="Fee Pelatihan">
        <div v-if="errors.has('fee_pelatihan')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('fee_pelatihan') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{ 'has-danger': errors.has('kuota_peserta'), 'has-success': fields.kuota_peserta && fields.kuota_peserta.valid }">
    <label for="kuota_peserta" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Kuota Peserta</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="number" v-model="form.kuota_peserta" v-validate="'required'" @input="validate($event)"
            class="form-control"
            :class="{
                'form-control-danger': errors.has('kuota_peserta'),
                'form-control-success': fields.kuota_peserta &&
                    fields.kuota_peserta.valid
            }"
            id="kuota_peserta" name="kuota_peserta" placeholder="Kuota Peserta">
        <div v-if="errors.has('kuota_peserta')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('kuota_peserta') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{ 'has-danger': errors.has('id_tema'), 'has-success': fields.id_tema && fields.id_tema.valid }">
    <label for="id_tema" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">Tema Pelatihan</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select class="form-control" id="id_tema" name="id_tema" v-model="form.id_tema" v-validate="'required'">
            <option value="">Pilih tema</option>
            @foreach ($tema as $item)
                <option value="{{ $item->id }}">{{ $item->judul_tema }}</option>
            @endforeach
        </select>
        {{-- <input type="text" v-model="form.id_tema" v-validate="'required'" @input="validate($event)"
            class="form-control"
            :class="{
                'form-control-danger': errors.has('id_tema'),
                'form-control-success': fields.id_tema && fields.id_tema
                    .valid
            }"
            id="id_tema" name="id_tema" placeholder="{{ trans('admin.reguler.columns.id_tema') }}"> --}}
        <div v-if="errors.has('id_tema')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_tema') }}</div>
    </div>
</div>





<div class="form-group row align-items-center"
    :class="{
        'has-danger': errors.has('deskripsi_pelatihan'),
        'has-success': fields.deskripsi_pelatihan && fields
            .deskripsi_pelatihan.valid
    }">
    <label for="deskripsi_pelatihan" class="col-form-label text-md-right"
        :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.reguler.columns.deskripsi_pelatihan') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            {{-- <textarea class="form-control" v-model="form.deskripsi_pelatihan" v-validate="'required'" id="deskripsi_pelatihan"
                name="deskripsi_pelatihan"></textarea> --}}
            <wysiwyg v-model="form.deskripsi_pelatihan" v-validate="'required'" id="deskripsi_pelatihan" name="deskripsi_pelatihan"
                :config="mediaWysiwygConfig" />
        </div>
        <div v-if="errors.has('deskripsi_pelatihan')" class="form-control-feedback form-text" v-cloak>
            @{{ errors.first('deskripsi_pelatihan') }}</div>
    </div>
</div>

<div class="form-check row"
    :class="{ 'has-danger': errors.has('status'), 'has-success': fields.status && fields.status.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="status" type="checkbox" v-model="form.status" v-validate="''"
            data-vv-name="status" name="status_fake_element">
        <label class="form-check-label" for="status">
            {{ trans('admin.reguler.columns.status') }}
        </label>
        <input type="hidden" name="status" :value="form.status">
        <div v-if="errors.has('status')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('status') }}</div>
    </div>
</div>
