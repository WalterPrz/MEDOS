<?php

namespace App\Http\Controllers;
use App\Models\Credito;
use App\Models\Proveedor;
use App\Models\IngresoMedicamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\IngresoMedicamentoRequest;
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
        $ingresoMedicamentos = DB::select(
            "SELECT a.id, nombreProveedor,fechaIngreso FROM ingreso_medicamentos a
            INNER JOIN creditos b ON a.credito_id=b.id
            INNER JOIN proveedors c ON b.proveedor_id = c.id
            WHERE fechaIngreso LIKE ? ORDER BY a.id;", [$fechaIngreso]
        );
        $creditos = Credito::all();
        $proveedors=Proveedor::all();
        return view('IngresoMedicamento.create', compact('ingresoMedicamentos','creditos','proveedors'));
    }
    public function store(IngresoMedicamentoRequest $request)
    {
        try{
            $plazoProvee = Proveedor::find($request->proveedor);

            $credito = new Credito();
            $credito->proveedor_id = $request->proveedor;
            $credito->plazo = $plazoProvee->plazoDevolucion;
            $credito->fechaCreacion = date('Y-m-d');
            $credito->save();

            $ingreso = new IngresoMedicamento();
            $ingreso->credito_id = $credito->id;
            $ingreso->fechaIngreso = date('Y-m-d');
            $ingreso->save();

            return redirect()->route('ingresomed.detalle', [$ingreso, $credito]);
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
