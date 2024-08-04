<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form_studidampak_reguler extends Model
{
    use HasFactory;
    protected $table = 'form_studidampak_regulers';
    protected $primaryKey = 'id';
    protected $fillable = ['content'];
}
