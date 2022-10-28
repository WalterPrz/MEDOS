<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventarioController extends Controller
{
    public function index(Request $request)
    {
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
        return view('inventario.index',compact('inventarios'));
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
