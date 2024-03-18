<?php

namespace App\Http\Livewire;

use LaravelViews\Views\TableView;
use App\Models\peserta_pelatihan_test;
use LaravelViews\Views\Traits\WithAlerts;
use LaravelViews\Facades\UI;

class TabelDaftarPeserta extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = peserta_pelatihan_test::class;
    protected $paginate = 50;
    public $searchBy = ['nama_peserta'];

    protected function repository()
    {
        return peserta_pelatihan_test::query();
    }
    

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            'Nama Peserta',
            'Email Peserta',
            'Nomor Hp',
            'Usia',
            'Jenis Kelamin',
            'Kabupaten/Kota',
            'Provinsi',
            'Negara',
            'Nama Organisasi',
            'Jenis Organisasi',
            'Jabatan Pada Organisasi',
            'Informasi Pelatihan',
            'Pelatihan Relevan',
            'Harapan Pelatihan'
        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        return [
            UI::editable($model, 'nama_peserta'),
            $model->email_peserta,
            $model->no_hp,
            $model->rentang_usia->usia,
            $model->gender->nama_gender,
            $model->kabupaten_kota->nama_kabupaten_kota,
            $model->provinsi->nama_provinsi,
            $model->negara->nama_negara,
            $model->nama_organisasi,
            $model->jenis_organisasi->organisasi,
            $model->jabatan_peserta,
            $model->informasi_pelatihan->keterangan,
            $model->pelatihan_relevan,
            $model->harapan_pelatihan,
        ];
    }

    /**
 * Method fired by the `editable` component, it
 * gets the model instance and a key-value array
 * with the modified dadta
 */
public function update(peserta_pelatihan_test $model, $data)
{
    $model->update($data);
    $this->success();
}

    
}
