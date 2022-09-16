<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::all();
        return view('citas.index',  ['citas' => $citas]);
    }
    public function create(){
        return view('citas.create');
    }
}
