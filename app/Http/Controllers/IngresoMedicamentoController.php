<?php

namespace App\Http\Controllers;
use App\Models\Credito;
use App\Models\Proveedor;
use App\Models\IngresoMedicamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngresoMedicamentoController extends Controller
{
    public function index()
    {
        //
    }
    public function create(Request $request)
    {
        $ampe1= "%";
        $fechaIngre = $request->get('fechaIngreso');
        $fecha = $ampe1.''.$fechaIngre;
        $fechaIngreso = $fecha.''.$ampe1;
        //$ingresoMedicamentos = IngresoMedicamento::where('fechaIngreso','like',"%fechaIngreso%")
        //->fechaIngreso($fechaIngreso)
        //->get();
      //  $ingresoMedicamentos = IngresoMedicamento::all();
        $ingresoMedicamentos = DB::select(
            "SELECT a.id, nombreProveedor,fechaIngreso FROM ingreso_medicamentos a
            INNER JOIN creditos b ON a.credito_id=b.id
            INNER JOIN proveedors c ON b.idProveedor = c.id
            WHERE fechaIngreso LIKE ? ORDER BY a.id;", [$fechaIngreso]
        );
        $creditos = Credito::all();
        $proveedors=Proveedor::all();
        return view('IngresoMedicamento.create', compact('ingresoMedicamentos','creditos','proveedors'));
    }
    public function store(Request $request)
    {
        try{
            $credito = new Credito();
            $credito->idProveedor = $request->proveedor;
            $credito->save();
            $ingreso = new IngresoMedicamento();
            $ingreso->credito_id = $credito->id;
            $ingreso->fechaIngreso = date('Y-m-d');
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
