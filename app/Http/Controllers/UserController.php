<?php

namespace App\Http\Controllers;

use App\Models\View;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Nombre de la página actual (puedes ajustar esto según tus necesidades)
        $nombrePagina = 'user.index';

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

        return view('usuarios.index',[
            'users' => User::all(),
            'roles' => Role::all(),
            'contador' => $view->count,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create',[
            'roles' => Role::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->fullname = $request->input('fullname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->ci = $request->input('ci');
        $user->role_id = $request->input('role_id');
        $user->save();
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('usuarios.show',[
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view ('usuarios.edit',[
            'user'=>$user,
            'roles' => Role::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //TODO: Arreglar el cambio de contraseña
        $user->my_update($request);
        return redirect()->route('user.show',$user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }
    //funciones para director o academico
    public function indexEducador(){
        return view('academicos.index');
    }
    public function mostrarPagina()
    {
        // Nombre de la página actual (puedes ajustar esto según tus necesidades)
        $nombrePagina = 'user.index';

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
        return view('nombre_de_la_vista', ['contador' => $view->count]);
    }
}
