<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleVenta extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $fillable = [
        'cantidad_venta',
        'ganancia'
    ];
    public function medicamento()
    {
        return $this->belongsTo(Medicamento::class);
    }
    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }
}
