<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Queja;
use Illuminate\Support\Facades\DB;


class QuejaController extends Controller
{
    public function index()
    {
        //$quejas = Queja::all();
        $quejas = DB::select("SELECT Nombre, CodigoSIS, descripcion FROM clientes,quejas WHERE clientes.CodigoSIS=quejas.codigo_sis");
        return view('reclamos.index', compact('quejas'));


    }
    
    public function create()
    {
        return view('reclamos.create');
    }
    
    public function store(Request $request)
    {        
        $request->validate([
            'sis' => 'required',
            'descripcion' => 'required',
        ]);
        
        Queja::create([
            'codigo_sis' => $request->sis,
            'descripcion' => $request->descripcion,
        ]);
        
        return redirect()->route('quejas.create')->with('success', 'La queja o reclamo ha sido registrado correctamente.');
    }
}
