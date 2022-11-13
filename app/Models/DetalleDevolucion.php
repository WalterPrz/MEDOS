<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleDevolucion extends Model
{
    use HasFactory;
    protected $fillable = [
        'cantidad',
    ];
    public function detalleIngreso()
    {
        return $this->belongsTo(DetalleIngreso::class);
    }
    public function devolucion()
    {
        return $this->belongsTo(Devolucion::class);
    }
}
