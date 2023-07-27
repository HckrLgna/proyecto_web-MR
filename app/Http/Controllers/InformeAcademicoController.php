<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use App\Models\InformeAcademico;
use Illuminate\Http\Request;

class InformeAcademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('academicos.index',[
            'informesAcademicos' => InformeAcademico::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('academicos.create', ['beneficiarios'=> Beneficiario::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $informe = new InformeAcademico();
        $informe->grado = $request->input('grado_escolar');
        $informe->nombre_colegio = $request->input('nombre_colegio');
        $informe->direccion_colegio = $request->input('direccion_colegio');
        $informe->desempeño = $request->input('desempeño');
        $informe->id_beneficiario = $request->input('beneficiario');
        $informe->save();
        return redirect()->route('informeAcademico.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(InformeAcademico $informeAcademico)
    {
        return view('academicos.show',['informeAcademico'=>$informeAcademico]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InformeAcademico $informeAcademico)
    {
        return view('academicos.edit',['informeAcademico'=>$informeAcademico]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InformeAcademico $informeAcademico)
    {
        $informeAcademico->grado = $request->input('grado_escolar');
        $informeAcademico->nombre_colegio = $request->input('nombre_colegio');
        $informeAcademico->direccion_colegio = $request->input('direccion_colegio');
        $informeAcademico->desempeño = $request->input('desempeño');
        $informeAcademico->save();
        return redirect()->route('informeAcademico.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InformeAcademico $informeAcademico)
    {
        $informeAcademico->delete();
        return redirect()->route('informeAcademico.index');
    }
}
