<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'nombre',
        'descripcion'
    ];
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
