<?php

namespace App\Http\Controllers;

use App\Models\DetaHeces;
use App\Models\DetaHemo;
use App\Models\DetaOrina;
use App\Models\DetaSangui;
use App\Models\Examen;
use App\Models\Expediente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetaSanguiController extends Controller
{
    public function edit(Expediente $expediente, Examen $examen, int $idTipoExamen){
        $idPaciente = $expediente->id;
        if ($examen->tipoExamen == "Sanguineo") {
            $detaSangui = DetaSangui::find($idTipoExamen);
            return view('examen.detasangui', compact('examen', 'idPaciente', 'detaSangui'));
        }
    }

    public function update(Request $request, Examen $examen, DetaSangui $detaSangui){

        $examen->user_id = Auth::user()->id;
        $examen->expediente_id = $request->idPaciente;
        $examen->fecha = $request->fecha;
        $examen->numBoleta = $request->numBoleta;
        $examen->edad = $request->edad;
        $examen->generoExamen = $request->generoExamen;
        $examen->tipoExamen = $request->tipoExamen;

        $examen->save();

        if ($examen->save()) {
            //if ($examen->tipoExamen == "Sanguineo") {
            $detaSangui->examen_id = $examen->id;
            $detaSangui->glucosaSangui = $request->glucosaSangui;
            $detaSangui->colesterol = $request->colesterol;
            $detaSangui->trigliceridos = $request->trigliceridos;
            $detaSangui->nitrogenoUreico = $request->nitrogenoUreico;
            $detaSangui->creatinina = $request->creatinina;
            $detaSangui->observacionesSangui = $request->observacionesSangui;
            $detaSangui->save();
           // }
        }

        return redirect('/examen/paciente/' . $request->idPaciente);

    }
}