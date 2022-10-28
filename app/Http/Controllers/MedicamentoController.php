<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicamentoRequest;
use App\Models\Categoria;
use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    public function index()
    {
        try{
            $medicamentos = Medicamento::all();
            return view('medicamento.index', compact('medicamentos'));

        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function create()
    {
        //
        $categorias = Categoria::all();
        return view('medicamento.create', compact('categorias'));

    }

    public function store(MedicamentoRequest $request)
    {
        //
        try{
            $medicamento = new Medicamento();
            $medicamento->nombre_comercial = $request->nombre_comercial;
            $medicamento->categoria_id = $request->categoria_id;
            $medicamento->presentacion= $request->presentacion;
            $medicamento->componentes= $request->componentes;
            $medicamento->precio_venta= $request->precio_venta;

            $medicamento->save();
            return redirect()->route('medicamento.index');
        }catch(\Exception $e){
            return $e->getMessage();
        }

    }

    public function edit(Medicamento $medicamento)
    {
        //
        try{
            $categorias = Categoria::all();
            return view('medicamento.edit', compact('medicamento','categorias'));
            
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function show(Medicamento $medicamento)
    {
        //
    }
    public function update(MedicamentoRequest $request, Medicamento $medicamento)
    {
        //
        try{
            $medicamento->nombre_comercial = $request->nombre_comercial;
            $medicamento->categoria_id = $request->categoria_id;
            $medicamento->presentacion= $request->presentacion;
            $medicamento->componentes= $request->componentes;
            $medicamento->precio_venta= $request->precio_venta;
            $medicamento->save();
            return redirect()->route('medicamento.index');
        }catch(\Exception $e){
            return $e->getMessage();
        }

    }
    public function destroy(Medicamento $medicamento)
    {
        //
        $medicamento->delete();
        return redirect()->route('medicamento.index'); 
    }
}
