<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
class Diagnostico extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nombrePaciente',
        'edadPaciente',
        'genero',
        'telefonoPaciente',
        'alergias',
        'fechaApertura'
    ];
}