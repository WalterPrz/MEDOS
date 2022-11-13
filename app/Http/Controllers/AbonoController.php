<?php

namespace App\Http\Controllers;

use App\Http\Requests\AbonoRequest;
use App\Http\Requests\CreditoRequest;
use App\Models\Abono;
use App\Models\Credito;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AbonoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Credito $abono)
    {
        //
        try{
            $nombre = $abono->id;
            $creditos= Credito::all();
            $abonos = Abono::where('credito_id', $nombre)->get();
            return view('abono.index', compact('abonos','nombre'));

        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {
        //
        $nombre= $request;
        $max=Credito::where('id',$nombre)->get();
        foreach($max as $item){
            $maxVal=$item->saldoPendiente;
        }

        
        return view('abono.create', compact('nombre','maxVal'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AbonoRequest $request)
    {
        //

        $fecha = Carbon::now();
        try{
            $abono = new Abono();
            $credito= Credito::all();
            foreach($credito as $item){
                if($item->id==$request->credito_id){
                    $item->saldoPendiente -= $request->cantidadAbonada;
                    $item->save();
                }
            }
            $abono->credito_id = $request->credito_id;
            $abono->cantidadAbonada= $request->cantidadAbonada;
            $abono->fechaAbono = $fecha->format('Y-m-d'); 
            $abono->save();
            return redirect()->route('abono.index',$request->credito_id);
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Abono  $abono
     * @return \Illuminate\Http\Response
     */
    public function show(Abono $abono)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Abono  $abono
     * @return \Illuminate\Http\Response
     */
    public function edit(Abono $abono)
    {
        //
        try{
            $nombre=$abono->credito_id;
            $max=Credito::where('id',$nombre)->get();
            foreach($max as $item){
                $maxVal=$item->credito;
            }    
            $creditos = Credito::all();
            return view('abono.edit', compact('abono','nombre','creditos','maxVal'));
            
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Abono  $abono
     * @return \Illuminate\Http\Response
     */
    public function update(AbonoRequest $request, Abono $abono)
    {
        //
        try{
            $abonoAnterior= Abono::all();
            $credito= Credito::all();
            foreach($abonoAnterior as $item){
                if($item->id==$abono->id){
                    if($item->cantidadAbonada < $request->cantidadAbonada){
                        $valor=($request->cantidadAbonada)-($item->cantidadAbonada);
                        foreach($credito as $itemC){
                            if($itemC->id==$abono->credito_id){
                                $itemC->saldoPendiente -= $valor;
                                $itemC->save();
                            }
                        }
                    }
                    if($item->cantidadAbonada > $request->cantidadAbonada){
                        $valor=($item->cantidadAbonada)-($request->cantidadAbonada);
                        foreach($credito as $itemC){
                            if($itemC->id==$abono->credito_id){
                                $itemC->saldoPendiente += $valor;
                                $itemC->save();
                            }
                        }
                    }    
                    
                }
            }
            $abono->credito_id = $request->credito_id;
            $abono->cantidadAbonada= $request->cantidadAbonada;
            $abono->save();
            return redirect()->route('abono.index',$request->credito_id);
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Abono  $abono
     * @return \Illuminate\Http\Response
     */
    public function destroy(Abono $abono)
    {
        //
        //$creditos=Credito::where('id',$abono->credito_id)->get();
        //foreach($creditos as $item){
            $id=$abono->credito_id;
        //    if($id==$abono->credito_id){
        //        $item->saldoPendiente+=$abono->cantidadAbonada;
        //        $item->save();
        //    }
        //}
        $abono->delete();
        return redirect()->route('abono.index',$id);
    }
}
