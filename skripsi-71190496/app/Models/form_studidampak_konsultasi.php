<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form_studidampak_konsultasi extends Model
{
    use HasFactory;
    protected $table = 'form_studidampak_konsultasis';
    protected $primaryKey = 'id';
    protected $fillable = ['content'];
}
