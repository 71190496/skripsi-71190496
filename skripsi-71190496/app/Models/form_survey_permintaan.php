<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form_survey_permintaan extends Model
{
    use HasFactory;
    protected $table = 'form_survey_permintaans';
    protected $primaryKey = 'id';
    protected $fillable = ['content'];
}
