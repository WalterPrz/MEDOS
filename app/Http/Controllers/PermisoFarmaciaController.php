<?php

namespace App\Http\Controllers;
use App\Models\PermisoFarmacia;
use Illuminate\Http\Request;
use App\Http\Requests\PermisoFarmaciaRequest;

class PermisoFarmaciaController extends Controller
{
    public function index()
    {
        $permisoFarmacias = PermisoFarmacia::all();
        return view('permisoFarmacia.index', compact('permisoFarmacias'));
    }
    public function store(PermisoFarmaciaRequest $request)
    {
        try{
            $permiso = new PermisoFarmacia();
            $permiso->nombrePermisoFarm = $request->nombrePermisoFarm;
            $permiso->monto = $request->monto;

            $permiso->save();
            return redirect()->route('permisoFarmacia.index');
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
    public function show(PermisoFarmacia $permiso)
    {
        try{
            return view('permisoFarmacia.edit', compact('permiso'));
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function update(PermisoFarmaciaRequest $request, PermisoFarmacia $permiso)
    {
        try{

            $permiso->nombrePermisoFarm = $request->nombrePermisoFarm;
            $permiso->monto = $request->monto;
            $permiso->save();
            return redirect()->route('permisoFarmacia.index');
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
    public function destroy(PermisoFarmacia $permiso)
    {
        $permiso->delete();
        return redirect()->route('permisoFarmacia.index');
    }

}
