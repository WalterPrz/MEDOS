<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Medicamento;
use App\Models\DetalleIngreso;
use App\Models\IngresoMedicamento;

use App\Models\Proveedor;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventarioController extends Controller
{
    public function index(Request $request)
    {
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
     













        $ampe1= "%";
        $nombre = $request->get('buscarpor');
        $nombreD = $ampe1.''.$nombre;
        $nombreMedicamento = $nombreD.''.$ampe1;
        $inventarios = DB::select(
            "SELECT nombre_comercial,presentacion,SUM(stock) AS stock
            FROM
              (SELECT medicamento_id, SUM(cantidadIngreso) AS stock FROM detalle_ingresos GROUP BY medicamento_id
                UNION ALL
               SELECT  medicamento_id, -SUM(cantidad_venta) AS stock FROM detalle_ventas GROUP BY medicamento_id
              ) as subquery INNER JOIN medicamentos ON subquery.medicamento_id = medicamentos.id
              WHERE nombre_comercial LIKE ?
            GROUP BY medicamento_id,nombre_comercial,presentacion;", [$nombreMedicamento]
        );
        if($filtered->count()>0 ){

            $existe = true;
            return view('inventario.index',compact('inventarios','existe'));
       }else{
        
            $existe = false;
            return view('inventario.index',compact('inventarios','existe'));
       }

        
    }
    public function store(Request $request)
    {
        try{
            $inventario = new Inventario();
            $inventario->nombre_comercial = $request->nombre_comercial;
            $inventario->presentacion = $request->presentacion;
            $inventario->stock = $request->stock;

            $inventario->save();
            
            return redirect()->route('proveedor.index');
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }


}
