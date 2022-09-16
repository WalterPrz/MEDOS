<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;
use App\Http\Requests\CitaRequest;
use Illuminate\Support\Facades\Auth;


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

    public function store(CitaRequest $request){

        $cita = new Cita;
        $cita->user_id = Auth::user()->id;
        $cita->especialidad = $request->especialidad;
        $cita->paciente = $request->paciente;
        $cita->fecha_cita = $request->fecha_cita;
        $cita->hora_cita = $request->hora_cita;
        $cita->descripcion = $request->descripcion;
        $cita->estado = true;
        $cita->save();

        return redirect('/citas');
    }
}
