<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelatihan_test extends Model
{
    use HasFactory;
    protected $table = 'pelatihan_tests';
    protected $fillable = [
        'id_tema',
        'id_jenis_produk',
        'id_fasilitator',
        'nama_pelatihan',
        'image',
        'tanggal_mulai',
        'tanggal_selesai',
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
}
