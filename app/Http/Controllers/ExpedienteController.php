<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expediente;

class ExpedienteController extends Controller
{
    public function index()
    {
        $expedientes = Expediente::all();
        return view('expediente.index', compact('expedientes'));
    }
}
