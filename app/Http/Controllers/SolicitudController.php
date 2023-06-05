<?php

namespace App\Http\Controllers;
use App\Models\Solicitud;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $solicituds = DB::table('solicitud')
        ->get();

        return view('solicitudes.listaSol', compact('solicituds'));
         
       }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('solicitudes.registrarSol');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $solicitud = new Solicitud;
        
        $solicitud->NombreC = $request->input('Nombre');
        $solicitud->ApellidoC = $request->input('Apellido');
        $solicitud->FacultadC = $request->input('Facultad');
        $solicitud->TipoSolicitud = $request->input('TipoSol');
        $solicitud->DetalleSolicitud = $request->input('DetalleSol');
        $solicitud->save();
        return redirect('solicitud')->with('message', '¡Registro exitoso!!!!!!!');
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
