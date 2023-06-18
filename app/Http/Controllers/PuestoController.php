<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $puestoss = DB::table('puestos')->get();
        $clientess= DB::table('puestos AS p')
        ->join('clientes AS c1', 'p.cliente_sis', '=', 'c1.CodigoSIS')
        ->leftJoin('clientes AS c2', 'p.cliente_secundario', '=', 'c2.CodigoSIS')
        ->select('c1.Nombre', 'c1.Apellido', 'c1.CodigoSIS', 'c1.Placa', DB::raw('COALESCE(c2.Nombre, c1.Nombre) AS NombreSecundario'), DB::raw('COALESCE(c2.Apellido, c1.Apellido) AS ApellidoSecundario'), DB::raw('COALESCE(c2.CodigoSIS, c1.CodigoSIS) AS cliente_secundario'), DB::raw('COALESCE(c2.Placa, c1.Placa) AS placaSecundaria'), 'p.numero', 'p.color')
        ->get();
    
        
        return view('maquetado.maquetado', compact('puestoss','clientess'));
      
    }
   
    public function parqueo1()
    {
        $puestoss = DB::table('parqueo1')->get();
        $clientess= DB::table('parqueo1 AS p')
        ->join('clientes AS c1', 'p.cliente_sis', '=', 'c1.CodigoSIS')
        ->leftJoin('clientes AS c2', 'p.cliente_secundario', '=', 'c2.CodigoSIS')
        ->select('c1.Nombre', 'c1.Apellido', 'c1.CodigoSIS', 'c1.Placa', DB::raw('COALESCE(c2.Nombre, c1.Nombre) AS NombreSecundario'), DB::raw('COALESCE(c2.Apellido, c1.Apellido) AS ApellidoSecundario'), DB::raw('COALESCE(c2.CodigoSIS, c1.CodigoSIS) AS cliente_secundario'), DB::raw('COALESCE(c2.Placa, c1.Placa) AS placaSecundaria'), 'p.numero', 'p.color')
        ->get();
    
        
        return view('maquetado.maquetado1', compact('puestoss','clientess'));
      
    }

    public function parqueo2()
    {
        $puestoss = DB::table('parqueo2')->get();
        $clientess= DB::table('parqueo2 AS p')
        ->join('clientes AS c1', 'p.cliente_sis', '=', 'c1.CodigoSIS')
        ->leftJoin('clientes AS c2', 'p.cliente_secundario', '=', 'c2.CodigoSIS')
        ->select('c1.Nombre', 'c1.Apellido', 'c1.CodigoSIS', 'c1.Placa', DB::raw('COALESCE(c2.Nombre, c1.Nombre) AS NombreSecundario'), DB::raw('COALESCE(c2.Apellido, c1.Apellido) AS ApellidoSecundario'), DB::raw('COALESCE(c2.CodigoSIS, c1.CodigoSIS) AS cliente_secundario'), DB::raw('COALESCE(c2.Placa, c1.Placa) AS placaSecundaria'), 'p.numero', 'p.color')
        ->get();
    
        
        return view('maquetado.maquetado2', compact('puestoss','clientess'));
      
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
