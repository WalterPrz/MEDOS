<?php

namespace App\Http\Controllers;

use App\Models\Devolucion;
use Illuminate\Http\Request;
use App\Models\Credito;
use App\Models\Medicamento;
use App\Models\DetalleIngreso;
use App\Models\IngresoMedicamento;
use App\Models\Proveedor;
use Illuminate\Support\Carbon;
class DevolucionController extends Controller
{

    public function index()
    {
        $devoluciones = Devolucion::all();
        return  view('devolucion.index', compact('devoluciones'));
    }

    public function store(Request $request)
    {
        $devolucion = new Devolucion();
        $devolucion->fechaDevolucion =  now();
        $devolucion->estado = false;
        $devolucion->save();
        return redirect()->route('devolucion.detalle',$devolucion);
    }

    public function show(Devolucion $devolucion)
    {
        
    }

    public function update(Request $request, Devolucion $devolucion)
    {
        $devolucion->estado =  true;
        $devolucion->save();
        return  redirect()->route('devolucion.index');
    }

    public function destroy(Devolucion $devolucion)
    {
        try{
            $devoluciones = Devolucion::all();
            Devolucion::destroy($devolucion->id);
            return redirect()->route('devolucion.index');
            
        }catch(\Exception $e){
            return $e->getMessage();
        }
        
    }
}
