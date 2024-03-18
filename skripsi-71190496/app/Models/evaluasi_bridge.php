<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evaluasi_bridge extends Model
{
    use HasFactory;
    protected $table = 'evaluasi_bridges';
    protected $fillable = ['id_pertanyaan', 'id_jawaban', 'id_pelatihan'];

    public function jawabans()
    {
        return $this->hasMany(evaluasi_jawaban::class, 'id_pertanyaan');
    }

    public function pertanyaan()
    {
        return $this->belongsTo(evaluasi_pertanyaan::class, 'id_pertanyaan');
    }
}
