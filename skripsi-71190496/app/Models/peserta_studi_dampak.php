<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peserta_studi_dampak extends Model
{
    use HasFactory;
    protected $table = 'peserta_studi_dampak';
    protected $fillable = [
        'perubahan_posisi',
        'posisi_sebelum',
        'posisi_sesudah',
        'topik_pekerjaan',
        'topik_kinerja',
        'topik_sulit',
        'topik_tidak_relevan',
        'rekomendasi_pelatihan',
        'pelatihan_yang_diperlukan',
    ];
}
