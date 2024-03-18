<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evalPeserta extends Model
{
    use HasFactory; 
    protected $table = '';
    protected $fillable = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function pelatihan(){
        return $this->belongsTo(pelatihan::class, 'id_pelatihan');
    }
    public function fasilitator_pelatihan1()
    {
        return $this->belongsTo(fasilitator_pelatihan_test::class, 'id_fasilitator1');
    }
    public function fasilitator_pelatihan2()
    {
        return $this->belongsTo(fasilitator_pelatihan_test::class, 'id_fasilitator2');
    }
    public function fasilitator_pelatihan3()
    {
        return $this->belongsTo(fasilitator_pelatihan_test::class, 'id_fasilitator3');
    }
}
