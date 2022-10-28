<?php

namespace App\Http\Controllers;

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
        $proveedors = Proveedor::all();
        return view('proveedor.index', compact('proveedors'));
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
