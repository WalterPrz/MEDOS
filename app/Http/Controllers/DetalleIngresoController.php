<?php

namespace App\Http\Controllers;

use App\Models\Credito;
use App\Models\DetalleIngreso;
use App\Models\Medicamento;
use App\Models\IngresoMedicamento;
use Illuminate\Http\Request;
use App\Http\Requests\DetalleIngresoMedicamentoRequest;

class DetalleIngresoController extends Controller
{
    public $cantCredito = 0;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IngresoMedicamento $ingreso)
    {
        $detalle_ingreso = DetalleIngreso::where('ingreso_medicamento_id',$ingreso->id)->get();
        $medicamentos = Medicamento::all();
        return view('DetalleIngreso.index',compact('detalle_ingreso', 'medicamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(IngresoMedicamento $ingreso, Credito $credit)
    {
        try{
            $detalleIngreso = DetalleIngreso::where('ingreso_medicamento_id',$ingreso->id)->get();
            $medicamentos = Medicamento::all();
            return view('DetalleIngreso.create', compact('ingreso','credit','detalleIngreso','medicamentos'));
        } catch(\Exception $e){
            $e->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DetalleIngresoMedicamentoRequest $request, IngresoMedicamento $ingreso, Credito $credit)
    {
        try{
            $detalleIngreso =  new DetalleIngreso();
            $detalleIngreso->ingreso_medicamento_id = $ingreso->id;
            $detalleIngreso->medicamento_id = $request->medicamento;
            $detalleIngreso->cantidadIngreso = $request->cantidadIngreso;
            $detalleIngreso->descuentoIngreso = $request->descuentoIngreso;
            $detalleIngreso->precioCompra = $request->precioCompra - $request->descuentoIngreso;
            $detalleIngreso->fechaVenc = $request->fechaVenc;
            $detalleIngreso->precioCompraUnidad = $request->precioCompraUnidad;
            $detalleIngreso->precioVentaUnidad = $request->precioVentaUnidad;
            $detalleIngreso->save();

            $credit->credito = $credit->credito + (($request->precioCompra - $request->descuentoIngreso) * $request->cantidadIngreso);
            $credit->saldoPendiente = $credit->saldoPendiente + (($request->precioCompra - $request->descuentoIngreso) * $request->cantidadIngreso);
            $credit->save();

            return redirect()->route('ingresomed.detalle', [$ingreso, $credit]);
        } catch(\Exception $e){
            $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(IngresoMedicamento $ingreso, DetalleIngreso $detalleIngreso, Credito $credit)
    {
        $medicamentos = Medicamento::all();
        return view('DetalleIngreso.edit', compact('ingreso','detalleIngreso','credit','medicamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DetalleIngresoMedicamentoRequest $request, IngresoMedicamento $ingreso, DetalleIngreso $detalleIngreso, Credito $credit)
    {

        try{
            //primero le quito al total de credito, la suma de credito que daba el producto en particular
            $credit->credito = $credit->credito - ($detalleIngreso->precioCompra * $detalleIngreso->cantidadIngreso);
            $credit->saldoPendiente = $credit->saldoPendiente - ($detalleIngreso->precioCompra * $detalleIngreso->cantidadIngreso);
                
            //Luego ingreso la nueva suma
            $credit->credito = $credit->credito + (($request->precioCompra - $request->descuentoIngreso) * $request->cantidadIngreso);
            $credit->saldoPendiente = $credit->saldoPendiente + (($request->precioCompra - $request->descuentoIngreso) * $request->cantidadIngreso);
            $credit->save();

            //Se guardan los nuevos datos del detalle del ingreso
            $detalleIngreso->ingreso_medicamento_id = $ingreso->id;
            $detalleIngreso->medicamento_id = $request->medicamento;
            $detalleIngreso->cantidadIngreso = $request->cantidadIngreso;
            $detalleIngreso->descuentoIngreso = $request->descuentoIngreso;
            $detalleIngreso->precioCompra = $request->precioCompra - $request->descuentoIngreso;
            $detalleIngreso->fechaVenc = $request->fechaVenc;
            $detalleIngreso->precioCompraUnidad = $request->precioCompraUnidad;
            $detalleIngreso->precioVentaUnidad = $request->precioVentaUnidad;
            $detalleIngreso->update();
     
            return redirect()->route('ingresomed.detalle', [$ingreso, $credit]);
        } catch(\Exception $e){
            $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(IngresoMedicamento $ingreso, DetalleIngreso $detalleIngreso, Credito $credit)
    {
        //Le quito al total de credito, la suma de credito que daba el producto en particular
        $credit->credito = $credit->credito - ($detalleIngreso->precioCompra * $detalleIngreso->cantidadIngreso);
        $credit->saldoPendiente = $credit->saldoPendiente - ($detalleIngreso->precioCompra * $detalleIngreso->cantidadIngreso);
        $credit->save();

        $detalleIngreso->delete();
        return redirect()->route('ingresomed.detalle', [$ingreso, $credit]);
    }
}
