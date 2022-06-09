<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\VentaController;
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
//----------------------------Categoria------------------------
//listar
Route::get('categoria', [CategoriaController::class,'index'])->name('categoria.index');
//crear
Route::view('categoria/crear','categoria.create')->name('categoria.create');
Route::post('categoria',[CategoriaController::class,'store'])->name('categoria.store');
//actualizar
Route::get('categoria/{categoria}', [CategoriaController::class,'show'])->name('categoria.show');
Route::put('categoria/{categoria}', [CategoriaController::class,'update'])->name('categoria.update');
//eliminar
Route::get('categoria/{categoria}/destoy', [CategoriaController::class,'destroy'])->name('categoria.destroy');
//---------------------------Ventas------------------------------------------------------
Route::get('ventas', [VentaController::class,'index'])->name('venta.index');
Route::post('venta',[VentaController::class,'store'])->name('venta.store');
//---------------------------Detalle Ventas------------------------------------------------------
Route::get('venta/detalle/{venta}', [DetalleVentaController::class,'index'])->name('venta.detalle');