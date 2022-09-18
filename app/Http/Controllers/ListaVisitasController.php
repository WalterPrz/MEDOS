<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Diagnostico;
use App\Models\Expediente;
class ListaVisitasController extends Controller
{
    public function index(Request $request)
    {

        $ampe1= "%";
        $fechaDiag = $request->get('fechaDiagnostico');
        $fecha = $ampe1.''.$fechaDiag;
        $fechaDiagnostico = $fecha.''.$ampe1;
        $visitas = DB::select(
            "SELECT a.id, fechaDiagnostico, b.nombrePaciente FROM diagnosticos a
            INNER JOIN expedientes b ON a.idExpediente=b.id
            WHERE CAST(fechaDiagnostico as varchar(10)) LIKE ? ORDER BY a.id;", [$fechaDiagnostico]
        );
        $expedientes = Expediente::all();
        return view('diagnostico.visita', compact('visitas','expedientes'));


    }
    public function show($id)
    {
        $diagnostico = DB::select(
            "SELECT a.id, CAST(fechaDiagnostico as varchar(10)) as fecha, b.nombrePaciente,
            a.peso, a.altura, a.descripcionDiagnostico, a.descripcionReceta FROM diagnosticos a
            INNER JOIN expedientes b ON a.idExpediente=b.id
            WHERE a.id = ?;", [$id]
        );
     //   $diagnostico = Diagnostico::find($id);
        return view('diagnostico.show', compact('diagnostico'));
    }
}
