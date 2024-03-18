<div class="card-block">
    <div class="form-group row align-items-center"
        :class="{ 'has-danger': errors.has('tanggal_mulai'), 'has-success': fields.tanggal_mulai && fields.tanggal_mulai.valid }">
        <label for="tanggal_mulai" class="col-form-label text-md-right col-md-2 col-lg-3">Mulai Pelatihan</label>
        <div class="col-sm-8 col-lg-9">
            <div class="input-group input-group--custom">
                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                <datetime v-model="form.tanggal_mulai" :config="datePickerConfig"
                    v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr"
                    :class="{
                        'form-control-danger': errors.has('tanggal_mulai'),
                        'form-control-success': fields.tanggal_mulai &&
                            fields.tanggal_mulai.valid
                    }"
                    id="tanggal_mulai" name="tanggal_mulai"
                    placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
            </div>
            <div v-if="errors.has('tanggal_mulai')" class="form-control-feedback form-text" v-cloak>
                @{{ errors.first('tanggal_mulai') }}
            </div>
        </div>
    </div>
</div>

<div class="card-block">
    <div class="form-group row align-items-center"
        :class="{
            'has-danger': errors.has('tanggal_selesai'),
            'has-success': fields.tanggal_selesai && fields.tanggal_selesai
                .valid
        }">
        <label for="tanggal_selesai" class="col-form-label text-md-right col-md-2 col-lg-3">Selesai Pelatihan</label>
        <div class="col-sm-8 col-lg-9">
            <div class="input-group input-group--custom">
                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                <datetime v-model="form.tanggal_selesai" :config="datePickerConfig"
                    v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr"
                    :class="{
                        'form-control-danger': errors.has('tanggal_selesai'),
                        'form-control-success': fields
                            .tanggal_selesai && fields.tanggal_selesai.valid
                    }"
                    id="tanggal_selesai" name="tanggal_selesai"
                    placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
            </div>
            <div v-if="errors.has('tanggal_selesai')" class="form-control-feedback form-text" v-cloak>
                @{{ errors.first('tanggal_selesai') }}
            </div>
        </div>
    </div>
</div>

<div class="card-block">
    <div class="form-group row align-items-center"
        :class="{
            'has-danger': errors.has('tanggal_pendaftaran'),
            'has-success': fields.tanggal_pendaftaran && fields
                .tanggal_pendaftaran.valid
        }">
        <label for="tanggal_pendaftaran" class="col-form-label text-md-right col-md-2 col-lg-3">Pendaftaran</label>
        <div class="col-sm-8 col-lg-9">
            <div class="input-group input-group--custom">
                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                <datetime v-model="form.tanggal_pendaftaran" :config="datePickerConfig"
                    v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr"
                    :class="{
                        'form-control-danger': errors.has('tanggal_pendaftaran'),
                        'form-control-success': fields
                            .tanggal_pendaftaran && fields.tanggal_pendaftaran.valid
                    }"
                    id="tanggal_pendaftaran" name="tanggal_pendaftaran"
                    placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
            </div>
            <div v-if="errors.has('tanggal_pendaftaran')" class="form-control-feedback form-text" v-cloak>
                @{{ errors.first('tanggal_pendaftaran') }}</div>
        </div>
    </div>
</div>

<div class="card-block">
    <div class="form-group row align-items-center"
        :class="{
            'has-danger': errors.has('tanggal_batas_pendaftaran'),
            'has-success': fields.tanggal_batas_pendaftaran && fields
                .tanggal_batas_pendaftaran.valid
        }">
        <label for="tanggal_batas_pendaftaran" class="col-form-label text-md-right col-md-2 col-lg-3">Batas
            Pendaftaran</label>
        <div class="col-sm-8 col-lg-9">
            <div class="input-group input-group--custom">
                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                <datetime v-model="form.tanggal_batas_pendaftaran" :config="datePickerConfig"
                    v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr"
                    :class="{
                        'form-control-danger': errors.has('tanggal_batas_pendaftaran'),
                        'form-control-success': fields
                            .tanggal_batas_pendaftaran && fields.tanggal_batas_pendaftaran.valid
                    }"
                    id="tanggal_batas_pendaftaran" name="tanggal_batas_pendaftaran"
                    placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
            </div>
            <div v-if="errors.has('tanggal_batas_pendaftaran')" class="form-control-feedback form-text" v-cloak>
                @{{ errors.first('tanggal_batas_pendaftaran') }}</div>
        </div>
    </div>
</div>
