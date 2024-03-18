<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evaluasi_jawaban extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_jawaban';
    protected $table = 'evaluasi_jawabans';
    protected $fillable = ['jawaban', 'id_pertanyaan'];

    public function pertanyaan()
    {
        return $this->belongsTo(evaluasi_pertanyaan::class, 'id_pertanyaan');
    }
}
