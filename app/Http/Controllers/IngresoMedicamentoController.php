<?php

namespace App\Http\Controllers;
use App\Models\Medicamento;
use App\Models\DetalleIngreso;
use App\Models\IngresoMedicamento;

use App\Models\Proveedor;
use Illuminate\Support\Carbon;
use App\Models\Credito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\IngresoMedicamentoRequest;
class IngresoMedicamentoController extends Controller
{
    public function index()
    {
        //
    }
    public function create(Request $request)
    {
        $ingresos =  DetalleIngreso::with(['ingresoMedicamento.credito.proveedor','medicamento','detalleDevolucion', 'medicamento.detalleventas.venta'])->get();
        
        $medVen = $ingresos->map(function ($item) {
           $date =  Carbon::parse($item->fechaVenc);
           $cantidad = $item->cantidadIngreso ;
           if($item->ingresoMedicamento->credito != null){
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
           }

       });
       $filtered = $medVen->filter(function ($value) {
           return $value !=null;
       });
     




        $ampe1= "%";
        $fechaIngre = $request->get('fechaIngreso');
        $fecha = $ampe1.''.$fechaIngre;
        $fechaIngreso = $fecha.''.$ampe1;
        $ingresoMedicamentos = DB::select(
            "SELECT a.id, nombreProveedor,fechaIngreso FROM ingreso_medicamentos a
            INNER JOIN creditos b ON a.credito_id=b.id
            INNER JOIN proveedors c ON b.proveedor_id = c.id
            WHERE fechaIngreso LIKE ? ORDER BY a.id;", [$fechaIngreso]
        );
        $creditos = Credito::all();
        $proveedors=Proveedor::all();
        if($filtered->count()>0 ){

            $existe = true;
            return view('IngresoMedicamento.create', compact('ingresoMedicamentos','creditos','proveedors','existe'));
       }else{
        
            $existe = false;
            return view('IngresoMedicamento.create', compact('ingresoMedicamentos','creditos','proveedors','existe'));
       }
    }
    public function store(IngresoMedicamentoRequest $request)
    {
        try{
            $plazoProvee = Proveedor::find($request->proveedor);

            $credito = new Credito();
            $credito->proveedor_id = $request->proveedor;
            $credito->plazo = $plazoProvee->plazoDevolucion;
            $credito->fechaCreacion = date('Y-m-d');
            $credito->save();

            $ingreso = new IngresoMedicamento();
            $ingreso->credito_id = $credito->id;
            $ingreso->fechaIngreso = date('Y-m-d');
            $ingreso->save();

            return redirect()->route('ingresomed.detalle', [$ingreso, $credito]);
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
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
