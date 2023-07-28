<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use App\Models\InformeAcademico;
use App\Models\View;
use Illuminate\Http\Request;

class InformeAcademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Nombre de la página actual (puedes ajustar esto según tus necesidades)
        $nombrePagina = 'informeAcademico.index';

        // Obtener el registro del contador de vistas para esta página
        $view = View::where('page_name', $nombrePagina)->first();

        // Si no existe el registro, crearlo
        if (!$view) {
            $view = View::create([
                'page_name' => $nombrePagina,
                'count' => 0,
            ]);
        }

        // Incrementar el contador
        $view->increment('count');
        return view('academicos.index',[
            'informesAcademicos' => InformeAcademico::all(),
            'contador' => $view->count
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
