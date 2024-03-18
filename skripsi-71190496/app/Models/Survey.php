<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    protected $table = 'peserta_survey_kepuasan';
    protected $fillable = [
        'id_user',
        'id_pelatihan', 
        'tingkat_kepuasan',
        'relevansi_pekerjaan',
        'relevansi_biaya',
        'pembelajaran',
        'saran',
        'intensitas_pelatihan',
        'id_provinsi',
        'id_kabupaten',
        'pelatihan_lembaga_lain',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
    public function pelatihan(){
        return $this->belongsTo(pelatihan::class, 'id_pelatihan');
    }
    public function kabupaten_kota(){
        return $this->belongsTo(kabupaten_kota::class, 'id_kabupaten');
    }
    public function provinsi(){
        return $this->belongsTo(provinsi::class, 'id_provinsi');
    }
}
