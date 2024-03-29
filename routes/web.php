<?php

use App\Http\Controllers\AbonoController;
use App\Http\Controllers\BienvenidaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\DetalleIngresoController;
use App\Http\Controllers\DiagnosticoController;
use App\Http\Controllers\IngresoMedicamentoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ReferenciaMedicaController;



use App\Models\DetalleVenta;
use App\Http\Controllers\MedProxVencerController;
use App\Http\Controllers\DevolucionController;
use App\Http\Controllers\DetalleDevolucionController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\ListaVisitasController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\ReferenciaExternaController;
use App\Http\Controllers\PermisoFarmaciaController;
use App\Http\Controllers\PagoPermisoController;
use App\Http\Controllers\CreditoController;
use App\Http\Controllers\DetaHecesController;
use App\Http\Controllers\DetaHemoController;
use App\Http\Controllers\DetaOrinaController;
use App\Http\Controllers\DetaSanguiController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\ReportesController;

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




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/bienvenida', function () {
        return view('admin.bienvenida.index');
    })->name('bienvenida');

    
    Route::resource('/user', UsersController::class)->middleware('role:admin, user');
    Route::put('/user/{user}/activar', [UsersController::class,'activar'])->name('user.activar');
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
    Route::get('categoria/{categoria}/destroy', [CategoriaController::class,'destroy'])->name('categoria.destroy');
    //---------------------------Ventas------------------------------------------------------
    Route::get('ventas', [VentaController::class,'index'])->name('venta.index');
    Route::post('venta',[VentaController::class,'store'])->name('venta.store');
    Route::put('venta/completarVenta/{venta}',[VentaController::class,'update'])->name('venta.pagar');
    //---------------------------Detalle Ventas------------------------------------------------------
    Route::get('venta/detalle/{venta}', [DetalleVentaController::class,'index'])->name('venta.detalle');
    Route::post('venta/detalle/{venta}/{medicamento}',[DetalleVentaController::class,'store'])->name('detalleventa.store');
    Route::put('venta/detalle/{venta}/{detalleVenta}',[DetalleVentaController::class,'update'])->name('detalleventa.update');
    Route::get('venta/detalle/{venta}/eliminar/{detalleVenta}', [DetalleVentaController::class,'destroy'])->name('detalleventa.destroy');


    /*Route::resource('/citas', CitaController::class);
    Route::post('/citas/{cita}/cancel', [CitaController::class,'cancel'])->name('citas.cancel');*/

