<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermisoFarmacia extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nombrePermisoFarm',
        'monto'
    ];
    public function pagoPermiso()
    {
        return $this->hasMany(PagoPermiso::class);
    }
}

