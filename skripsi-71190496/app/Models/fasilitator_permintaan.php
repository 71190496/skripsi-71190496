<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fasilitator_permintaan extends Model
{
    use HasFactory;
    protected $table = 'fasilitator_permintaan';
    protected $primaryKey = 'id';
    protected $fillable = ['id_fasilitator','id_permintaan'];
    // public $timestamps = false;

    public function permintaan()
    {
        return $this->belongsTo(permintaan::class, 'id_permintaan','id_permintaan');
    }

    public function fasilitator_pelatihan()
    {
        return $this->hasMany(fasilitator_pelatihan_test::class, 'id_fasilitator','id_fasilitator');
    }
}
