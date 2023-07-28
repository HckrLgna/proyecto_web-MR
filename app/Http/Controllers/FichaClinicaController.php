<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use App\Models\FichaClinica;
use App\Models\View;
use Illuminate\Http\Request;

class FichaClinicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Nombre de la página actual (puedes ajustar esto según tus necesidades)
        $nombrePagina = 'fichaClinica.index';

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
        return view('clinicos.index',[
            'clinicos' => FichaClinica::all(),
            'contador' => $view->count
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
