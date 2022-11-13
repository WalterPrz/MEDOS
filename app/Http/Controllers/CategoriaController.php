<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriaRequest;
class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categoria.index', compact('categorias'));
    }
    public function store(CategoriaRequest $request)
    {
        try{
            $categoria = new Categoria();
            $categoria->nombre = $request->nombre;
            $categoria->descripcion = $request->descripcion;
            $categoria->save();
            return redirect()->route('categoria.index');
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function show( Categoria $categoria)
    {
        try{
            return view('categoria.edit', compact('categoria'));
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
    public function update(CategoriaRequest $request, Categoria $categoria)
    {
        try{
            
            $categoria->nombre =  $request->nombre;
            $categoria->descripcion= $request->descripcion;
            $categoria->save();
            return redirect()->route('categoria.index');
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categoria.index'); 
    }
}
