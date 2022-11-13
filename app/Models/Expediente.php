<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
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

    public function diagnostico()
    {
        return $this->hasMany(Diagnostico::class);
    }
    public function refext()
    {
        return $this->hasMany(ReferenciaExterna::class);
    }
    public function Examenes()
    {
        return $this->hasMany(Examen::class);
    }
}
