<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin_kontak extends Model
{
    use HasFactory;
    protected $table = 'admin_kontak';
    protected $fillable = [
        'lokasi',
        'email',
        'telepon'
    ];

    public function peserta_kontak(){
        return $this->belongsTo(peserta_kontak::class);
    }
}
