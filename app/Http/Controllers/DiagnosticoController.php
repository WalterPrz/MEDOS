<?php

namespace App\Http\Controllers;

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
        return view("diagnostico.index",compact('expedientes','diagnosticos'));
    }

      public function store(Request $request)
    {

            try{
            $diagnostico = new Diagnostico();
            $diagnostico->idExpediente = $request->idExpediente;
            $diagnostico->fechaDiagnostico = new DateTime();
            $diagnostico->peso= $request->peso;
            $diagnostico->altura= $request->altura;
            $diagnostico->descripcionDiagnostico = $request->descripcionDiag;
            $diagnostico->descripcionReceta = $request->receta;

            $diagnostico->save();
            return redirect()->route('diagnostico.index');
        }catch(\Exception $e){
            return $e->getMessage();
        }

 
    }

    public function show()
    {

    }
    public function update()
    {

    }

    public function viewPDF(Request $request){
        
        $var = $request->recetaPDF;
        $pdf = PDF::loadHTML($var."<h1>xd</h1>");
        return $pdf->stream();
    }

}
