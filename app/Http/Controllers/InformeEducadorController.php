<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use App\Models\InformeEducador;
use Illuminate\Http\Request;

class InformeEducadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('informe_educador.index');
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
        $informe->
        dd($request);
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
        return view('informe_educador.edit',['informeEducador', $informeEducador]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InformeEducador $informeEducador)
    {
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InformeEducador $informeEducador)
    {
        dd($informeEducador);
    }
}
