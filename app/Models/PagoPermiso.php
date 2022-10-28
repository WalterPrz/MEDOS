<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PagoPermiso extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'idPermisoFarmacia',
        'fechaPago'
    ];
    public function permisoFarmacia()
    {
        return $this->belongsTo(PermisoFarmacia::class,'idPermisoFarmacia');
    }
}

