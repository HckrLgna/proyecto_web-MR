<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use App\Models\DatosIngreso;
use App\Models\User;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeneficiarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Nombre de la página actual (puedes ajustar esto según tus necesidades)
        $nombrePagina = 'beneficiarios.index';

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

        return view('beneficiarios.index',[
            'beneficiarios' => Beneficiario::all(),
            'contador' => $view->count
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('beneficiarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $beneficiario = new Beneficiario();
        $beneficiario->nombre = $request->input('nombre');
        $beneficiario->situacion = $request->input('situacion');
        $beneficiario->fecha_nacimiento = $request->input('fecha_nacimiento');
        $beneficiario->id_usuario = Auth::user()->id;
        $beneficiario->save();
        return redirect()->route('beneficiario.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Beneficiario $beneficiario)
    {
        $user = User::find($beneficiario->id_usuario);
        return view('beneficiarios.show', ['beneficiario' => $beneficiario, 'user'=>$user ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Beneficiario $beneficiario)
    {
        return view('beneficiarios.edit', ['beneficiario' => $beneficiario]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Beneficiario $beneficiario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Beneficiario $beneficiario)
    {
        $beneficiario->delete();
        return redirect()->route('beneficiario.index');
    }

    public function ingresoStore(Request $request){

        $ingreso = new DatosIngreso();
        $ingreso->estado = $request->input('estado');
        $ingreso->fecha_ingreso = $request->input('fecha_ingreso');
        $ingreso->id_beneficiario = $request->input('id_beneficiario');
        $ingreso->save();
        return redirect()->back();
    }
}
