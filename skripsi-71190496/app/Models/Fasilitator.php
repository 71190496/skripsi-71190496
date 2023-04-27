<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fasilitator extends Model
{
    protected $fillable = [
        'nama_fasilitator',
        'tempat_tgl_lahir',
        'email_fasilitator',
        'no_telepon',
        'alamat',
        'gender',
        'internal_eksternal'
    ];
    public function internal_eksternal(){
        return $this->belongsTo(internal_eksternal::class);
    }
}
