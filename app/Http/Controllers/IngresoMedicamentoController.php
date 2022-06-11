<?php

namespace App\Http\Controllers;
use App\Models\Credito;
use App\Models\Proveedor;
use App\Models\IngresoMedicamento;
use Illuminate\Http\Request;

class IngresoMedicamentoController extends Controller
{
    public function index()
    {
        //
    }
    public function create()
    {
        $ingresoMedicamentos = IngresoMedicamento::all();
        $proveedors=Proveedor::all();
        return view('IngresoMedicamento.create', compact('ingresoMedicamentos','proveedors'));
    }
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
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
