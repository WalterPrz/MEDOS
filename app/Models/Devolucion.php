<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Devolucion extends Model
{
    use HasFactory,softDeletes;
    protected $fillable = [
        'montoDescuento',
        'fechaDevolucion',
        'estado',
    ];
    public function detalleDevolucion()
    {
        return $this->hasMany(DetalleDevolucion::class);
    }

}
