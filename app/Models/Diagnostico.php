<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
class Diagnostico extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'idExpediente',
        'fechaDiagnostico',
        'peso',
        'altura',
        'descripcionDiagnostico',
        'descripcionReceta'
    ];
    public function expediente()
    {
        return $this->belongsTo(Expediente::class);
    }
}
