<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPresensi extends Model
{
    protected $table = 'user_presensi_reguler';
    protected $primaryKey = 'id_user_presensi';
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_pelatihan',
        'id_presensi', 
        // 'tanggal_presensi', 
    ];

    public function pelatihan()
    {
        return $this->belongsTo(Pelatihan::class, 'id_pelatihan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function presensi()
    {
        return $this->belongsTo(Hadir::class, 'id_presensi', 'id_presensi');
    }
    
}
