<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evaluasi_pertanyaan_permintaan extends Model
{
    use HasFactory;
    protected $table = 'evaluasi_pertanyaan_permintaan';
    protected $primaryKey = 'id_pertanyaan';
    protected $fillable = ['pertanyaan', 'id_permintaan', 'tipe'];
    // protected $fillable = ['question', 'type', 'options'];

    public function jawabans()
    {
        return $this->hasMany(evaluasi_jawaban_permintaan::class, 'id_pertanyaan');
    }
    public function permintaan()
    {
        return $this->belongsTo(permintaan::class, 'id_permintaan');
    }
}
