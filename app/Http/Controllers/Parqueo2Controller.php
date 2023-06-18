<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Parqueo2Controller extends Controller
{
    public function asignarPuesto(Request $request) {
        $sis=$request->input('sis');
        $sis2=$request->input('sis2');
        if (empty($sis2)) {
            $sis2Value = "NULL";
        } else {
            $sis2Value =$sis2;
        }
        $puesto=$request->input('puesto');
        $inicio=$request->input('inicio');
        
         
        $accion=$request->input('accion');

        //$cliente = DB::select("SELECT * FROM clientes WHERE CodigoSIS='$sis'");
        if($accion==='asignar sitio'){
        DB::update("UPDATE clientes SET Puesto=$puesto WHERE CodigoSIS=$sis ");
        DB::update("UPDATE parqueo2 SET cliente_sis=$sis, cliente_secundario=$sis2Value, Estado='1', color='green', fecha_inicio='$inicio'
                 WHERE numero=$puesto ");
        }elseif($accion === 'vaciar sitio'){
            DB::update("UPDATE clientes SET Puesto=null WHERE CodigoSIS=$sis ");
            DB::update("UPDATE parqueo2 SET cliente_sis=null, Estado='0', color='gray', fecha_inicio=null
              WHERE numero=$puesto ");
        } 
        return  redirect('maquetado');
      }
}
