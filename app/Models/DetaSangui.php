<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetaSangui extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id',
        'glucosaSangui',
        'colesterol',
        'trigliceridos',
        'nitrogenoUreico',
        'creatinina',
        'observacionesSangui',
    ];

    public function examen()
    {
        return $this->belongsTo(Examen::class);
    }
}
