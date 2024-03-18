<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gambar_pelatihan extends Model
{
    use HasFactory;
    protected $fillable = ['path', 'id_pelatihan']; // Sesuaikan dengan atribut yang Anda butuhkan

    public function pelatihan()
    {
        return $this->belongsTo(pelatihan::class, 'id_pelatihan');
    }
}
