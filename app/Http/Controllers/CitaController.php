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
    /*public function create(){

        $citasConfirmadas = Cita::orderBy('fecha_cita', 'asc')
            ->where('estado', 2)
            ->get();
        $citasPendientes= Cita::orderBy('fecha_cita', 'asc')
            ->where('estado', 1)
            ->get();
        $citasCanceladas = Cita::orderBy('fecha_cita', 'asc')
            ->where('estado', 0)
            ->get();

        $citasConfirmadas = Cita::where('estado',2)
        ->fechaCita($fecha_cita_confirmada)
        ->get();

        $citasPendientes = Cita::where('estado',1)
        ->fechaCita($fecha_cita_pendiente)
        ->get();

        $citasCanceladas= Cita::where('estado',0)
        ->fechaCita($fecha_cita_cancelada)
        ->get();
        $citas = Cita::all();
        return view('citas.index', compact('citasConfirmadas', 'citasPendientes', 'citasCanceladas'));
    }*/
    public function create(){

        /*horas = ['8:00', '8:30', '9:00', '9:30', '10:00', '10:30', '11:30'];
        $citasReservadas = Cita::where('fecha_cita',)
        ->where('hora_cita', )
        -exists();*/
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

    public function confirm(Cita $cita){
        $cita->estado = 2;
        $cita->save();

        return redirect('/citas');
    }

}
