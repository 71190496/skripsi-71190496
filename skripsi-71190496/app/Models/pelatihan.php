<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;


class pelatihan extends Model
{
    use HasFactory;
    protected $table = 'pelatihans';
    protected $dates = ['tanggal_mulai'];
    protected $fillable = [
        'id_tema',
        'id_jenis_produk',
        'id_fasilitator',
        'nama_pelatihan',
        'image',
        'file',
        'tanggal_mulai',
        'tanggal_selesai',
        'tanggal_posting',
        'tanggal_batasan',
        'deskripsi_pelatihan'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function peserta(){
        return $this->hasMany(peserta_pelatihan_test::class);
    }
    public function tema(){
        return $this->belongsTo(tema::class);
    }
    public function jenis_produk(){
        return $this->belongsTo(Produk::class);
    }
    public function fasilitator_pelatihan(){
        return $this->belongsTo(fasilitator_pelatihan_test::class);
    }
    public function pelatihanuser(){
        return $this->belongsTo(pelatihanuser::class);
    }
    public function rentang_usia(){
        return $this->belongsTo(rentang_usia::class, 'id_rentang_usia');
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_mulai'])->translatedFormat('l, d F Y');
    }

}
