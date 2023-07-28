<?php

namespace App\Http\Controllers;

use App\Models\Alertas;
use App\Models\Beneficiario;
use App\Models\InformeEducador;
use App\Models\View;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InformeEducadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Nombre de la página actual (puedes ajustar esto según tus necesidades)
        $nombrePagina = 'informeEducador.index';

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
        return view('informe_educador.index',[
            'informesEducadores' => InformeEducador::all(),
            'contador' => $view->count
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('informe_educador.create',[
            'beneficiarios' => Beneficiario::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $informe = new InformeEducador();
        $informe->fecha = Carbon::now();
        $informe->descripcion = $request->input('descripcion');
        $informe->evaluacion = $request->input('evaluacion');
        $informe->id_usuario = auth()->user()->id;
        $informe->id_beneficiario = $request->input('beneficiario');
        $informe->save();
        return redirect()->route('informeEducador.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(InformeEducador $informeEducador)
    {
        return view('informe_educador.show',['informeEducador' => $informeEducador]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InformeEducador $informeEducador)
    {
        return view('informe_educador.edit',['informeEducador'=> $informeEducador]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InformeEducador $informe)
    {
        return redirect()->route('informeEducador.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InformeEducador $informeEducador)
    {
        $informeEducador->delete();
        return redirect()->back();
    }

    public function alertaStore(Request $request){
        $alerta = new Alertas();
        $alerta->titulo = $request->input('titulo');
        $alerta->fecha = Carbon::now()->format('Y-m-d');
        $alerta->estado = $request->input('estado');
        $alerta->detalle = $request->input('detalle');
        $alerta->id_informe_educador = $request->input('id_informe_educador');
        $alerta->save();
        return redirect()->back();
    }
}
