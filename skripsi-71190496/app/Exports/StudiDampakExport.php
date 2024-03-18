<?php

namespace App\Exports;

use App\Models\PesertaStudiDampak;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudiDampakExport implements FromCollection , WithHeadings
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
                'Perubahan Posisi' => $item->perubahan_posisi,
                'Posisi Sebelum' => $item->posisi_sebelum,
                'Posisi Sesudah' => $item->posisi_sesudah,
                'Topik yang dapat langsung digunakan' => $item->topik_pekerjaan,
                'Topik yang dimanfaatkan untuk meningkatkan kinerja' => $item->topik_kinerja,
                'Topik yang dirasa sulit dipahami' => $item->topik_sulit,
                'Topik yang tidak relevan' => $item->topik_tidak_relevan,
                'Peserta merekomendasikan pelatihan pada rekan' => $item->rekomendasi_pelatihan,
                'Rekomendasi Pelatihan dari peserta' => $item->pelatihan_yang_diperlukan,
                

                
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
            'Perubahan Posisi',
            'Posisi Sebelum',
            'Posisi Sesudah',
            'Topik yang dapat langsung digunakan',
            'Topik yang dimanfaatkan untuk meningkatkan kinerja',
            'Topik yang dirasa sulit dipahami',
            'Topik yang tidak relevan',
            'Peserta merekomendasikan pelatihan pada rekan',
            'Rekomendasi Pelatihan dari peserta',
        ];
    }
}
