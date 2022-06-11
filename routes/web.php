<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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
    return view('auth.login');
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
Route::post('venta/detalle/{venta}/{medicamento}',[DetalleVentaController::class,'store'])->name('detalleventa.store');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/admin', function () {
        //$role = config('roles.models.role')::where('name', '=', 'Admin')->first();  //choose the default role upon user creation.
        //auth()->user()->attachRole($role);
        return view('admin.layouts.index');
    })->name('admin');
    Route::resource('/user', UsersController::class)->middleware('role:admin, user');
});

