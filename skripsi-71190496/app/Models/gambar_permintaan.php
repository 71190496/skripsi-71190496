<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gambar_permintaan extends Model
{
    use HasFactory;
    protected $table = 'gambar_permintaan';
    protected $fillable = ['path', 'id_permintaan']; // Sesuaikan dengan atribut yang Anda butuhkan

    public function permintaan()
    {
        return $this->belongsTo(permintaan::class, 'id');
    }
}
