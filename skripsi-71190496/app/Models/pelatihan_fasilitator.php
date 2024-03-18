<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelatihan_fasilitator extends Model
{
    use HasFactory;
    protected $table = 'pelatihan_fasilitators';
    protected $primaryKey = 'id_pelatihan_fasilitator';
    protected $fillable = ['id_fasilitator','id_pelatihan','judul_materi'];
    public $timestamps = false;
  

    public function pelatihan()
    {
        return $this->belongsTo(pelatihan::class, 'id_pelatihan','id_pelatihan');
    }

    public function fasilitator_pelatihan()
    {
        return $this->hasMany(fasilitator_pelatihan_test::class, 'id_fasilitator','id_fasilitator');
    }

    // public function reguler()
    // {
    //     return $this->belongsTo(reguler::class);
    // }
}
