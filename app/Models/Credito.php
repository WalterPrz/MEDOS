<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Credito extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'idProveedor',
        'credito',
        'diaPago',
        'plazo',
        'saldoPendiente',
        'fechaCreacion'
    ];
    /*public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }*/
    public function ingresoMedicamento()
    {
        return $this->hasMany(IngresoMedicamento::class);
    }
    /*public function abono()
    {
        return $this->hasMany(Abono::class);
    }*/

    //Los comentados serviran cuando esos modelos ya esten creados
}
