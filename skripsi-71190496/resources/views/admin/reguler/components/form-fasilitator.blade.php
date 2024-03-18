<div class="card-block">
    <div class="form-group row align-items-center"
        :class="{ 'has-danger': errors.has('id_fasilitator'), 'has-success': fields.id_fasilitator && fields.id_fasilitator
                .valid }">
        <label for="id_fasilitator" class="col-form-label text-md-right col-md-2 col-lg-3">Fasilitator</label>
        <div class="col-md-8 col-lg-9 "> 
            <multiselect
                v-model="form.id_fasilitator"
                :options="fasilitator"
                :multiple="true" 
                track-by="id_fasilitator"
                label="nama_fasilitator"
                tag-placeholder="{{ __('Select Fasilitators') }}"
                placeholder="{{ __('Pilih Fasilitator') }}">>
        </multiselect>
        </div>
        <div v-if="errors.has('id_fasilitator')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_fasilitator') }}
        </div>
    </div>
</div>

{{-- <div class="col-sm-8 col-lg-9">
        <input type="text" v-model="form.id_fasilitator" v-validate="'required'" @input="validate($event)"
            class="form-control"
            :class="{
                'form-control-danger': errors.has('id_fasilitator'),
                'form-control-success': fields.id_fasilitator &&
                    fields.id_fasilitator.valid
            }"
            id="id_fasilitator" name="id_fasilitator" placeholder="{{ trans('admin.reguler.columns.id_fasilitator') }}">
        <div v-if="errors.has('id_fasilitator')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_fasilitator') }}
        </div>
    </div> --}}