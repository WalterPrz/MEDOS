<?php

namespace App\Http\Controllers;

use App\Models\Credito;
use App\Models\IngresoMedicamento;
use Illuminate\Http\Request;

class IngresoMedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$proveedores=Proveedores::pluck('id','nombreProveedor');
        //return view('IngresoMedicamento.create', compact('proveedores'));
        return view('IngresoMedicamento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $credito = new Credito();
            $credito->idProveedor = $request->proveedor;
            $credito->save();

            $ingreso = new IngresoMedicamento();
            $ingreso->credito_id = $credito->id;
            $ingreso->fechaIngreso = date('d-m-Y');
            $ingreso->save();
            return redirect()->route('ingresomed.detalle',$ingreso);
        } catch(\Exception $e){
            return $e->getMessage();
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
