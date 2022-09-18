<?php

namespace App\Http\Controllers;

use App\Models\DetalleDevolucion;
use Illuminate\Http\Request;
use App\Models\Credito;
use App\Models\Medicamento;
use App\Models\DetalleIngreso;
use App\Models\Devolucion;
use App\Models\IngresoMedicamento;
use App\Models\Proveedor;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rules\Exists;

class DetalleDevolucionController extends Controller
{

    public function index(Devolucion $devolucion)
    {
        $ingresos =  DetalleIngreso::with(['ingresoMedicamento.credito.proveedor','medicamento'])->get();
        $medVen = $ingresos->map(function ($item) {
            $date =  Carbon::parse($item->fechaVenc);
            $fechaAntes = $item->ingresoMedicamento->credito->proveedor->plazoDevolucion;
            $endDate = $date->subDay($fechaAntes );
            $ahora =  now();
            if($endDate <= $ahora){
                return $item;
            }
        });
        $filtered = $medVen->filter(function ($value) {
            return $value !=null;
        });
        $detalle_dev =  DetalleDevolucion::where('devolucion_id',$devolucion->id)->get();
        return  view('devolucion.detalle', compact('filtered', 'devolucion','detalle_dev'));
    }
    public function store(Request $request, Devolucion $devolucion, DetalleIngreso $id_detalle_ingreso)
    {
        $ingresos =  DetalleIngreso::with(['ingresoMedicamento.credito.proveedor','medicamento'])->get();
        $medVen = $ingresos->map(function ($item) {
            $date =  Carbon::parse($item->fechaVenc);
            $fechaAntes = $item->ingresoMedicamento->credito->proveedor->plazoDevolucion;
            $endDate = $date->subDay($fechaAntes );
            $ahora =  now();
            if($endDate <= $ahora){
                return $item;
            }
        });
        $filtered = $medVen->filter(function ($value) {
            return $value !=null;
        });
        $existe =  DetalleDevolucion::where('devolucion_id',$devolucion->id)->where('detalle_ingreso_id',$id_detalle_ingreso->id)->get();
        $cantidad = count($existe);
        if($cantidad ==0){
            $detalledev =  new DetalleDevolucion();
            $detalledev->detalle_ingreso_id = $id_detalle_ingreso->id;
            $detalledev->devolucion_id = $devolucion->id;
            $detalledev->cantidad = 1;
            $detalledev->save();
            
        }
        return redirect()->route('devolucion.detalle',$devolucion);
    }
    public function show(DetalleDevolucion $detalleDevolucion)
    {
        
    }
    public function update(Request $request, Devolucion $devolucion, DetalleDevolucion $detalle_dev)
    {
        try{
            DetalleDevolucion::destroy($detalle_dev->id);
            return redirect()->route('devolucion.detalle',$devolucion);
            
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
    public function destroy(DetalleDevolucion $detalleDevolucion)
    {
        
    }
}
