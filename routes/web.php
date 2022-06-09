<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DetalleIngresoController;
use App\Http\Controllers\IngresoMedicamentoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//listar
Route::get('categoria', [CategoriaController::class,'index'])->name('categoria.index');
//crear
Route::view('categoria/crear','categoria.create')->name('categoria.create');;
Route::post('categoria',[CategoriaController::class,'store'])->name('categoria.store');
//actualizar
Route::get('categoria/{categoria}', [CategoriaController::class,'show'])->name('categoria.show');
Route::put('categoria/{categoria}', [CategoriaController::class,'update'])->name('categoria.update');
//eliminar
Route::get('categoria/{categoria}/destoy', [CategoriaController::class,'destroy'])->name('categoria.destroy');

Route::controller(IngresoMedicamentoController::class)->group(function(){
    //Ingresar medicamentos
    Route::get('ingresomed/crear', 'create')->name('ingresomed.create');
    Route::post('ingresomed/save', 'store')->name('ingresomed.store');
    //Editar ingreso de medicamentos
    //Route::get('ingresomed/crear', 'create');
});

Route::controller(DetalleIngresoController::class)->group(function(){
    //Ingresar detalle
    Route::get('ingresomed/detalle/{ingreso}', 'create')->name('ingresomed.detalle');
    Route::post('ingresomed/detalle/{ingreso}/{medicamento}', 'store')->name('detalleingreso.store');

    //Editar ingreso de medicamentos
    //Route::get('ingresomed/crear', 'create');
});
