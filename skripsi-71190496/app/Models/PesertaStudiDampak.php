<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PesertaStudiDampak extends Model
{
    use HasFactory;
    protected $table = 'peserta_studi_dampak';
    protected $fillable = [
        'id_user',
        'id_pelatihan',
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

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function pelatihan(){
        return $this->belongsTo(pelatihan::class, 'id_pelatihan');
    }
}

