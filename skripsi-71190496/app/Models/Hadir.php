<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hadir extends Model
{
    protected $table = 'presensi';
    protected $primaryKey = 'id_presensi'; 
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_pelatihan', 
        'tanggal_presensi',
        'status'
        // 'image',
        // 'id_gender',
        // 'id_organisasi',
        // 'nama_organisasi',
        // 'formFile',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function pelatihan(){
        return $this->belongsTo(pelatihan::class, 'id_pelatihan');
    }
    
    public function jenis_organisasi(){
        return $this->belongsTo(jenis_organisasi::class);
    }

    public function userPresensi()
    {
        return $this->hasMany(UserPresensi::class, 'id_presensi', 'id_presensi');
    }
}
