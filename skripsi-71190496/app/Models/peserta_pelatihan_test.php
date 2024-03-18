<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// use App\Models\rentang_usia;


class peserta_pelatihan_test extends Model
{
    use HasFactory;
    protected $table = 'peserta_pelatihan_tests';
    protected $fillable = [
        'gender',
        'id_user',
        'id_pelatihan',
        'id_rentang_usia',
        'id_kabupaten',
        'id_provinsi',
        'id_negara',
        'id_organisasi',
        'id_informasi',
        'nama_peserta',
        'email_peserta',
        'no_hp',
        'email_peserta',
        'nama_organisasi',
        'jabatan_peserta',
        'pelatihan_relevan',
        'harapan_pelatihan',
        'bukti_bayar',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function rentang_usia()
    {
        return $this->belongsTo(rentang_usia::class,'id_rentang_usia');
    }
    public function informasi_pelatihan(){
        return $this->belongsTo(informasi_pelatihan::class, 'id_informasi');
    }
    
    public function gender(): BelongsTo
    {
        return $this->belongsTo(gender::class, 'id_gender');
    }
    public function tema()
    {
        return $this->belongsTo(tema::class, 'id_tema');
    }
    public function jenis_organisasi(){
        return $this->belongsTo(jenis_organisasi::class, 'id_organisasi');
    }
    public function kabupaten_kota(){
        return $this->belongsTo(kabupaten_kota::class, 'id_kabupaten');
    }
    public function provinsi(){
        return $this->belongsTo(provinsi::class, 'id_provinsi');
    }
    public function negara(){
        return $this->belongsTo(negara::class, 'id_negara');
    }
    public function pelatihan(){
        return $this->belongsTo(pelatihan::class, 'id_pelatihan');
    }
}
