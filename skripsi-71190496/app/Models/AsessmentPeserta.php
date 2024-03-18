<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsessmentPeserta extends Model
{
    use HasFactory;
    protected $table = 'assessment_peserta';

    protected $fillable = [
        'id_permintaan',
        'nama_peserta',
        'email_peserta',
        'jenis_kelamin',
        'jabatan',
        'tanggung_jawab',
    ];

    public function permintaan_pelatihan()
    {
        return $this->belongsTo(permintaan_pelatihan::class, 'id_permintaan', 'id_permintaan');
    }
}
