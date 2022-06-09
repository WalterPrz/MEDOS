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
    public function index()
    {
                
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
    public function store(Request $request, IngresoMedicamento $ingreso, Medicamento $medicamento)
    {
        try{
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
