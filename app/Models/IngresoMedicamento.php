<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IngresoMedicamento extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'fechaIngreso',
        'cantidad_ingreso',
        'precio_compra',
        'descuento_ingreso',
        'fecha_vencimiento',
        'precio_compra_unidad',
        'precio_venta_unidad',
    ];
    public function medicamento()
    {
        return $this->belongsTo(Medicamento::class);
    }
    
    public function credito()
    {
        return $this->belongsTo(Credito::class);
    }
    public function detalleIngreso()
    {
        return $this->hasMany(DetalleIngreso::class);
    }
    public function scopeFechaIngreso($query, $fechaIngreso){
        if($fechaIngreso){
            return $query->where('fechaIngreso',$fechaIngreso);
        }
    }
}
