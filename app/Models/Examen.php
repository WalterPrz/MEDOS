<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Examen extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'fecha',
        'paciente',
        'numBoleta',
        'edad',
        'generoExamen'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detaExa(){
        return $this->hasOne(DetaExa::class);
    }

    public function detaHeces(){
        return $this->hasOne(DetaHeces::class);
    }

    public function detaHemo(){
        return $this->hasOne(DetaHemo::class);
    }

    public function detaOrina(){
        return $this->hasOne(DetaOrina::class);
    }

    public function detaSangui(){
        return $this->hasOne(DetaSangui::class);
    }
}
