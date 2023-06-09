<?php


namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Control;
use Illuminate\Http\Request;

class ControlController extends Controller
{
    public function mostrarFormularioEntrada()
    {
        return view('salidas_entradas.entrada');
    }

    public function registrarEntrada(Request $request)
    {
        $codigoSIS = $request->input('codigoSIS');
        $horaEntrada = $request->input('horaEntrada');
        $cliente = Clientes::where('CodigoSIS', $codigoSIS)->first();

        if ($cliente) {
            $control = new Control([
                'CodigoSIS' => $codigoSIS,
                'horaEntrada' => $horaEntrada,
            ]);
            $control->save();

            return redirect()->route('control.entrada')
                ->with('message', 'Entrada registrada correctamente.')
                ->with('cliente', $cliente);
        } else {
            return redirect()->back()
                ->with('error', 'No se encontró un cliente con el código SIS proporcionado.')
                ->withInput();
        }
    }

    public function mostrarFormularioSalida()
    {
       /* $control = Control::where('CodigoSIS', $codigoSIS)->whereNull('horaSalida')->first();

        if ($control) {
            return view('salidas_entradas.salida', ['codigoSIS' => $codigoSIS, 'control' => $control]);
        } else {
            return redirect()->back()
                ->with('error', 'No se encontró un registro de entrada válido para el código SIS proporcionado.');
        }*/
        return view('salidas_entradas.salida');
    }

    public function registrarSalida(Request $request)
    {
        $codigoSIS = $request->input('codigoSIS');
        $horaSalida = $request->input('horaSalida');
        $control = Control::where('CodigoSIS', $codigoSIS)->whereNull('horaSalida')->first();

        if ($control) {
            $control->update([
                'horaSalida' => $horaSalida,
            ]);

            return redirect()->back()
                ->with('message', 'Salida registrada correctamente.')
                ->with('control', $control);
        } else {
            return redirect()->back()
                ->with('error', 'No se encontró un registro de entrada válido para el código SIS proporcionado.');
        }
    }
}

