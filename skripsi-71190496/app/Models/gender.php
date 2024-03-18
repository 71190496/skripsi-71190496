<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class gender extends Model
{
    use HasFactory;
    protected $table = 'genders';

    public function peserta(): HasMany
    {
        return $this->hasMany(peserta_pelatihan_test::class, 'id_gender');
    }
    public function fasilitator_pelatihan(): HasMany
    {
        return $this->hasMany(fasilitator_pelatihan_test::class, 'id_gender');
    }
}
