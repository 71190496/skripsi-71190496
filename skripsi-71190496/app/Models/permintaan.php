<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class permintaan extends Model
{
    use HasFactory;
    protected $table = 'permintaan';
    protected $primaryKey = 'id';
    // protected $dates = ['tanggal_mulai'];
    protected $fillable = [
        'id_tema', 
        'nama_pelatihan', 
        'metode_pelatihan',
        'jenis_pelatihan',
        'lokasi_pelatihan',  
        'tanggal_mulai',
        'tanggal_selesai',
        'image',
        'file',
        'deskripsi_pelatihan',
    ];

    public function peserta()
    {
        return $this->hasMany(peserta_permintaan::class, 'id_permintaan');
    }

    public function fasilitator_permintaan()
    {
        return $this->belongsToMany(fasilitator_pelatihan_test::class, 'fasilitator_permintaan', 'id_permintaan', 'id_fasilitator');
    }

    public function gambarPermintaan()
    {
        return $this->hasMany(gambar_permintaan::class, 'id_permintaan');
    }

    public function filePermintaan()
    {
        return $this->hasMany(file_permintaan::class, 'id_permintaan');
    }

    public function permintaan_pelatihan(){
        return $this->belongsTo(permintaan_pelatihan::class, 'id_permintaan');
    }
    public function rentang_usia(){
        return $this->belongsTo(rentang_usia::class);
    }
    public function informasi_pelatihan(){
        return $this->belongsTo(informasi_pelatihan::class);
    }
    
    public function gender(){
        return $this->belongsTo(gender::class);
    }
    public function jenis_organisasi(){
        return $this->belongsTo(jenis_organisasi::class);
    }
    public function kabupaten_kota(){
        return $this->belongsTo(kabupaten_kota::class);
    }
    public function provinsi(){
        return $this->belongsTo(provinsi::class);
    }
    public function negara(){
        return $this->belongsTo(negara::class);
    }
    public function pelatihan(){
        return $this->belongsTo(pelatihan_test::class);
    }
}
