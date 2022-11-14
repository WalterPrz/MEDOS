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

class ExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Expediente $id)
    {
        $idPaciente = $id->id;
        $nombrePaciente = $id->nombrePaciente;
        $examenes = Examen::with(['detaExa', 'detaHeces', 'detaHemo', 'detaOrina', 'detaSangui'])->where('expediente_id', $id->id)->get();
        return view('examen.index', compact('nombrePaciente', 'examenes', 'idPaciente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Expediente $id)
    {
        $idPaciente = $id->id;
        return view('examen.create', compact('idPaciente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $examen = new Examen();
        $examen->user_id = Auth::user()->id;
        $examen->expediente_id = $request->idPaciente;
        $examen->fecha = $request->fecha;
        $examen->numBoleta = $request->numBoleta;
        $examen->edad = $request->edad;
        $examen->generoExamen = $request->generoExamen;
        $examen->tipoExamen = $request->tipoExamen;

        $examen->save();

        if ($examen->save()) {
            if ($examen->tipoExamen == "Sanguineo") {
                $detaSangui = new DetaSangui();
                $detaSangui->examen_id = $examen->id;
                $detaSangui->glucosaSangui = $request->glucosaSangui;
                $detaSangui->colesterol = $request->colesterol;
                $detaSangui->trigliceridos = $request->trigliceridos;
                $detaSangui->nitrogenoUreico = $request->nitrogenoUreico;
                $detaSangui->creatinina = $request->creatinina;
                $detaSangui->observacionesSangui = $request->observacionesSangui;
                $detaSangui->save();
                if (!$detaSangui->save()) {
                    $examen->delete();
                }
            } else if ($examen->tipoExamen == "Hemograma") {
                $detaHemo = new DetaHemo();
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
                if (!$detaHemo->save()) {
                    $examen->delete();
                }
            } else if ($examen->tipoExamen == "Heces") {
                $detaHeces = new DetaHeces();
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
                if (!$detaHeces->save()) {
                    $examen->delete();
                }
            } else if ($examen->tipoExamen == "Orina") {
                $detaOrina = new DetaOrina();
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
                if (!$detaOrina->save()) {
                    $examen->delete();
                }
            }
        }
        return redirect('/examen/paciente/' . $request->idPaciente);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function show(Examen $examen)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function edit(Expediente $expediente, Examen $examen, int $idTipoExamen)
    {
        /*$idPaciente = $expediente->id;
        if ($examen->tipoExamen == "Sanguineo") {
            $detaSangui = DetaSangui::find($idTipoExamen);
            return view('examen.edit', compact('examen', 'idPaciente', 'detaSangui'));
        } else if ($examen->tipoExamen == "Hemograma") {
            $detaHemo = DetaSangui::find($idTipoExamen);
            return view('examen.edit', compact('examen', 'idPaciente', 'detaHemo'));
        } else if ($examen->tipoExamen == "Heces") {
            $detaHeces = DetaHeces::find($idTipoExamen);
            return view('examen.edit', compact('examen', 'idPaciente', 'detaHeces'));
        } else if ($examen->tipoExamen == "Orina") {
            $detaOrina = DetaOrina::find($idTipoExamen);
            return view('examen.edit', compact('examen', 'idPaciente', 'detaOrina'));
        }*/
    }

    /*public function editSangui(Expediente $expediente, Examen $examen, int $idTipoExamen){
        $idPaciente = $expediente->id;
        if ($examen->tipoExamen == "Sanguineo") {
            $detaSangui = DetaSangui::find($idTipoExamen);
            return view('examen.editSangui', compact('examen', 'idPaciente', 'detaSangui'));
        }
    }

    public function editHemo(Expediente $expediente, Examen $examen, int $idTipoExamen){
        $idPaciente = $expediente->id;
        if ($examen->tipoExamen == "Hemograma") {
            $detaHemo = DetaHemo::find($idTipoExamen);
            return view('examen.editHemo', compact('examen', 'idPaciente', 'detaHemo'));
        }
    }

    public function editHeces(Expediente $expediente, Examen $examen, int $idTipoExamen){
        $idPaciente = $expediente->id;
        if ($examen->tipoExamen == "Heces") {
            $detaHeces = DetaHeces::find($idTipoExamen);
            return view('examen.editHeces', compact('examen', 'idPaciente', 'detaHeces'));
        }
    }

    public function editOrina(Expediente $expediente, Examen $examen, int $idTipoExamen){
        $idPaciente = $expediente->id;
        if ($examen->tipoExamen == "Orina") {
            $detaOrina = DetaOrina::find($idTipoExamen);
            return view('examen.editOrina', compact('examen', 'idPaciente', 'detaOrina'));
        }
    }*/

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    /*public function updateSangui(Request $request, Examen $examen, DetaSangui $detaSangui){

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

    public function updateHemo(Request $request, Examen $examen, DetaHemo $detaHemo){
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

    public function updateHeces(Request $request, Examen $examen, DetaHeces $detaHeces){
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

    public function updateOrina(Request $request, Examen $examen, DetaOrina $detaOrina){
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
    }*/
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expediente $expediente, Examen $examen,)
    {
        $examen->delete();
        return redirect()->route('examen.index',  $expediente);
    }
}
