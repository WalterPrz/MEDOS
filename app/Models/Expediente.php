<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
=======

>>>>>>> AA19012
class Expediente extends Model
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
<<<<<<< HEAD
=======
    public function diagnostico()
    {
        return $this->hasMany(Diagnostico::class);
    }
>>>>>>> AA19012
}
