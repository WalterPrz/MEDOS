<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedProxVencerController extends Controller
{

    public function index()
    {
        return  view('inventario.proxvencer');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
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
