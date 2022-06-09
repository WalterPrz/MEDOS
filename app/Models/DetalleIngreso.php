<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleIngreso extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'cantidadIngreso',
        'precioCompra',
        'descuentoIngreso',
        'fechaVenc',
        'precioCompraUnidad',
        'precioVentaUnidad'
    ];
    public function ingresoMedicamento()
    {
        return $this->belongsToMany(IngresoMedicamento::class);
    }
    public function medicamento()
    {
        return $this->belongsToMany(Medicamento::class);
    }
}
