<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kontak extends Model
{
    use HasFactory;
    protected $table = 'peserta_kontak';
    protected $fillable = [
        'nama_peserta',
        'email_peserta',
        'subjek',
        'pesan',
    ];

    public function admin_kontak(){
        return $this->belongsTo(admin_kontak::class);
    }
}
