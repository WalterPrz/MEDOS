<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\CreditoRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Proveedor;
use App\Models\Credito;
use GuzzleHttp\Promise\Create;

class CreditoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $creditos = Credito::all();
            return view('credito.index', compact('creditos'));

        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = Proveedor::all();
        return view('credito.create', compact('proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreditoRequest $request)
    {
        $fecha = Carbon::now();
        try{
            $plazoProvee = Proveedor::find($request->proveedor_id);

            $credito = new Credito();
            $credito->proveedor_id = $request->proveedor_id;
            $credito->credito = $request->credito;
            $credito->diaPago = $request->diaPago;
            $credito->plazo = $plazoProvee->plazoDevolucion;
            $credito->saldoPendiente = $request->saldoPendiente;
            $credito->fechaCreacion = $fecha->format('Y-m-d'); 
            $credito->save();
            return redirect()->route('credito.index');
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Credito $credito)
    {
        try{
            $proveedores = Proveedor::all();
            return view('credito.edit', compact('credito','proveedores'));
            
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreditoRequest $request, Credito $credito)
    {
        try{
            $plazoProvee = Proveedor::find($request->proveedor_id);

            $credito->proveedor_id = $request->proveedor_id;
            $credito->credito = $request->credito;
            $credito->diaPago = $request->diaPago;
            $credito->plazo = $plazoProvee->plazoDevolucion;
            $credito->saldoPendiente = $request->saldoPendiente; 
            $credito->save();
            return redirect()->route('credito.index');
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Credito $credito)
    {
        $credito->delete();
        return redirect()->route('credito.index'); 
    }
}
