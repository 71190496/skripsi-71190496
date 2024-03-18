<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    protected $table = 'jenis_organisasi';

    public function konsultasi()
    {
        return $this->hasMany(konsultasi::class, 'id');
    }
}
