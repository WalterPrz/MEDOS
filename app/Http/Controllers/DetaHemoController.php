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

class DetaHemoController extends Controller
{

    public function edit(Expediente $expediente, Examen $examen, int $idTipoExamen){
        $idPaciente = $expediente->id;
        if ($examen->tipoExamen == "Hemograma") {
            $detaHemo = DetaHemo::find($idTipoExamen);
            return view('examen.detahemo', compact('examen', 'idPaciente', 'detaHemo'));
        }
    }

    public function update(Request $request, Examen $examen, DetaHemo $detaHemo){
        $examen->user_id = Auth::user()->id;
        $examen->expediente_id = $request->idPaciente;
        $examen->fecha = $request->fecha;
        $examen->numBoleta = $request->numBoleta;
        $examen->edad = $request->edad;
        $examen->generoExamen = $request->generoExamen;
        $examen->tipoExamen = $request->tipoExamen;

        $examen->save();

        if ($examen->save()) {
            //if ($examen->tipoExamen == "Hemograma") {
            $detaHemo->examen_id = $examen->id;
            $detaHemo->globRojos = $request->globRojos;
            $detaHemo->hematocrito = $request->hematocrito;
            $detaHemo->hemoglobinaHemo = $request->hemoglobinaHemo;
            $detaHemo->vcm = $request->vcm;
            $detaHemo->hbcm = $request->hbcm;
            $detaHemo->chbcm = $request->chbcm;
            $detaHemo->plaquetas = $request->plaquetas;
            $detaHemo->vn = $request->vn;
            $detaHemo->reticulocitos = $request->reticulocitos;
            $detaHemo->eritrosedimentacion = $request->eritrosedimentacion;
            $detaHemo->globBlancos = $request->globBlancos;
            $detaHemo->neutrofilosBanda = $request->neutrofilosBanda;
            $detaHemo->neutrofilosSegmen = $request->neutrofilosSegmen;
            $detaHemo->eosinofilios = $request->eosinofilios;
            $detaHemo->basofilios = $request->basofilios;
            $detaHemo->linfocitos = $request->linfocitos;
            $detaHemo->monocitos = $request->monocitos;
            $detaHemo->observacionesHemo = $request->observacionesHemo;
            $detaHemo->save();
            //}
        }

        return redirect('/examen/paciente/' . $request->idPaciente);
    }
}