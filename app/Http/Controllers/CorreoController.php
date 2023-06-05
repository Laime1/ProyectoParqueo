<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class CorreoController extends Controller
{
    public function enviarCorreo(Request $request)
    {
        $nombre = $request->input('nombre');
        $correoDestino = $request->input('correo');
        $mensaje = $request->input('mensaje');

        // Envío del correo
        Mail::send([], [], function ($mensajeCorreo) use ($correoDestino, $nombre, $mensaje) {
            $mensajeCorreo->to($correoDestino)->subject('Correo');
            $mensajeCorreo->setBody($mensaje, 'text/html');
        });

        return redirect()->back()->with('success', 'El correo ha sido enviado correctamente.');
    }

    public function mostrarFormulario()
    {
    $clientess = DB::table('clientes')->get();   
    return view('mail.correo', compact('clientess'));
   }

}
