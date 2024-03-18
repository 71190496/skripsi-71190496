<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permintaan_pelatihan extends Model
{
    protected $table = 'permintaan_pelatihan';

    protected $fillable = [
        'id_user',
        'id_tema',
        'id_mitra',
        'judul_pelatihan',
        'jenis_pelatihan',
        'tanggal_waktu_mulai',
        'tanggal_waktu_selesai',
        'masalah',
        'kebutuhan',
        'materi',
        'request_khusus',
    ];

    public function mitra()
    {
        return $this->belongsTo(Mitra::class, 'id_mitra');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function tema()
    {
        return $this->belongsTo(tema::class, 'id_tema');
    }

    public function asessment_dasar()
    {
        return $this->hasMany(AssesmentDasar::class, 'id_permintaan');
    }

    public function assessment_peserta()
    {
        return $this->hasMany(AsessmentPeserta::class, 'id_permintaan');
    }
}
