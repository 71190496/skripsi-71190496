<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class file_konsultasi extends Model
{
    use HasFactory;
    protected $table = 'file_konsultasis';
    protected $fillable = ['path','id_konsultasi'];

    public function konsultasi()
    {
        return $this->belongsTo(konsultasi::class, 'id_konsultasi');
    }
}
