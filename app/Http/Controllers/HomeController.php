<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id_role = Auth::user()->role_id;
        if ($id_role == 1 || $id_role == 2){
            return view ('usuarios.index',[
                'users' => User::all(),
                'roles' => Role::all()
            ]);
        }else{
            return view('academicos.index');
        }

    }
}
