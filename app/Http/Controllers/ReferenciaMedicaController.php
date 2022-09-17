<?php

namespace App\Http\Controllers;

use App\Models\ReferenciaMedica;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class ReferenciaMedicaController extends Controller
{
    //

      public function store(Request $request)
    {

          try{
            $referencias = new ReferenciaMedica();
            $referencias->nombreMedico = $request->nombreMedico;
            $referencias->nombrePaciente = $request->nombrePaciente;
            $referencias->fecha= $request->fecha;
            $referencias->descripcion= $request->descripcion;

            $referencias->save();
            return redirect()->route('referenciaMedica.index');
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

        public function index()
    {        

       // return view('index', compact('users'));
        return view("referenciaMedica.form");
    }

    public function show()
    {

    }
    public function update()
    {

    }


}
