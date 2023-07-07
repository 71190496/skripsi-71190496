<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class informasi_pelatihan extends Model
{
    use HasFactory;
    protected $table = 'informasi_pelatihan';

    public function peserta_pelatihan_test()
{
    return $this->hasMany(peserta_pelatihan_test::class);
}

}
