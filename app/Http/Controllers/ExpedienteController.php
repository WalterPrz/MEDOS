<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expediente;
use App\Http\Requests\ExpedienteRequest;
use Carbon\Carbon;

class ExpedienteController extends Controller
{
    public function index()
    {
        $expedientes = Expediente::all();
        return view('expediente.index', compact('expedientes'));
    }

    public function create()
    {
        $fecha = Carbon::now();
        $fechaFormato = $fecha->format('d-m-Y'); 
        return view('expediente.create', compact('fechaFormato'));
    }
    public function store(ExpedienteRequest $request)
    {
        $fecha = Carbon::now();
        $fechaFormato = $fecha->format('d-m-Y');
        try{
            $expediente = new Expediente();
            $expediente->nombrePaciente = $request->nombrePaciente;
            $expediente->edadPaciente = $request->edadPaciente;
            $expediente->genero = $request->genero;
            $expediente->telefonoPaciente = $request->telefonoPaciente;
            $expediente->alergias = $request->alergias;
            $expediente->fechaApertura = $fecha->format('Y-m-d'); 
            $expediente->save();
            return redirect()->route('expediente.index');
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function show(Expediente $expediente)
    {
        try{
            return view('expediente.edit', compact('expediente'));
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
    public function update(ExpedienteRequest $request, Expediente $expediente)
    {
        try{
            $expediente->nombrePaciente = $request->nombrePaciente;
            $expediente->edadPaciente = $request->edadPaciente;
            $expediente->genero = $request->genero;
            $expediente->telefonoPaciente = $request->telefonoPaciente;
            $expediente->alergias = $request->alergias;
            $expediente->save();
            return redirect()->route('expediente.index');
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function destroy(Expediente $expediente)
    {
        $expediente->delete();
        return redirect()->route('expediente.index'); 
    }
}
