<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gambar_konsultasi extends Model
{
    use HasFactory;
    protected $table = 'gambar_konsultasis';
    protected $fillable = ['path', 'id_konsultasi']; // Sesuaikan dengan atribut yang Anda butuhkan

    public function konsultasi()
    {
        return $this->belongsTo(konsultasi::class, 'id');
    }
}
