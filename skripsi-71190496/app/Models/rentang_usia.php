<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class rentang_usia extends Model
{
    use HasFactory;
    protected $table = 'rentang_usias';

    public function peserta_pelatihan_test():HasMany
    {
        return $this->hasMany(peserta_pelatihan_test::class, 'id_rentang_usia');
    }
    public function pelatihan()
    {
        return $this->hasMany(pelatihan::class);
    }
}
