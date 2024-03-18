<?php

namespace App\Exports;

use App\Models\Hadir;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DaftarHadirExport implements FromCollection , WithHeadings
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
                'Nomor Handphone Peserta' => $item->nomor_hp_peserta,
                'Tanggal Presensi' => \Carbon\Carbon::parse($item->created_at)->format('d M Y'),
                

                
                // Sisipkan kolom-kolom lain yang ingin Anda sertakan dalam ekspor Excel
            ];

            unset($filteredData['id']); 
            unset($filteredData['updated_at']);

            return $filteredData;
        });
    }

    public function headings(): array
    {
        return [
            'Nama Peserta',
            'Email Peserta',
            'Nomor Handphone Peserta',
            'Tanggal Presensi', 
        ];
    }
}
