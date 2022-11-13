<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use DateTime;
use PhpParser\Node\Stmt\Const_;
use SebastianBergmann\Environment\Console;

class VentaController extends Controller
{
    public function index(Request $request)
    {
        $fecha_venta = $request->get('fecha_venta');
        $ventas = Venta::where('estado',true)
        ->fechaVenta($fecha_venta)
        ->get();
        $ventasSinCompletar = Venta::where('estado',false)->get();
        return view('venta.index', compact('ventas','ventasSinCompletar','request'));
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

    }
    public function update(Request $request, Venta $venta)
    {
        $venta->estado =  true;
        $venta->save();
        return  redirect()->route('venta.index');
    }
    public function destroy(Venta $venta)
    {
        //
    }
}
