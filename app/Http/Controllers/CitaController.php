<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;
use App\Http\Requests\CitaRequest;
use Illuminate\Support\Facades\Auth;


class CitaController extends Controller
{
    public function index(Request $request)
    {
        $fecha_cita_confirmada= $request->get('fecha_cita_confirmada');
        $fecha_cita_cancelada= $request->get('fecha_cita_cancelada');
        $fecha_cita_pendiente= $request->get('fecha_cita_pendiente');
        $citasConfirmadas = Cita::all()
            ->where('estado', 2);
        $citasPendientes= Cita::all()
            ->where('estado', 1);
        $citasCanceladas = Cita::all()
            ->where('estado', 0);

        $citasCanceladasFiltradas = Cita::where('estado',0)
        ->fechaCita($fecha_cita_cancelada)
        ->get();
        $citas = Cita::all();
        return view('citas.index', compact('citasConfirmadas', 'citasPendientes', 'citasCanceladas', 'citasCanceladasFiltradas'));
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
        $cita->estado = 1;
        $cita->save();

        return redirect('/citas');
    }

    public function show(Cita $cita)
    {
        return view('citas.show', ['cita' => $cita]);
    }

    public function edit(Cita $cita){
        return view ('citas.edit', ['cita' => $cita]);
    }

    public function update(CitaRequest $request, Cita $cita)
    {
        $cita->especialidad = $request->especialidad;
        $cita->paciente = $request->paciente;
        $cita->fecha_cita = $request->fecha_cita;
        $cita->hora_cita = $request->hora_cita;
        $cita->descripcion = $request->descripcion;
        $cita->estado = $request->estado;
        $cita->save();

        return redirect('/citas');
    }

    public function cancel(Cita $cita){
        $cita->estado = 0;
        $cita->save();

        return redirect('/citas');
    }
}
