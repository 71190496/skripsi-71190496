<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class silabus_pelatihan extends Model
{
    use HasFactory;
    protected $fillable = ['judul', 'silabus'];
    // Hubungkan model dengan tabel "silabuses"
    protected $table = 'silabus_pelatihans';

    public function pelatihan()
    {
        return $this->belongsToMany(pelatihan::class, 'id_pelatihan');
    }
}
