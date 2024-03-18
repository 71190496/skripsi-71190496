<?php

namespace App\Http\Requests\Admin\Reguler;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreReguler extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.reguler.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'metode_pelatihan' => ['required', 'string'],
            'lokasi_pelatihan' => ['required', 'string'],
            'fee_pelatihan' => ['required','numeric'],
            'kuota_peserta' => ['required', 'numeric'],
            'id_fasilitator' => ['required'],
            'id_tema' => ['required', 'string'],
            'nama_pelatihan' => ['required', 'string'],
            'tanggal_mulai' => ['required', 'date'],
            'tanggal_selesai' => ['required', 'date'],
            'tanggal_pendaftaran' => ['required', 'date'],
            'tanggal_batas_pendaftaran' => ['required', 'date'],
            'deskripsi_pelatihan' => ['required', 'string'],
            'status' => ['required', 'boolean'],

        ];
    }

    public function getFasilitator(): array
    {
        if ($this->has('id_fasilitator')) {
            $id_fasilitator = $this->get('id_fasilitator');
            return array_column($id_fasilitator, 'id_fasilitator');
        }
        return [];
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
