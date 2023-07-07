<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postingan extends Model
{
    use HasFactory;
    protected $table = 'postingans';
    protected $fillable=[
        'judul_postingan',
        'tanggal_postingan',
        'isi_postingan',
        'image'
    ];

    
}
