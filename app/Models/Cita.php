<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
class Cita extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'especialidad',
        'paciente',
        'fecha_cita',
        'hora_cita',
        'descripcion',
        'estado'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
