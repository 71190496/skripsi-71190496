<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_organisasi extends Model
{
    use HasFactory;
    protected $table = 'jenis_organisasis';

    public function peserta_pelatihan_test()
{
    return $this->hasMany(peserta_pelatihan_test::class);
}
}
