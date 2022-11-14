<?php

namespace App\Http\Controllers;

use App\Models\DetalleIngreso;
use App\Models\DetalleVenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportesController extends Controller
{

    public function GraIngresoMed()
    {

        try {

            $inventarios = DB::select(
                "SELECT nombre_comercial,presentacion,SUM(stock) AS stock
                FROM
                  (SELECT medicamento_id, SUM(cantidadIngreso) AS stock FROM detalle_ingresos GROUP BY medicamento_id
                    UNION ALL
                   SELECT  medicamento_id, -SUM(cantidad_venta) AS stock FROM detalle_ventas GROUP BY medicamento_id
                  ) as subquery INNER JOIN medicamentos ON subquery.medicamento_id = medicamentos.id
                GROUP BY medicamento_id,nombre_comercial,presentacion;"
            );


            $creditos= DB::select("SELECT b.nombreProveedor, SUM(a.saldoPendiente) AS saldoPendiente FROM creditos a INNER JOIN proveedors b ON b.id = a.proveedor_id GROUP BY a.proveedor_id;");

            $puntos = [];
            foreach ($inventarios as $inventario) {
                $puntos[] = ['name' => $inventario->nombre_comercial, 'data' => [doubleval($inventario->stock)]];
            }
            $ventas = DB::select('call ventasPorSemana');


            $puntos1 = [];
            foreach ($ventas as $venta) {
                $puntos1[] = ['name' => $venta->dia, 'data' => [doubleval($venta->cant)]];
            }

            $puntos2 = [];
            foreach ($creditos as $credito) {
                $puntos2[] = ['name' => $credito->nombreProveedor, 'data' => [doubleval($credito->saldoPendiente)]];
            }


            return view('reporte.index', ["data" => json_encode($puntos), "dataVenta" => json_encode($puntos1), "dataCredito" => json_encode($puntos2)]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
