<?php

use App\Http\Controllers\PuestoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\CorreoController;
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
    return view('inicio');
});
//Maquetado
/*Route::get('/maquetado', function () {
    return view('maquetado.maquetado');
});*/
Route::get('/maquetado',[PuestoController::class, 'index']);

//cliente
Route::get('/cliente',[ClienteController::class, 'index']);
Route::post('/clientes',[ClienteController::class, 'store']);



Route::get('/clientess',[ClienteController::class, 'mostrarDatos']);

//Route::view('/maquetado','maquetado.maquetado');


//Route::resource('/solicitud',SolicitudController::class);

Route::get('/personal',[PersonalController::class, 'index']);
Route::post('/personals',[PersonalController::class, 'store']);
Route::resource('/personal',PersonalController::class);


Route::get('/solicitudes/registrarSol', function () {
    return view('solicitudes.registrarSol');
});

Route::get('/solicitudes/listaSol', function () {
    return view('solicitudes.listaSol');
});

Route::get('/solicitud',[SolicitudController::class, 'index']);
//Route::post('store', 'SolicitudController@all')->name("solicitud.store");

Route::resource('/solicitud',SolicitudController::class);

Route::resource('/solicitud',SolicitudController::class);

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