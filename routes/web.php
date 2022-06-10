<?php

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $role = config('roles.models.role')::where('name', '=', 'Admin')->first();  //choose the default role upon user creation.
        auth()->user()->attachRole($role);
        return view('dashboard');
    })->name('dashboard');
    Route::resource('/user', UsersController::class)->middleware('role:admin');
});

