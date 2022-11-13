<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetaHemo extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'globRojos',
        'hematocrito',
        'hemoglobinaHemo',
        'vcm',
        'hbcm',
        'chbcm',
        'plaquetas',
        'vn',
        'reticulocitos',
        'eritrosedimentacion',
        'globBlancos',
        'neutrofilosBanda',
        'neutrofilosSegmen',
        'eosinofilios',
        'basofilios',
        'linfocitos',
        'monocitos',
        'observacionesHemo',
    ];

    public function examen()
    {
        return $this->belongsTo(Examen::class);
    }
}
