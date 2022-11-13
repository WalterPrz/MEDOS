<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiagnosticoRequest;
use App\Models\Diagnostico;
use App\Models\Expediente;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class DiagnosticoController extends Controller
{
    //
public function index(Request $request)
    {        
        $nombre = $request->get('texto');
        $expedientes = DB::select(
        "SELECT `id`,`nombrePaciente`, `edadPaciente`, `genero` 
        FROM `expedientes` 
        WHERE `id` = ?",[$nombre]
        );

        $diagnosticos = DB::select(
        "SELECT `peso`,`altura`,`descripcionDiagnostico`,`descripcionReceta` 
        FROM diagnosticos as subquery
        INNER JOIN expedientes 
        ON subquery.idExpediente = ?",[$nombre]

        );
        $mensaje="No existe registro";

        return view("diagnostico.index",compact('expedientes','diagnosticos','mensaje'));
    }

      public function store(DiagnosticoRequest $request)
    {

            try{
     
            $expedientes = Expediente::where('id',$request->expediente_id)->get();
            foreach($expedientes as $item){
                $nombreP = $item->nombrePaciente;
            }
            $diagnostico = new Diagnostico();
            $diagnostico->idExpediente = $request->expediente_id;
            $diagnostico->fechaDiagnostico = new DateTime();
            $diagnostico->peso= $request->peso;
            $diagnostico->altura= $request->altura;
            $diagnostico->descripcionDiagnostico = $request->descripcionDiag;
            $diagnostico->descripcionReceta = $request->receta;
            $diagnostico->save();
            return self::viewPDF($request->receta,$nombreP);

            //return redirect()->route('diagnostico.visita');
        }catch(\Exception $e){
            return $e->getMessage();
        }

 
    }

    public function show1(Diagnostico $diagnostico)
    {
        try{
            return view('diagnostico.edit', compact('diagnostico'));
        }catch(\Exception $e){
            return $e->getMessage();
        }

    }
    public function update(DiagnosticoRequest $request, Diagnostico $diagnostico)
    {
        try{
            $diagnostico->idExpediente=$request->expediente_id;
            $diagnostico->fechaDiagnostico = new DateTime();
            $diagnostico->peso= $request->peso;
            $diagnostico->altura= $request->altura;
            $diagnostico->descripcionDiagnostico = $request->descripcionDiag;
            $diagnostico->descripcionReceta = $request->receta;
            $diagnostico->save();
            return redirect()->route('diagnostico.visita');
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public static function viewPDF($request,$nombrePaciente){
        $valor=$request;
        $paciente=$nombrePaciente;
        return view('diagnostico.pdf',compact('valor','paciente'));
    }

}
