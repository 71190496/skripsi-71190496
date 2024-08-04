<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studidampak_pelatihan_permintaan extends Model
{
    use HasFactory;
    protected $table = 'studidampak_pelatihan_permintaans';
    protected $primaryKey = 'id';
    protected $fillable = ['id_permintaan'];

    public function user()
    {
        return $this->belongsTo(user::class, 'id_user');
    }

    public function permintaan()
    {
        return $this->belongsTo(permintaan::class, 'id_permintaan');
    }
}
