<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use DateTime;
use PhpParser\Node\Stmt\Const_;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::where('estado',true)->get();
        return view('venta.index', compact('ventas'));
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
        return VentaController::index();
    }
    public function destroy(Venta $venta)
    {
        //
    }
}
