<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evaluasi extends Model
{
    use HasFactory;
    protected $table = 'evaluasi_reguler';
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(user::class, 'id_user');
    }

    public function fasilitator()
    {
        return $this->belongsTo(fasilitator_pelatihan_test::class, 'id_fasilitator');
    }
}
