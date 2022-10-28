<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expediente;
use App\Models\ReferenciaExterna;

class ReferenciaExternaController extends Controller
{
    public function index()
    {
        $expedientes = Expediente::all();
        return view('refext.index', compact('expedientes'));
    }

    public function create(Expediente $expediente)
    { 
        return view('refext.create', compact('expediente'));
    }
    public function store(Request $request, Expediente $expediente)
    {
        try{
            //obtenemos el campo file definido en el formulario
            $file = $request->file('archivo');

            //obtenemos el nombre del archivo
            $nombre = $file->getClientOriginalName();

            $referenciaExterna = new ReferenciaExterna();
            $referenciaExterna->idExpediente = $expediente->id;
            $referenciaExterna->nombreReferencia = $nombre;
            $referenciaExterna->ruta = $nombre;
            $request->file('archivo')->store('public'); 
            $referenciaExterna->save();
            return redirect()->route('refext.index');
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

}
