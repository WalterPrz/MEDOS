<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use App\Models\Medicamento;
use App\Models\Venta;
use Illuminate\Http\Request;
use App\Http\Requests\DetalleVentaRequest;
class DetalleVentaController extends Controller
{
    public function index(Venta $venta, Request $request)
    {
        $detalle_venta = DetalleVenta::where('venta_id',$venta->id)->get();
        $total = 0;
        foreach ($detalle_venta as $key) {
           $total = $total+ ( $key->cantidad_venta *  $key->medicamento->precio_venta);
        }
        $total =number_format($total,2);
        $nombre_comercial = $request->get('nombre_comercial');
        if($nombre_comercial){
            $medicamentos = Medicamento::where('nombre_comercial','LIKE',"%$nombre_comercial%")->get();
            return view('venta.detalle',compact('detalle_venta', 'medicamentos','venta','total'));
        }else{
            $medicamentos = Medicamento::all();
            return view('venta.detalle',compact('detalle_venta', 'medicamentos','venta','total'));
        }
        $medicamentos = Medicamento::all();
        
    }
    public function store(Request $request, Venta $venta, Medicamento $medicamento)
    {
        try{
            $existe =  DetalleVenta::where('venta_id',$venta->id)->where('medicamento_id',$medicamento->id)->get();
            $cantidad = count($existe);
            if($cantidad>0){
                $detalle_venta = DetalleVenta::find($existe[0]->id);
                $detalle_venta->cantidad_venta = ($detalle_venta->cantidad_venta) + 1;
                $detalle_venta->save();
            }else{
                $detalle_venta =  new DetalleVenta();
                $detalle_venta->cantidad_venta = 1;
                $detalle_venta->ganancia = 0.00;
                $detalle_venta->venta_id = $venta->id;
                $detalle_venta->medicamento_id=$medicamento->id;
                $detalle_venta->save();
            }
            return redirect()->route('venta.detalle',$venta);
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
    public function show(DetalleVenta $detalleVenta)
    {

    }
    public function update(DetalleVentaRequest $request, Venta $venta, String $detalleVenta)
    {
        try{
            $detalleVenta =  DetalleVenta::find($detalleVenta);
            $detalleVenta->cantidad_venta = $request->cantidad_venta;
            $detalleVenta->save();
            return redirect()->route('venta.detalle',$venta);
            
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
    public function destroy(Venta $venta,DetalleVenta $detalleVenta)
    {
        try{
            $detalleVenta->forceDelete();
            return redirect()->route('venta.detalle',$venta);
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
