<?php

namespace App\Http\Requests\Admin\Reguler;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateReguler extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.reguler.edit', $this->reguler);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'metode_pelatihan' => ['sometimes', 'string'],
            'lokasi_pelatihan' => ['sometimes', 'string'],
            'fee_pelatihan' => ['sometimes', 'numeric'],
            'kuota_peserta' => ['sometimes', 'numeric'],
            // 'id_pelatihan' => ['sometimes', 'string'],
            'id_fasilitator' => ['required'],
            'id_tema' => ['sometimes', 'string'],
            'nama_pelatihan' => ['sometimes', 'string'],
            'tanggal_mulai' => ['sometimes', 'date'],
            'tanggal_selesai' => ['sometimes', 'date'],
            'tanggal_pendaftaran' => ['sometimes', 'date'],
            'tanggal_batas_pendaftaran' => ['sometimes', 'date'],
            'deskripsi_pelatihan' => ['sometimes', 'string'],
            'status' => ['sometimes', 'boolean'],

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
