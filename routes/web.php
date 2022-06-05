<?php

use App\Http\Controllers\CategoriaController;
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