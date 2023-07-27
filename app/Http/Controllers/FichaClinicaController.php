<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use App\Models\FichaClinica;
use Illuminate\Http\Request;

class FichaClinicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clinicos.index',[
            'clinicos' => FichaClinica::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clinicos.create',[
            'beneficiarios' => Beneficiario::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fichaClinica = new FichaClinica();
        $fichaClinica->nombre_doctor = $request->input('nombre_doctor');
        $fichaClinica->motivo = $request->input('motivo');
        $fichaClinica->prescripcion_medica = $request->input('prescripcion_med');
        $fichaClinica->observaciones = $request->input('observaciones');
        $fichaClinica->id_beneficiario = $request->input('beneficiario');
        //dd($fichaClinica);
        $fichaClinica->save();
        return redirect()->route('fichaClinica.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(FichaClinica $fichaClinica)
    {
        return view('clinicos.show',['fichaClinica' => $fichaClinica]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FichaClinica $fichaClinica)
    {
        return view('clinicos.edit',['fichaClinica'=>$fichaClinica]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FichaClinica $fichaClinica)
    {
        $fichaClinica->nombre_doctor= $request->input('nombre_doctor');
        //$fichaClinica->especialidad = $request->input('especialidad');
        $fichaClinica->motivo = $request->input('motivo');
        $fichaClinica->prescripcion_medica = $request->input('prescripcion');
        $fichaClinica->observaciones = $request->input('observaciones');
        $fichaClinica->save();
        return redirect()->route('fichaClinica.index')->with('success', 'Ficha clínica actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FichaClinica $fichaClinica)
    {
        $fichaClinica->delete();
        return redirect()->route('fichaClinica.index');
    }
}
