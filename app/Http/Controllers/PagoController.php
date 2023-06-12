<?php

namespace App\Http\Controllers;
use App\Models\Pagos;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function create()
    {
        //$pagos=DB::table('pagos')->get();
        return view('pagos.index');//, compact('pagos'));
    }

    public function registrarPagos(Request $request){
    

     $CodigoSIS = $request->input('sis');
     $desde = $request->input('desde');
     $hasta = $request->input('hasta');

     $accion=$request->input('accion');
     
//calculando los dias
     $fechaInicio = Carbon::parse($desde);
     $fechaFin = Carbon::parse($hasta);
     $diasTranscurridos = $fechaInicio->diffInDays($fechaFin);
     
     if($accion==='cobrar'){

     $pago = Pagos::where('CodigoSIS', $CodigoSIS)->first();
     if($pago){
        $pago->update([
            'Monto' => $diasTranscurridos*6.67,
            'pago_hasta'=> $hasta,
        ]);
     }else{
        $pagos = new Pagos([
            'CodigoSIS' => $CodigoSIS,
            'Monto' => $diasTranscurridos*6.67,
            'pago_desde' => $desde,
            'pago_hasta'=> $hasta,
        ]);
        $pagos->save();
     }
     return  redirect('pagos');
     }elseif($accion==='Buscar'){
        $datos = DB::select("SELECT CodigoSIS,pago_hasta FROM pagos WHERE CodigoSIS=$CodigoSIS");
        return view('pagos.index', ['datos' => $datos]);
     }
    elseif($accion==='Calcular'){
        $datos = DB::select("SELECT CodigoSIS,pago_hasta FROM pagos WHERE CodigoSIS=$CodigoSIS");
        $monto=$diasTranscurridos*6.67;
        return view('pagos.index', ['monto' => $monto], ['datos' => $datos],['hasta' => $hasta]);
     }
     
    }
}
