<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
class Categoria extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nombre',
        'nombre_comercial',
        'categoria_id',
        'presentacion',
        'componentes',
        'precio_venta'
    ];
    public function medicamentos()
    {
        return $this->hasMany(Medicamento::class);
    }
}
