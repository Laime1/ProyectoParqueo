<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use Illuminate\Support\Facades\DB;
class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $personale = DB::table('personals')//->get()
        ->select('codigosispersonal', 'nombrepersonal', 'apellidopersonal', 'telefonopersonal', 'email', 'cargopersonal', 'turnopersonal')
        ->where('codigosispersonal','LIKE','%'.$texto.'%')
        ->orwhere('nombrepersonal','LIKE','%'.$texto.'%')
        ->orwhere('apellidopersonal','LIKE','%'.$texto.'%')
        ->orderBy('codigosispersonal','asc')
        ->paginate(10);
        //return view('personal.registro');
      return view('personal.listapersonal', compact('personale'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('personal.registro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $personal = new Personal;
        $personal->nombrepersonal = $request->nombrepersonal;
        $personal->apellidopersonal = $request->apellidopersonal;
        $personal->codigosispersonal = $request->codigosispersonal;
        $personal->telefonopersonal = $request->telefonopersonal;
        $personal->email = $request->email;
        $personal->cargopersonal = $request->cargopersonal;
        $personal->turnopersonal = $request->turnopersonal;
        $personal->save();
        return redirect('personal')->with('status','Personal Registrado');
        
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
    public function edit($id)
    {
        $personal = Personal::firstOrCreate(['codigosispersonal' => $id]);
        return view ('personal.editarpersonal', compact('personal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $codigosispersonal)
    {
        $personal = Personal::findOrFail($codigosispersonal);
        $personal->nombrepersonal = $request->nombrepersonal;
        $personal->apellidopersonal = $request->apellidopersonal;
        $personal->codigosispersonal = $request->codigosispersonal;
        $personal->telefonopersonal = $request->telefonopersonal;
        $personal->email = $request->email;
        $personal->cargopersonal = $request->cargopersonal;
        $personal->turnopersonal = $request->turnopersonal;
        $personal->save();
        return redirect('personal')->with('status','personal Registrado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $personal = Personal::findOrFail($id);
        $personal->delete();
        return redirect('personal');
    }
}
