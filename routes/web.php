<?php

use App\Http\Controllers\PuestoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\CorreoController;
use App\Http\Controllers\QuejaController;
use App\Http\Controllers\ControlController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\Parqueo1Controller;
use App\Http\Controllers\Parqueo2Controller;
use App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Mail;
use App\Mail\EnviarCorreo;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', function () {
    return view('login.index');
});
Route::get('/inicio', function () {
    return view('inicio');
});
//Maquetado
/*Route::get('/maquetado', function () {
    return view('maquetado.maquetado');
});*/
Route::get('/maquetado',[PuestoController::class, 'index']);


Route::get('/maquetado1',[PuestoController::class, 'parqueo1']);
Route::get('/maquetado2',[PuestoController::class, 'parqueo2']);

//cliente
Route::get('/cliente',[ClienteController::class, 'index']);
Route::post('/clientes',[ClienteController::class, 'store']);
Route::get('/clientess',[ClienteController::class, 'mostrarDatos']);

//Route::view('/maquetado','maquetado.maquetado');

Route::get('/personal',[PersonalController::class, 'index']);
Route::post('/personals',[PersonalController::class, 'store']);
Route::resource('/personal',PersonalController::class);

//Rutas para Enviar correos
Route::post('/enviar-correo', [CorreoController::class, 'enviarCorreo']);
Route::get('/formulario-correo', [CorreoController::class, 'mostrarFormulario']);

/*Route::get('/correo', function () {
    return view('email.mensajes');
});
Route::post('/enviar-correo',function(){zCSYNE
    //return request()->all();
    Mail::to(request()->Destino)->send(new EnviarCorreo(request()->Mensaje));
    return redirect('correo')->with('success','Correo enviado exitosamente');
});*/

Route::resource('/clientes',ClienteController::class);

//Asigancion de sitios
Route::get('/asignar',[ClienteController::class, 'asignarPuesto']);
Route::get('/asignar1',[Parqueo1Controller::class, 'asignarPuesto']);
Route::get('/asignar2',[Parqueo2Controller::class, 'asignarPuesto']);

//seccion de quejas
Route::get('/quejas', [QuejaController::class, 'index'])->name('quejas.index');
Route::get('/quejas/create',[QuejaController::class, 'create'])->name('quejas.create');
Route::post('/quejas',[QuejaController::class, 'store'])->name('quejas.store');

//seccionde control de entradas y salidas
Route::get('/control/entrada',[ControlController::class, 'mostrarFormularioEntrada'])->name('control.entrada.form');
Route::post('/control/entrada',[ControlController::class, 'registrarEntrada'])->name('control.entrada');
Route::get('/control/salida',[ControlController::class, 'mostrarFormularioSalida']);
Route::put('/control/salidas',[ControlController::class, 'registrarSalida']);

//seccion de pagos
Route::get('/pagos',[PagoController::class, 'create']);
Route::post('/pagoss',[PagoController::class, 'registrarPagos']);
Route::get('/pagos/reporte',[PagoController::class, 'reporte']);

//seccion de reportes
Route::get('/reportes',[ReportController::class, 'index'])->name('reportes.index');

//para probar estado de pago
Route::get('/estado',[PagoController::class, 'verificarEstadoPago']);

//solicitudes
/*
Route::get('/solicitud', [SolicitudController::class, 'index'])->name('solicitud.index');
Route::get('/solicitud/create',[SolicitudController::class, 'create'])->name('solicitud.create');*/
Route::post('/solicitud',[SolicitudController::class, 'store'])->name('solicitud.store');


Route::get('/solicitud/registrosolicitud', function () {
    return view('solicitud.registrosolicitud');
});

Route::get('/solicitud/listaSolicitud', function () {
    return view('solicitud.listaSolicitud');
});

Route::get('/solicitud',[SolicitudController::class, 'index']);
Route::post('/solicitud',[SolicitudController::class, 'store']);
//Route::post('store', 'SolicitudController@all')->name("solicitud.store");

Route::resource('/solicitud',SolicitudController::class);

//login
/*
Route::prefix('auth')->group(function(){
Route::get('login', [AuthController::class,'register'])->name('login');



});
Route::get('/register',[AuthController::class,'register']);

Route::post('/register/registerVerify',[AuthController::class,'registerVerify']);


Route::get('/login',[AuthController::class, 'create']);
Route::get('/login', function () {
    return view('login.index');
});
Route::resource('/login',AuthController::class);
*/
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/perfil',[AuthController::class, 'login']);