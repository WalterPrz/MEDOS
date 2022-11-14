<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Abono extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'credito_id',
        'cantidadAbonada',
        'fechaAbono'
    ];

    public function credito()
    {
        return $this->belongsTo(Credito::class);
    }

}
