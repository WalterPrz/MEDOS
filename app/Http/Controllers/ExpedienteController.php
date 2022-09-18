<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expediente;
use App\Models\ReferenciaExterna;
use Illuminate\Support\Facades\DB;

class ExpedienteController extends Controller
{
    public function index()
    {
        $expedientes = Expediente::all();
        return view('expediente.index', compact('expedientes'));
    }
    public function show($id)
    {
        $expedientes = DB::select(
            "SELECT id, nombrePaciente,edadPaciente, genero,telefonoPaciente,alergias,
            CAST(fechaApertura as varchar(10)) as fecha FROM expedientes
            WHERE id = ?;", [$id]
        );

        $diagnosticos = DB::select(
            "SELECT a.id, CAST(fechaDiagnostico as varchar(10)) as fecha, b.nombrePaciente,
            a.peso, a.altura, a.descripcionDiagnostico, a.descripcionReceta FROM diagnosticos a
            INNER JOIN expedientes b ON a.idExpediente=b.id
            WHERE a.idExpediente = ?;", [$id]
        );

        $documentos = DB::select(
            "SELECT * FROM referencia_externas
            WHERE idExpediente = ?;", [$id]
        );

        return view('expediente.show', compact('expedientes','diagnosticos','documentos'));
    }
    public function download($uuid)
    {
        $book = ReferenciaExterna::where('id', $uuid)->firstOrFail();
        $pathToFile = storage_path( $book->nombreReferencia);
        // return response()->download($pathToFile);
        return response()->file($pathToFile);
    }

}
