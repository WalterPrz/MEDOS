<?php

namespace App\Http\Controllers;
use App\Models\PagoPermiso;
use Illuminate\Http\Request;
use App\Models\PermisoFarmacia;
use App\Http\Requests\PagoPermisoRequest;
use Illuminate\Support\Facades\DB;

class PagoPermisoController extends Controller
{
    public function index()
    {
        $pagoPermiso = PagoPermiso::all();
        return view('pagoPermiso.index', compact('pagoPermiso'));
    }
    public function create(){

        $permiso = PermisoFarmacia::all();
        return view('pagoPermiso.create', compact('permiso'));
    }
    public function store(PagoPermisoRequest $request)
    {
        try{
            $pago = new PagoPermiso();
            $pago->idPermisoFarmacia = $request->idPermisoFarmacia;
            $pago->fechaPago = $request->fechaPago;
            $pago->save();
            return redirect()->route('pagoPermiso.index');
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
    public function show(PagoPermiso $permiso)
    {
        try{
            return view('pagoPermiso.edit', compact('permiso'));
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
    public function update(PagoPermisoRequest $request, pagoPermiso $permiso)
    {
        try{

            $permiso->monto = $request->fechaPago;
            $permiso->save();
            return redirect()->route('pagoPermiso.index');
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
    public function destroy(PagoPermiso $permiso)
    {
        $permiso->delete();
        return redirect()->route('pagoPermiso.index');
    }
}
