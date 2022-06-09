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
    public function creditos()
    {
        return $this->hasMany(Credito::class);
    }
}
