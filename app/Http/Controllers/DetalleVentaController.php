<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use App\Models\Medicamento;
use App\Models\Venta;
use Illuminate\Http\Request;

class DetalleVentaController extends Controller
{
    public function index(Venta $venta)
    {
        $detalle_venta = DetalleVenta::where('venta_id',$venta->id)->get();
        $medicamentos = Medicamento::all();
        return view('venta.detalle',compact('detalle_venta', 'medicamentos','venta'));
    }
    public function store(Request $request, Venta $venta, Medicamento $medicamento)
    {
        $detalle_venta =  new DetalleVenta();
        $detalle_venta->cantidad_venta = 1;
        $detalle_venta->ganancia = 0.00;
        $detalle_venta->venta_id = $venta->id;
        $detalle_venta->medicamento_id=$medicamento->id;
        $detalle_venta->save();
        return redirect()->route('venta.detalle',$venta);
    }
    public function show(DetalleVenta $detalleVenta)
    {
        //
    }
    public function update(Request $request, DetalleVenta $detalleVenta)
    {
        //
    }
    public function destroy(DetalleVenta $detalleVenta)
    {
        //
    }
}
