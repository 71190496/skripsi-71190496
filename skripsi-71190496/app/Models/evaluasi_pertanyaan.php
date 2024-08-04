<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evaluasi_pertanyaan extends Model
{
    use HasFactory;
    protected $table = 'evaluasi_pertanyaans';
    protected $primaryKey = 'id_pertanyaan';
    protected $fillable = ['pertanyaan', 'id_pelatihan', 'tipe'];
    // protected $fillable = ['question', 'type', 'options'];

    public function jawabans()
    {
        return $this->hasMany(evaluasi_jawaban::class, 'id_pertanyaan');
    }
    public function pelatihan()
    {
        return $this->belongsTo(pelatihan::class, 'id_pelatihan');
    }
}
