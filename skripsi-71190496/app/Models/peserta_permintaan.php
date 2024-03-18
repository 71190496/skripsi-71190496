<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peserta_permintaan extends Model
{
    use HasFactory;
    protected $table = 'peserta_permintaan';
    protected $primaryKey = 'id';
    protected $fillable = [ 
        'id_permintaan', 
        'nama_peserta',
        'email_peserta', 
    ];

    public function permintaan(){
        return $this->belongsTo(permintaan::class, 'id_permintaan');
    }

    public function permintaan_pelatihan(){
        return $this->belongsTo(permintaan_pelatihan::class, 'id_permintaan');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
