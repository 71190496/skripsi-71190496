<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class survey_pelatihan_reguler extends Model
{
    use HasFactory;
    protected $table = 'survey_pelatihan_regulers';
    protected $primaryKey = 'id';
    protected $fillable = ['id_pelatihan'];

    public function user()
    {
        return $this->belongsTo(user::class, 'id_user');
    }

    public function pelatihan()
    {
        return $this->belongsTo(pelatihan::class, 'id_pelatihan');
    }

    public function provinsi()
    {
        return $this->belongsTo(provinsi::class, 'id_provinsi');
    }

    public function kabupaten_kota()
    {
        return $this->belongsTo(kabupaten_kota::class, 'id_kabupaten_kota');
    }
}
