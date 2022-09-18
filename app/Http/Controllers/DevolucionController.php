<?php

namespace App\Http\Controllers;

use App\Models\Devolucion;
use Illuminate\Http\Request;

class DevolucionController extends Controller
{

    public function index()
    {
        return  view('devolucion.index');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Devolucion $devolucion)
    {
        //
    }

    public function update(Request $request, Devolucion $devolucion)
    {
        //
    }

    public function destroy(Devolucion $devolucion)
    {
        //
    }
}
