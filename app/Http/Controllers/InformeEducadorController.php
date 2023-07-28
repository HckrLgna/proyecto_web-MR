<?php

namespace App\Http\Controllers;

use App\Models\Alertas;
use App\Models\Beneficiario;
use App\Models\InformeEducador;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InformeEducadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('informe_educador.index',[
            'informesEducadores' => InformeEducador::all()
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
