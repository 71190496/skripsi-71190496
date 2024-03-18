<?php

namespace App\Exports;

use App\Models\Survey;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class SurveyKepuasanExport implements FromCollection, WithHeadings
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
                'Nama Peserta' => $item->user->name,
                'Tingkat Kepuasan' => $item->tingkat_kepuasan,
                'Relevansi dengan Pekerjaan' => $item->relevansi_pekerjaan,
                'Relevansi Biaya dengan Fasilitas' => $item->relevansi_biaya,
                'Pembelajaran dari Pelatihan' => $item->pembelajaran,
                'Saran' => $item->saran,
                'Kabupaten dan Kota' => $item->kabupaten_kota->nama_kabupaten_kota,
                'Provinsi' => $item->provinsi->nama_provinsi,
                'Intensitas Pelatihan' => $item->intensitas_pelatihan,
                'Pelatihan dari Lembaga Lain' => $item->pelatihan_lembaga_lain,
                

                
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
            'Tingkat Kepuasan',
            'Relevansi dengan Pekerjaan',
            'Relevansi Biaya dengan Fasilitas',
            'Pembelajaran dari Pelatihan',
            'Saran',
            'Kabupaten dan Kota',
            'Provinsi',
            'Intensitas Pelatihan',
            'Pelatihan dari Lembaga Lain',
        ];
    }
}
