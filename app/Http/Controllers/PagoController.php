<?php

namespace App\Http\Controllers;
use App\Jobs\VerificarEstadoPagoJob;
use App\Models\Pagos;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function create()
    {
        //$pagos=DB::table('pagos')->get();
        return view('pagos.index1');//, compact('pagos'));
    }
    public function verificarEstadoPago()
    {
        VerificarEstadoPagoJob::dispatch();
    }
    public function registrarPagos(Request $request){
    

     $CodigoSIS = $request->input('sis');
     $desde = $request->input('desde');
     $hasta = $request->input('hasta');
     $meses = $request->input('meses');
     $accion=$request->input('accion');
     
//calculando los dias
     //$desde = DB::select("SELECT fecha_inicio FROM puestos WHERE=$CodigoSIS ");
     $fechaInicio = Carbon::parse($desde);
     $fechaFin = Carbon::parse($hasta);
    // $diasTranscurridos = $fechaInicio->diffInDays($fechaFin);
    
     
     $fechaFin = $fechaInicio->addMonthsNoOverflow($meses)->endOfMonth();
     $datos = DB::select("SELECT CodigoSIS,pago_hasta FROM pagos WHERE CodigoSIS=$CodigoSIS");
     $desdes = DB::select("SELECT fecha_inicio FROM puestos WHERE cliente_sis=$CodigoSIS");
     
     if($accion==='cobrar'){

     $pago = Pagos::where('CodigoSIS', $CodigoSIS)->first();
     if($pago){

        $montoActual = $pago->Monto;
        $nuevoMonto = $montoActual + ($meses * 70);

        $pago->update([
            'Monto' => $nuevoMonto,
            'pago_hasta'=> $fechaFin,
            'estado_pago' => 'pagado',
        ]);
     }else{
        if($fechaFin<date('Y-m-d')){
        $pagos = new Pagos([
            'CodigoSIS' => $CodigoSIS,
            'Monto' => $meses*70,
            'pago_desde' => $desde,
            'pago_hasta'=> $fechaFin,
            'estado_pago' => 'moroso',
        ]);
      }else{
        $pagos = new Pagos([
            'CodigoSIS' => $CodigoSIS,
            'Monto' => $meses*70,
            'pago_desde' => $desde,
            'pago_hasta'=> $fechaFin,
            'estado_pago' => 'pagado',
        ]);
      }
        $pagos->save();
     }
     return  redirect('pagos')->with('message', 'Pago exitoso');
     }elseif($accion==='Buscar'){
       // $desdes = DB::select("SELECT fecha_inicio FROM puestos WHERE cliente_sis=$CodigoSIS");
       if($desdes){
        return view('pagos.index1', ['datos' => $datos, 
                                   'CodigoSIS' => $CodigoSIS,
                                   'desdes' =>$desdes
                                 ]);
                 }else{
                    return  redirect('pagos')->with('message', 'este cliente no tiene ningun sitio asignado');
                 }
                                
     }
      elseif($accion==='Calcular'){
        //$datos = DB::select("SELECT CodigoSIS,pago_hasta FROM pagos WHERE CodigoSIS=$CodigoSIS");
        $monto=$meses*70;
        return view('pagos.index1', [
            'monto' => $monto,
            'meses' => $meses,
            'datos' => $datos,
            'CodigoSIS' => $CodigoSIS,
            'desdes' =>$desdes
            ]);
     }
     
    }


}
