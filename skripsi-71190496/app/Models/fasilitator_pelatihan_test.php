<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fasilitator_pelatihan_test extends Model
{
    use HasFactory;
    protected $table = 'fasilitator_pelatihan_tests';
    protected $fillable = [
        'nama_fasilitator',
        'tempat_tgl_lahir',
        'email_fasilitator',
        'nomor_telepon',
        'alamat',
        'id_gender',
        'id_internal_eksternal',
        'asal_lembaga',
        'body'
    ];
    public function internal_eksternal(){
        return $this->belongsTo(internal_eksternal::class);
    }
    public function gender(){
        return $this->belongsTo(gender::class);
    }
}
