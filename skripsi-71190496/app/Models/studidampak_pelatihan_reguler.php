<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studidampak_pelatihan_reguler extends Model
{
    use HasFactory;
    protected $table = 'studidampak_pelatihan_regulers';
    protected $primaryKey = 'id';
    protected $fillable = ['id_pelatihan'];

    public function user()
    {
        return $this->belongsTo(user::class, 'id_user');
    }

    public function pelatihan()
    {
        return $this->belongsTo(pelatihan::class, 'id_pelatihan');
    }
}
