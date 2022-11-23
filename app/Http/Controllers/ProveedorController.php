<?php

namespace App\Http\Controllers;
use App\Models\Medicamento;
use App\Models\DetalleIngreso;
use App\Models\IngresoMedicamento;
use Illuminate\Support\Carbon;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use App\Http\Requests\ProveedorRequest;
class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
       $proveedors = Proveedor::all();
       
        if($filtered->count()>0 ){
            $existe = true;
            return view('proveedor.index', compact('proveedors', 'existe'));
        }else{
            $existe = false;
            return view('proveedor.index', compact('proveedors', 'existe'));
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProveedorRequest $request)
    {
        try{
            $proveedor = new Proveedor();
            $proveedor->nombreProveedor = $request->nombreProveedor;
            $proveedor->telefonoProveedor = $request->telefonoProveedor;
            $proveedor->nombreVendedor = $request->nombreVendedor;
            $proveedor->telefonoVendedor = $request->telefonoVendedor;
            $proveedor->plazoDevolucion = $request->plazoDevolucion;

            $proveedor->save();
            return redirect()->route('proveedor.index');
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        try{
            return view('proveedor.edit', compact('proveedor'));
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(ProveedorRequest $request, Proveedor $proveedor)
    {
        try{

            $proveedor->nombreProveedor = $request->nombreProveedor;
            $proveedor->telefonoProveedor = $request->telefonoProveedor;
            $proveedor->nombreVendedor = $request->nombreVendedor;
            $proveedor->telefonoVendedor = $request->telefonoVendedor;
            $proveedor->plazoDevolucion = $request->plazoDevolucion;
            $proveedor->save();
            return redirect()->route('proveedor.index');
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return redirect()->route('proveedor.index');
    }
}
