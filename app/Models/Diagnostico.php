<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
=======



>>>>>>> AA19012
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
<<<<<<< HEAD
        return $this->belongsTo(expediente::class);
    }
}
=======
        return $this->belongsTo(Expediente::class);
    }
}
>>>>>>> AA19012
