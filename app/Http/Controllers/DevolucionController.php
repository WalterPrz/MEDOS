<?php

namespace App\Http\Controllers;

use App\Models\Devolucion;
use Illuminate\Http\Request;
use App\Models\Credito;
use App\Models\Medicamento;
use App\Models\DetalleIngreso;
use App\Models\DetalleDevolucion;
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
        $detalle_dev =  DetalleDevolucion::where('devolucion_id',$devolucion->id)->get();
        $descuento = 0;
        foreach ($detalle_dev as $item) {
           $a =  DetalleIngreso::where('id',$item->detalle_ingreso_id)->first();
           $descuento =  $descuento + ($item->cantidad * $a->precioCompraUnidad );

        }
        $devolucion->montoDescuento = $descuento;
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
