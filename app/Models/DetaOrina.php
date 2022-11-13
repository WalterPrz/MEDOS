<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetaOrina extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'colorOrina',
        'aspecto',
        'densidad',
        'ph',
        'nitritos',
        'proteinas',
        'glucosOrina',
        'cetonicos',
        'urobilinogeno',
        'bilirrubina',
        'SangreOculta',
        'leucocitaria',
        'hemoglobinaOrina',
        'cilindros',
        'hematiesOrina',
        'leucocitosOrina',
        'escamosas',
        'oxalatosCalcio',
        'bacteriasOrina',
        'parasitologico',
        'observacionesOrina',
    ];

    public function examen()
    {
        return $this->belongsTo(Examen::class);
    }
}
