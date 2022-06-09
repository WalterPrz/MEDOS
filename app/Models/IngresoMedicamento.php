<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IngresoMedicamento extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'idCredito',
        'fechaIngreso'
    ];
    public function creditos()
    {
        return $this->hasMany(Credito::class);
    }
}
