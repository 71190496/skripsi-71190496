<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evaluasi_jawaban_permintaan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_jawaban';
    protected $table = 'evaluasi_jawaban_permintaan';
    protected $fillable = ['jawaban', 'id_pertanyaan'];

    public function pertanyaan()
    {
        return $this->belongsTo(evaluasi_pertanyaan_permintaan::class, 'id_pertanyaan');
    }
}
