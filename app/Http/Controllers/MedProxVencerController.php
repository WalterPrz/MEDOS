<?php

namespace App\Http\Controllers;

use App\Models\Credito;
use Illuminate\Http\Request;
use App\Models\Medicamento;
use App\Models\DetalleIngreso;
use App\Models\IngresoMedicamento;
use App\Models\Proveedor;
use Illuminate\Support\Carbon;
class MedProxVencerController extends Controller
{

    public function index()
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
        return view('inventario.proxvencer',  compact('filtered'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

