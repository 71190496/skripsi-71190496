<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form_evaluasi_konsultasi extends Model
{
    use HasFactory;
    protected $table = 'form_evaluasi_konsultasis';
    protected $primaryKey = 'id';
    protected $fillable = ['content'];
}
