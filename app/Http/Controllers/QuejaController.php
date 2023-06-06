<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Queja;

class QuejaController extends Controller
{
    public function index()
    {
        $quejas = Queja::all();
        
        return view('reclamos.index', compact('quejas'));

        $queja = new Queja;
        $queja->nombre = $request->Nombre;
        $cliente->Apellido = $request->Apellido;
    }
    
    public function create()
    {
        return view('reclamos.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);
        
        Queja::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);
        
        return redirect()->route('quejas.create')->with('success', 'La queja o reclamo ha sido registrado correctamente.');
    }
}
