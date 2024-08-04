<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evaluasi_materi extends Model
{
    use HasFactory;
    protected $table = 'evaluasi_materi';
    protected $primaryKey = 'id';

    public function pertanyaan()
    {
        return $this->belongsTo(evaluasi_pertanyaan::class, 'id_pertanyaan');
    }

    public function jawaban()
    {
        return $this->belongsTo(evaluasi_jawaban::class, 'id_jawaban');
    }
}
