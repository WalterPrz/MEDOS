<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IngresoMedicamento extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'fechaIngreso'
    ];
    public function credito()
    {
        return $this->belongsTo(Credito::class);
    }
    public function detalleIngreso()
    {
        return $this->hasMany(DetalleIngreso::class);
    }
}
