<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
        $correo = $request->input('email');
        $contra = $request->input('password');
        
         $datos = DB::select("SELECT  Email FROM clientes WHERE CodigoSIS=$contra");
         $datos1 = DB::select("SELECT  email FROM personals WHERE codigosispersonal=$contra");

        if($datos){
            return redirect('/inicio')->with('message', 'inicio de sesion exitoso.');
        }else{
            if($datos1){
                return redirect('/inicio')->with('message', 'inicio de sesion exitoso.');

            }else{
                return redirect('login')->with('message', 'credenciales incorrectas');

            }
            return redirect('login')->with('message', 'credenciales incorrectas');
        }
        
        /*
        $credentials = $request->validate([
            'Email' => 'required|Email',s
            'CodigoSIS' => 'required',
        ]);

        if (Clientes::attempt($credentials)) {
            // Autenticación exitosa, redireccionar a la página de inicio
            return redirect('/inicio');
        }

        // Error de autenticación, redireccionar al formulario de inicio de sesión con un mensaje de error
        return redirect()->back()->withErrors([
            'email' => 'Credenciales inválidas',
        ]);*/
    }
    public function perfil()
        {
         $datos = DB::select("SELECT  Email,Nombre FROM clientes WHERE CodigoSIS=$contra");
         $datos1 = DB::select("SELECT  email,nombrepersonal FROM personals WHERE codigosispersonal=$contra");

return view('login.perfil', compact('datos'));
        }
}
