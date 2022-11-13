<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetaHeces extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'colorHeces',
        'consistencia',
        'mucus',
        'bacteriasHeces',
        'hematiesHeces',
        'leucocitosHeces',
        'macroscopicos',
        'microscopicos',
        'trofozoitos',
        'quistes',
        'huevos',
        'larvas',
        'observacionesHeces',
    ];

    public function examen()
    {
        return $this->belongsTo(Examen::class);
    }
}