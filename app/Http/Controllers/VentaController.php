<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use DateTime;
class VentaController extends Controller
{
    public function index()
    {
        return view('venta.index');
    }
    public function store(Request $request)
    {
        $venta = new Venta();
        $venta->fecha_venta =  new DateTime();
        $venta->estado = false;
        $venta->save();
        return redirect()->route('venta.detalle',$venta);
    }
    public function show(Venta $venta)
    {
        //
    }
    public function update(Request $request, Venta $venta)
    {
        //
    }
    public function destroy(Venta $venta)
    {
        //
    }
}