Route::get('venta/detalle/{venta}/eliminar/{detalleVenta}', [DetalleVentaController::class,'destroy'])->name('detalleventa.destroy');

    Route::get('venta/detalle/{venta}/eliminar/{detalleVenta}', [DetalleVentaController::class,'destroy'])->name('detalleventa.destroy');

    Route::resource('/citas', CitaController::class);
    Route::post('/citas/{cita}/cancel', [CitaController::class,'cancel'])->name('citas.cancel');
    Route::post('/citas/{cita}/confirm', [CitaController::class,'confirm'])->name('citas.confirm');

    Route::resource('/examen', ExamenController::class);
    Route::get('/examen/paciente/{id}', [ExamenController::class,'index'])->name('examen.index');
    Route::get('/examen/paciente/{id}/create', [ExamenController::class,'create'])->name('examen.create');
    Route::get('/examen/paciente/{expediente}/{examen}/destroy', [ExamenController::class,'destroy'])->name('examen.delete');
    
    
    Route::get('/examen/paciente/{expediente}/{examen}/{idTipoExamen}/detasangui', [DetaSanguiController::class,'edit'])->name('examen.detasangui');
    Route::get('/examen/paciente/{expediente}/{examen}/{idTipoExamen}/detahemo', [DetaHemoController::class,'edit'])->name('examen.detahemo');
    Route::get('/examen/paciente/{expediente}/{examen}/{idTipoExamen}/detaheces', [DetaHecesController::class,'edit'])->name('examen.detaheces');
    Route::get('/examen/paciente/{expediente}/{examen}/{idTipoExamen}/detaorina', [DetaOrinaController::class,'edit'])->name('examen.detaorina');
    
    Route::put('/examen/paciente/detasangui/{examen}/{detaSangui}',[DetaSanguiController::class,'update'])->name('detasangui.update');
    Route::put('/examen/paciente/detahemo/{examen}/{detaHemo}',[DetaHemoController::class,'update'])->name('detahemo.update');
    Route::put('/examen/paciente/detaheces/{examen}/{detaHeces}',[DetaHecesController::class,'update'])->name('detaheces.update');
    Route::put('/examen/paciente/detaorina/{examen}/{detaOrina}',[DetaOrinaController::class,'update'])->name('detaorina.update');
    
    /*Route::patch('/examen/{examen}/{detaHemo}', [ExamenController::class,'updateHemo'])->name('examen.updateHemo');
    Route::patch('/examen/{examen}/{detaHeces}', [ExamenController::class,'updateHeces'])->name('examen.updateHeces');
    Route::patch('/examen/{examen}/{detaOrina}', [ExamenController::class,'updateOrina'])->name('examen.updateOrina');
    Route::patch('/examen/{examen}/{detaSangui}', [ExamenController::class,'updateSangui'])->name('examen.updateSangui');*/


    
    Route::controller(IngresoMedicamentoController::class)->group(function(){
        //Ingresar medicamentos
        Route::get('ingresomed/crear', 'create')->name('ingresomed.create');
        Route::post('ingresomed/save', 'store')->name('ingresomed.store');
        //Editar ingreso de medicamentos
        //Route::get('ingresomed/crear', 'create');
    });
    Route::controller(DetalleIngresoController::class)->group(function(){
        //Ingresar detalle
        Route::get('ingresomed/detalle/{ingreso}', [DetalleIngresoController::class,'index'])->name('ingresomed.detalle_consulta');
        Route::get('ingresomed/detalle2/{ingreso}/{credit}', 'create')->name('ingresomed.detalle');
        Route::post('ingresomed/detalle/{ingreso}/{credit}', 'store')->name('detalleingreso.store');

        //Editar ingreso de medicamentos
        Route::get('ingresomed/detalle/edit/{ingreso}/{detalleIngreso}/{credit}', 'edit')->name('detalleingreso.edit');
        Route::post('ingresomed/detalle/update/{ingreso}/{detalleIngreso}/{credit}', 'update')->name('detalleingreso.update');

        //Dar de baja el detalle del ingreso
        Route::get('ingresomed/detalle/destroy/{ingreso}/{detalleIngreso}/{credit}', 'destroy')->name('detalleingreso.destroy');


        //----------------------------Proveedor------------------------
        //listar
        Route::get('proveedor', [ProveedorController::class,'index'])->name('proveedor.index');
        //crear
        Route::view('proveedor/crear','proveedor.create')->name('proveedor.create');
        Route::post('proveedor',[ProveedorController::class,'store'])->name('proveedor.store');
        //actualizar
        Route::get('proveedor/{proveedor}', [ProveedorController::class,'show'])->name('proveedor.show');
        Route::put('proveedor/{proveedor}', [ProveedorController::class,'update'])->name('proveedor.update');
        //eliminar
        Route::get('proveedor/{proveedor}/destoy', [ProveedorController::class,'destroy'])->name('proveedor.destroy');
        //----------------------------Inventario------------------------
        //listar
        Route::get('inventario', [InventarioController::class,'index'])->name('inventario.index');
        Route::get('medicamento-proximo-vencer', [MedProxVencerController::class,'index'])->name('inventario.proxvencer');
        
        //dev
        Route::get('devoluciones', [DevolucionController::class,'index'])->name('devolucion.index');
        Route::post('devoluciones',[DevolucionController::class,'store'])->name('devolucion.store');
        Route::put('devoluciones/{devolucion}',[DevolucionController::class,'update'])->name('devolucion.update');
        Route::delete('devoluciones/{devolucion}',[DevolucionController::class,'destroy'])->name('devolucion.destroy');
        Route::get('devolucion/detalle/{devolucion}', [DetalleDevolucionController::class,'index'])->name('devolucion.detalle');
        Route::post('devolucion/detalle/{devolucion}/{id_detalle_ingreso}',[DetalleDevolucionController::class,'store'])->name('detalledevolucion.store');
        Route::put('devolucion/detalle/{devolucion}/{detalle_dev}',[DetalleDevolucionController::class,'update'])->name('detalledevolucion.update');




    });

        //----------------------------Diagnostico------------------------
     //listar
    Route::get('diagnostico', [DiagnosticoController::class,'index'])->name('diagnostico.index');

    //crear
    Route::view('diagnostico/crear','diagnostico.create')->name('diagnostico.create');
    Route::post('diagnostico',[DiagnosticoController::class,'store'])->name('diagnostico.store');
    //actualizar
    Route::get('diagnostico/{diagnostico}', [DiagnosticoController::class,'show1'])->name('diagnostico.show1');
    Route::put('diagnostico/{diagnostico}', [DiagnosticoController::class,'update'])->name('diagnostico.update');

    Route::post('diagnostico/view-pdf/', [DiagnosticoController::class,'viewPDF'])->name('view-pdf');

    Route::get('pdf/{var}', [DiagnosticoController::class,'viewPDF'])->name('diagnostico.viewPDF');
    

    Route::get('referenciaMedica', [ReferenciaMedicaController::class,'index'])->name('referenciaMedica.index');



    //----------------------------Visitas de pacientes------------------------
    //listar
    Route::get('visita', [ListaVisitasController::class,'index'])->name('diagnostico.visita');
    // ver detalle visitas
    Route::get('visita/{diagnostico}', [ListaVisitasController::class,'show'])->name('diagnostico.show');
    //----------------------------  Expediente ----------------------------------------------
    //listar
    Route::get('expediente', [ExpedienteController::class,'index'])->name('expediente.index');

    //Crear
    Route::get('expediente/crear', [ExpedienteController::class,'create'])->name('expediente.create');
    Route::post('expediente/store',[ExpedienteController::class,'store'])->name('expediente.store');
    //actualizar
    Route::get('expediente/edit/{expediente}', [ExpedienteController::class,'edit'])->name('expediente.edit');
    Route::get('expediente/{expediente}', [ExpedienteController::class,'show'])->name('expediente.show');
    Route::put('expediente/{expediente}', [ExpedienteController::class,'update'])->name('expediente.update');
    //Eliminar
    Route::get('expediente/{expediente}/destroy', [ExpedienteController::class,'destroy'])->name('expediente.destroy');


    //----------------------------Referencia externa------------------------

    //listar
    Route::get('refext', [ReferenciaExternaController::class,'index'])->name('refext.index');
    //Crear
    Route::get('refext/{expediente}', [ReferenciaExternaController::class,'create'])->name('refext.create');
    Route::post('refext/{expediente}',[ReferenciaExternaController::class,'store'])->name('refext.store');


     //----------------------------  Detalle expediente ----------------------------------------------
     //Listar detalle del expediente
     Route::get('expediente/{id}', [ExpedienteController::class,'show'])->name('expediente.show');
     Route::get('expediente/{id}/download', [ExpedienteController::class, 'download'])->name('expediente.download');

     //----------------------------Permisos Farmacia------------------------
        //listar
        Route::get('permisoFarmacia', [PermisoFarmaciaController::class,'index'])->name('permisoFarmacia.index');
        //crear
        Route::view('permisoFarmacia/crear','permisoFarmacia.create')->name('permisoFarmacia.create');
        Route::post('permisoFarmacia',[PermisoFarmaciaController::class,'store'])->name('permisoFarmacia.store');
        //actualizar
        Route::get('permisoFarmacia/{permiso}', [PermisoFarmaciaController::class,'show'])->name('permisoFarmacia.show');
        Route::put('permisoFarmacia/{permiso}', [PermisoFarmaciaController::class,'update'])->name('permisoFarmacia.update');
        //eliminar
        Route::get('permisoFarmacia/{permiso}/destoy', [PermisoFarmaciaController::class,'destroy'])->name('permisoFarmacia.destroy');

        //----------------------------Pago Permisos------------------------
        //listar
        Route::get('pagoPermiso', [PagoPermisoController::class,'index'])->name('pagoPermiso.index');
        //crear
        Route::controller(PagoPermisoController::class)->group(function(){
            Route::get('pagoPermiso/crear', 'create')->name('pagoPermiso.create');
            Route::post('pagoPermiso/save', 'store')->name('pagoPermiso.store');
        });
        //actualizar
        Route::get('pagoPermiso/{permiso}', [PagoPermisoController::class,'show'])->name('pagoPermiso.show');
        Route::put('pagoPermiso/{permiso}', [PagoPermisoController::class,'update'])->name('pagoPermiso.update');
        //eliminar
        Route::get('pagoPermiso/{permiso}/destoy', [PagoPermisoController::class,'destroy'])->name('pagoPermiso.destroy');


         //----------------------------  Creditos ----------------------------------------------
    //listar
    Route::get('credito', [CreditoController::class,'index'])->name('credito.index');

    //Crear
    Route::get('credito/crear', [CreditoController::class,'create'])->name('credito.create');
    Route::post('credito/store',[CreditoController::class,'store'])->name('credito.store');
    //actualizar
    Route::get('credito/edit/{credito}', [CreditoController::class,'edit'])->name('credito.edit');
    Route::put('credito/update/{credito}', [CreditoController::class,'update'])->name('credito.update');
    //Eliminar
    Route::get('credito/destroy/{credito}', [CreditoController::class,'destroy'])->name('credito.destroy');

         //----------------------------  Abono ----------------------------------------------
    //listar
    Route::get('abono/{abono}', [AbonoController::class,'index'])->name('abono.index');

    //Crear
    Route::get('abonos/crear/{abono}', [AbonoController::class,'create'])->name('abono.create');
    Route::post('abono/store',[AbonoController::class,'store'])->name('abono.store');
    //actualizar   
    Route::get('abono/edit/{abono}', [AbonoController::class,'edit'])->name('abono.edit');
    Route::put('abono/update/{abono}', [AbonoController::class,'update'])->name('abono.update');
    //Eliminar
    Route::get('abono/destroy/{abono}', [AbonoController::class,'destroy'])->name('abono.destroy');

             //----------------------------  Medicamento ----------------------------------------------
    //listar
    Route::get('medicamento', [MedicamentoController::class,'index'])->name('medicamento.index');

    //Crear
    Route::get('medicamento/crear', [MedicamentoController::class,'create'])->name('medicamento.create');
    Route::post('medicamento/store',[MedicamentoController::class,'store'])->name('medicamento.store');
    //actualizar
    Route::get('medicamento/edit/{medicamento}', [MedicamentoController::class,'edit'])->name('medicamento.edit');
    Route::put('medicamento/update/{medicamento}', [MedicamentoController::class,'update'])->name('medicamento.update');
    //Eliminar
    Route::get('medicamento/destroy/{medicamento}', [MedicamentoController::class,'destroy'])->name('medicamento.destroy');


    //Reportes
    Route::get('reportes/', [ReportesController::class,'GraIngresoMed'])->name('InMedicamento.grafico');


});



