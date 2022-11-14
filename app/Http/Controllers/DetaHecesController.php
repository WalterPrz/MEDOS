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

class DetaHecesController extends Controller
{
    public function edit(Expediente $expediente, Examen $examen, int $idTipoExamen){
        $idPaciente = $expediente->id;
        if ($examen->tipoExamen == "Heces") {
            $detaHeces = DetaHeces::find($idTipoExamen);
            return view('examen.detaheces', compact('examen', 'idPaciente', 'detaHeces'));
        }
    }

    public function update(Request $request, Examen $examen, DetaHeces $detaHeces){
        $examen->user_id = Auth::user()->id;
        $examen->expediente_id = $request->idPaciente;
        $examen->fecha = $request->fecha;
        $examen->numBoleta = $request->numBoleta;
        $examen->edad = $request->edad;
        $examen->generoExamen = $request->generoExamen;
        $examen->tipoExamen = $request->tipoExamen;

        $examen->save();

        if ($examen->save()) {
            //if ($examen->tipoExamen == "Heces") {
            $detaHeces->examen_id = $examen->id;
            $detaHeces->colorHeces = $request->colorHeces;
            $detaHeces->consistencia = $request->consistencia;
            $detaHeces->mucus = $request->mucus;
            $detaHeces->bacteriasHeces = $request->bacteriasHeces;
            $detaHeces->hematiesHeces = $request->hematiesHeces;
            $detaHeces->leucocitosHeces = $request->leucocitosHeces;
            $detaHeces->macroscopicos = $request->macroscopicos;
            $detaHeces->microscopicos = $request->microscopicos;
            $detaHeces->trofozoitos = $request->trofozoitos;
            $detaHeces->quistes = $request->quistes;
            $detaHeces->huevos = $request->huevos;
            $detaHeces->larvas = $request->larvas;
            $detaHeces->observacionesHeces = $request->observacionesHeces;
            $detaHeces->save();
            //}
        }
        return redirect('/examen/paciente/' . $request->idPaciente);
    }
}