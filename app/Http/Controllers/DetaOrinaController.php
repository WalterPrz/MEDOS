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

class DetaOrinaController extends Controller
{
    public function edit(Expediente $expediente, Examen $examen, int $idTipoExamen){
        $idPaciente = $expediente->id;
        if ($examen->tipoExamen == "Orina") {
            $detaOrina = DetaOrina::find($idTipoExamen);
            return view('examen.detaorina', compact('examen', 'idPaciente', 'detaOrina'));
        }
    }

    public function update(Request $request, Examen $examen, DetaOrina $detaOrina){
        $examen->user_id = Auth::user()->id;
        $examen->expediente_id = $request->idPaciente;
        $examen->fecha = $request->fecha;
        $examen->numBoleta = $request->numBoleta;
        $examen->edad = $request->edad;
        $examen->generoExamen = $request->generoExamen;
        $examen->tipoExamen = $request->tipoExamen;

        $examen->save();

        if ($examen->save()) {
            //if ($examen->tipoExamen == "Orina") {
            $detaOrina->examen_id = $examen->id;
            $detaOrina->colorOrina = $request->colorOrina;
            $detaOrina->aspecto = $request->aspecto;
            $detaOrina->densidad = $request->densidad;
            $detaOrina->ph = $request->ph;
            $detaOrina->nitritos = $request->nitritos;
            $detaOrina->proteinas = $request->proteinas;
            $detaOrina->glucosOrina = $request->glucosOrina;
            $detaOrina->cetonicos = $request->cetonicos;
            $detaOrina->urobilinogeno = $request->urobilinogeno;
            $detaOrina->bilirrubina = $request->bilirrubina;
            $detaOrina->SangreOculta = $request->SangreOculta;
            $detaOrina->leucocitaria = $request->leucocitaria;
            $detaOrina->hemoglobinaOrina = $request->hemoglobinaOrina;
            $detaOrina->cilindros = $request->cilindros;
            $detaOrina->hematiesOrina = $request->hematiesOrina;
            $detaOrina->leucocitosOrina = $request->leucocitosOrina;
            $detaOrina->escamosas = $request->escamosas;
            $detaOrina->oxalatosCalcio = $request->oxalatosCalcio;
            $detaOrina->bacteriasOrina = $request->bacteriasOrina;
            $detaOrina->parasitologico = $request->parasitologico;
            $detaOrina->observacionesOrina = $request->observacionesOrina;
            $detaOrina->save();
            //}
        }
        return redirect('/examen/paciente/' . $request->idPaciente);
    }
    

}
