<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evaluasi_pelatihan_konsultasi extends Model
{
    use HasFactory;
    protected $table = 'evaluasi_pelatihan_konsultasis';
    protected $primaryKey = 'id';
    protected $fillable = ['id_konsultasi'];

    public function user()
    {
        return $this->belongsTo(user::class, 'id_user');
    }

    public function konsultasi()
    {
        return $this->belongsTo(konsultasi::class, 'id_konsultasi');
    }
}
