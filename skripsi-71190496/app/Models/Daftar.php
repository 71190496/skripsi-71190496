<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
    use HasFactory;

    public function pelatihan()
{
    return $this->belongsTo(pelatihan::class, 'id');
}

public function user()
{
    return $this->belongsTo(User::class, 'id');
}

}
