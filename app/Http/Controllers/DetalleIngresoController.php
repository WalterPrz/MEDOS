<?php

namespace App\Http\Controllers;

use App\Models\DetalleIngreso;
use App\Models\Medicamento;
use App\Models\IngresoMedicamento;
use Illuminate\Http\Request;

class DetalleIngresoController extends Controller
{
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
    public function create(IngresoMedicamento $ingreso)
    {
        try{
            $detalleIngreso = DetalleIngreso::where('ingreso_medicamento_id',$ingreso->id)->get();
            $medicamentos = Medicamento::all();
            return view('DetalleIngreso.create', compact('detalleIngreso','ingreso','medicamentos'));
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
    public function store(Request $request, IngresoMedicamento $ingreso)
    {
        try{
            $detalleIngreso =  new DetalleIngreso();
            $detalleIngreso->ingreso_medicamento_id = $ingreso->id;
            $detalleIngreso->medicamento_id = $request->medicamento;
            $detalleIngreso->cantidadIngreso = $request->cantidadIngreso;
            $detalleIngreso->precioCompra = $request->precioCompra;
            $detalleIngreso->descuentoIngreso = $request->descuentoIngreso;
            $detalleIngreso->fechaVenc = $request->fechaVenc;
            $detalleIngreso->precioCompraUnidad = $request->precioCompraUnidad;
            $detalleIngreso->precioVentaUnidad = $request->precioVentaUnidad;
            $detalleIngreso->save();

            return redirect()->route('ingresomed.detalle',$ingreso);
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
    public function edit(IngresoMedicamento $ingreso, DetalleIngreso $detalleIngreso)
    {
        $medicamentos = Medicamento::all();
        return view('DetalleIngreso.edit', compact('detalleIngreso','ingreso','medicamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IngresoMedicamento $ingreso, DetalleIngreso $detalleIngreso)
    {

        try{
            $detalleIngreso->ingreso_medicamento_id = $ingreso->id;
            $detalleIngreso->medicamento_id = $request->medicamento;
            $detalleIngreso->cantidadIngreso = $request->cantidadIngreso;
            $detalleIngreso->precioCompra = $request->precioCompra;
            $detalleIngreso->descuentoIngreso = $request->descuentoIngreso;
            $detalleIngreso->fechaVenc = $request->fechaVenc;
            $detalleIngreso->precioCompraUnidad = $request->precioCompraUnidad;
            $detalleIngreso->precioVentaUnidad = $request->precioVentaUnidad;
            $detalleIngreso->update();

            return redirect()->route('ingresomed.detalle',$ingreso);
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
    public function destroy(IngresoMedicamento $ingreso, DetalleIngreso $detalleIngreso)
    {
        $detalleIngreso->delete();
        return redirect()->route('ingresomed.detalle',$ingreso);
    }
}
