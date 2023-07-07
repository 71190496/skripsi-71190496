<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class konsultasi extends Model
{
    use HasFactory;
    protected $table = "konsultasis";
    protected $fillable = [
        'id_jenis_organisasi',
        'id_jenis_layanan',
        'id_kabupaten',
        'id_provinsi',
        'id_negara',
        'nama_organisasi',
        'alamat',
        'email',
        'no_hp',
        'deskripsi_pelatihan'
    ];
    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }
    public function kabupaten_kota()
    {
        return $this->belongsTo(kabupaten_kota::class);
    }
    public function negara()
    {
        return $this->belongsTo(negara::class);
    }
}
