<?php

namespace App\Http\Controllers;

use App\Models\ReferenciaMedica;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class ReferenciaMedicaController extends Controller
{
    //
        public function index()
    {        
       // return view('index', compact('users'));
        return view("referenciaMedica.form");
    }

    public function show()
    {

    }
    public function update()
    {

    }


}
