<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'nombre_comercial',
        'categoria_id',
        'presentacion',
        'componentes',
        'precio_venta'

    ];
    public function ingreso_medicamentos()
    {
        return $this->hasMany(IngresoMedicamento::class);
    }
    public function detalleIngreso()
    {
        return $this->hasMany(DetalleIngreso::class,'detalle_ingresos');
    }
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    public function detalleventas()
    {
        return $this->hasMany(DetalleVenta::class);
    }
    public function ventas()
    {
        return $this->belongsToMany(Venta::class,'detalle_ventas');
    }
}
