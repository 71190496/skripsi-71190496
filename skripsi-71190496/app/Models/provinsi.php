<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provinsi extends Model
{
    public $table = 'provinsi';
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function peserta()
    {
        return $this->hasMany(peserta_pelatihan_test::class, 'id_provinsi');
    }
    public function negara()
    {
        return $this->hasMany(negara::class);
    }
    public function kabupaten_kota()
    {
        return $this->hasMany(kabupaten_kota::class);
    }
    public function konsultasi()
    {
        return $this->hasMany(konsultasi::class, 'id');
    }
}
