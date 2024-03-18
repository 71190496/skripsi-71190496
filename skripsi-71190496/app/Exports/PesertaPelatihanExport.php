<?php

namespace App\Exports;

use App\Models\peserta_pelatihan_test;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PesertaPelatihanExport implements FromCollection, WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data->map(function ($item) {
            $filteredData = [
                'Nama Peserta' => $item->nama_peserta,
                'Email Peserta' => $item->email_peserta,
                'No Telepon' => $item->no_hp,
                'Usia' => $item->rentang_usia->usia,
                'Jenis Kelamin' => $item->gender->nama_gender,
                'Kabupaten' => $item->kabupaten_kota->nama_kabupaten_kota,
                'Provinsi' => $item->provinsi->nama_provinsi,
                'Negara' => $item->negara->nama_negara,
                'Nama Organisasi' => $item->nama_organisasi,
                'Jenis Organisasi' => $item->jenis_organisasi->organisasi,
                'Jabatan Peserta' => $item->jabatan_peserta,
                'Dapat Informasi' => $item->informasi_pelatihan->keterangan,
                'Pelatihan Relevan' => $item->pelatihan_relevan,
                'Harapan Pelatihan' => $item->harapan_pelatihan,

                // Sisipkan kolom-kolom lain yang ingin Anda sertakan dalam ekspor Excel
            ];

            unset($filteredData['id']);
            unset($filteredData['created_at']);
            unset($filteredData['updated_at']);

            return $filteredData;
        });
    }

    public function headings(): array
    {
        return [
            'Nama Peserta',
            'Email Peserta',
            'No Telepon',
            'Usia',
            'Jenis Kelamin',
            'Kabupaten',
            'Provinsi',
            'Negara',
            'Nama Organisasi',
            'Jenis Organisasi',
            'Jabatan Peserta',
            'Dapat Informasi',
            'Pelatihan Relevan',
            'Harapan Pelatihan',
        ];
    }
}
