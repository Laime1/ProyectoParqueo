<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Clientes;
//use Illuminate\Support\Facades\DB;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $clientess = DB::table('clientes')//->get()
        ->select('CodigoSIS', 'Nombre', 'Apellido', 'Email', 'Telefono', 'Placa', 'Vehiculo', 'Puesto')
        ->where('CodigoSIS','LIKE','%'.$texto.'%')
        ->orwhere('Apellido','LIKE','%'.$texto.'%')
        ->orwhere('Nombre','LIKE','%'.$texto.'%')
        ->orderBy('CodigoSis','asc')
        ->paginate(10);
        return view('cliente.listacliente', compact('clientess'));
        //return $clientess[1];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cliente.formulario1');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $cliente = new Clientes;
        $cliente->Nombre = $request->Nombre;
        $cliente->Apellido = $request->Apellido;
        $cliente->CodigoSIS = $request->CodigoSIS;
        $cliente->Email = $request->Email;
        $cliente->Telefono = $request->Telefono;
        $cliente->Placa = $request->Placa;
        $cliente->Vehiculo = $request->Vehiculo;
        $cliente->save();
        return redirect('cliente')->with('status','Cliente Registrado');
        
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function mostrarDatos(Request $request) {
        $sis=$request->input('sis');
        $datos = DB::select("SELECT Nombre, Email, CodigoSIS FROM clientes WHERE CodigoSIS='$sis'");
        //return view('cliente.mostrarCliente', ['datos' => $datos]);
        return view('mail.correo', ['datos' => $datos]);
      }
//Asignacion de puestos en el parqueo
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
        $fin=$request->input('fin');
         
        $accion=$request->input('accion');

        //$cliente = DB::select("SELECT * FROM clientes WHERE CodigoSIS='$sis'");
        if($accion==='asignar sitio'){
        DB::update("UPDATE clientes SET Puesto=$puesto WHERE CodigoSIS=$sis ");
        DB::update("UPDATE puestos SET cliente_sis=$sis, cliente_secundario=$sis2Value, Estado='1', color='green', fecha_inicio='$inicio', fecha_fin='$fin'
                 WHERE numero=$puesto ");
        }elseif($accion === 'vaciar sitio'){
            DB::update("UPDATE clientes SET Puesto=null WHERE CodigoSIS=$sis ");
            DB::update("UPDATE puestos SET cliente_sis=null, Estado='0', color='gray', fecha_inicio=null, fecha_fin=null
              WHERE numero=$puesto ");
        } 
        return  redirect('maquetado');
      }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       // $cliente=Clientes::findOrFail($id);
        //$cliente=Clientes::firstOrFail($id);
        //$cliente = Clientes::where('CodigoSIS', $id)->findOrFail();
        $cliente = Clientes::firstOrCreate(['CodigoSIS' => $id]);


        //$cliente = DB::select("SELECT * FROM clientes WHERE CodigoSIS='$CodigoSIS'");

        return view ('cliente.editarcliente', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $CodigoSIS)
    {
        $cliente = Clientes::findOrFail($CodigoSIS);
//$cliente = DB::select("SELECT * FROM clientes WHERE CodigoSIS='$CodigoSIS'");
        $cliente->Nombre = $request->Nombre;
        $cliente->Apellido = $request->Apellido;
        $cliente->CodigoSIS = $request->CodigoSIS;
        $cliente->Email = $request->Email;
        $cliente->Telefono = $request->Telefono;
        $cliente->Placa = $request->Placa;
        $cliente->Vehiculo = $request->Vehiculo;
        $cliente->save();
        return redirect('cliente')->with('status','Cliente Registrado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = Clientes::findOrFail($id);
        $cliente->delete();
        return redirect('cliente');
    }
}
