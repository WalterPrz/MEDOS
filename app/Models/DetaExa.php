<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetaExa extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
       'nombreExamen',
       'valorExamen',
    ];

    public function examen()
    {
        return $this->belongsTo(Examen::class);
    }
}
