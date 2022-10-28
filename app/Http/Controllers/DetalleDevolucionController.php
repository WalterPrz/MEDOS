<?php

namespace App\Http\Controllers;

use App\Models\DetalleDevolucion;
use Illuminate\Http\Request;

class DetalleDevolucionController extends Controller
{

    public function index()
    {
        return  view('devolucion.detalle');
    }
    public function store(Request $request)
    {
        //
    }
    public function show(DetalleDevolucion $detalleDevolucion)
    {
        //
    }
    public function update(Request $request, DetalleDevolucion $detalleDevolucion)
    {
        //
    }
    public function destroy(DetalleDevolucion $detalleDevolucion)
    {
        //
    }
}
