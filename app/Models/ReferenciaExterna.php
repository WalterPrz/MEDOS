<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ReferenciaExterna extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'ruta',
        'nombreReferencia',
    ];
}
        'idExpediente',
        'ruta',
        'nombreReferencia'
    ];

}
