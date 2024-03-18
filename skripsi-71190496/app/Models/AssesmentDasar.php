<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssesmentDasar extends Model
{
    use HasFactory;
    protected $table = 'assessment_dasar';

    protected $fillable = [
        'id_permintaan',
        'masalah',
        'kebutuhan',
        'materi',
    ];

    public function permintaan_pelatihan()
    {
        return $this->belongsTo(permintaan_pelatihan::class, 'id_permintaan', 'id_permintaan');
    }
}
