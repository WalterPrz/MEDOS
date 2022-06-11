<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Proveedor extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nombreProveedor',
        'telefonoProveedor',
        'nombreVendedor',
        'telefonoVendedor',
        'plazoDevolucion'
    ];
//    public function medicamentos()
  //  {
 //       return $this->hasMany(Medicamento::class);
  //  }
  public function ingreso_medicamentos()
    {
        return $this->hasMany(IngresoMedicamento::class,'ingreso_medicamentos');
    }
    public function credito()
    {
        return $this->hasMany(Credito::class);
    }
}
