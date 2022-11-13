<?php

namespace App\Http\Controllers\Admin;
use App\Models\Medicamento;
use App\Models\DetalleIngreso;
use App\Models\IngresoMedicamento;

use App\Models\Proveedor;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    //
    public function index(){
        $ingresos =  DetalleIngreso::with(['ingresoMedicamento.credito.proveedor','medicamento','detalleDevolucion', 'medicamento.detalleventas.venta'])->get();
        
        $medVen = $ingresos->map(function ($item) {
           $date =  Carbon::parse($item->fechaVenc);
           $cantidad = $item->cantidadIngreso ;

           $fechaAntes = $item->ingresoMedicamento->credito->proveedor->plazoDevolucion;
           $endDate = $date->subDay($fechaAntes );
           $ahora =  now();

           $item->cantidad =$cantidad;
           $arrayVentas = $item->medicamento->detalleventas;
           foreach ($arrayVentas as $x) {
               if($x->venta->estado ==1){
                   $item['cantidad'] = $item['cantidad'] - $x->cantidad_venta;
               }
           }
           if($endDate <= $ahora && count($item->detalleDevolucion) == 0 && $item->cantidad >0){
               return $item;
           }
       });
       $filtered = $medVen->filter(function ($value) {
           return $value !=null;
       });
     
       if($filtered->count()>0 ){

            $existe = true;
            return view('admin.bienvenida.index', compact('existe'));
       }else{
        
            $existe = false;
            return view('admin.bienvenida.index', compact('existe'));
       }
    }
}
