<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'fecha_venta',
    ];
    public function medicamentos()
    {
        return $this->belongsToMany(Medicamento::class,'detalle_ventas');
    }
    public function scopeFechaVenta($query, $fecha_venta){
        if($fecha_venta){
            return $query->where('fecha_venta',$fecha_venta);
        }
    }
}
