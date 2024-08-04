<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evaluasi_pelatihan_permintaan extends Model
{
    use HasFactory;
    protected $table = 'evaluasi_pelatihan_permintaans';
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
