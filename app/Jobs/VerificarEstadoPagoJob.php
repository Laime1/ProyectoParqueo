<?php

namespace App\Jobs;

use App\Models\Pagos; // Reemplaza "TuModelo" por el nombre del modelo correspondiente a tu tabla
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class VerificarEstadoPagoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        $hoy = Carbon::today();
        $registros = Pagos::where('pago_hasta', '<', $hoy)->get();

        foreach ($registros as $registro) {
            $registro->estado_pago = 'moroso';
            $registro->save();
        }
    }
}
