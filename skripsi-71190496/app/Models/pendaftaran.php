<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_gender',
        'id_rentang_usia',
        'id_kabupaten',
        'id_provinsi',
        'id_negara',
        'id_organisasi',
        'nama_peserta',
        'email_peserta',
        'no_hp',
        'email_peserta',
        'nama_organisasi',
        'jabatan_peserta',
        'pelatihan_relevan',
        'harapan_pelatihan'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function rentang_usia()
    {
        return $this->belongsTo(rentang_usia::class);
    }
    public function informasi_pelatihan()
    {
        return $this->belongsTo(informasi_pelatihan::class);
    }
    public function gender()
    {
        return $this->belongsTo(gender::class);
    }
    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }
    public function kabupaten_kota()
    {
        return $this->belongsTo(kabupaten_kota::class);
    }
    public function provinsi()
    {
        return $this->belongsTo(provinsi::class);
    }
    public function negara()
    {
        return $this->belongsTo(negara::class);
    }
    public function peserta()
    {
        return $this->hasMany(peserta_pelatihan_test::class);
    }
}
