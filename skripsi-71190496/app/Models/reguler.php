<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model; 
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Reguler extends Model implements HasMedia
{

    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;
    


    protected $table = 'reguler';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_pelatihan',
        // 'gambar',
        'id_tema',
        'metode_pelatihan',
        'lokasi_pelatihan',
        'fee_pelatihan',
        'kuota_peserta',
        'nama_pelatihan',
        'tanggal_mulai',
        'tanggal_selesai',
        'tanggal_pendaftaran',
        'tanggal_batas_pendaftaran',
        'deskripsi_pelatihan',
        'status',

    ];


    protected $dates = [
        'tanggal_mulai',
        'tanggal_selesai',
        'tanggal_pendaftaran',
        'tanggal_batas_pendaftaran',
        'created_at',
        'updated_at',

    ];

    public function fasilitator()
    {
        return $this->belongsToMany(fasilitator_pelatihan_test::class, 'fasilitator_reguler','id_pelatihan','id_fasilitator');
    }

    // public function pelatihan_fasilitator(){
    //     return $this->hasMany(pelatihan_fasilitator::class);
    // }

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/regulers/' . $this->getKey());
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('gambar')
            ->maxNumberOfFiles(3);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('detail_hd')
            ->width(1920)
            ->height(1080)
            ->performOnCollections('gambar')
            ->autoRegisterThumb200();
            // ->canView('media.view');
    }
}
