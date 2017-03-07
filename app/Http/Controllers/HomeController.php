<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Local;
use Illuminate\Database\Eloquent\Model;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
    public function locals()
    {
        $user = Auth::user();

        
        $data = [
        'locals'   =>  $user->person->locals
        ];
        return view('local.home', $data);
    }
    
    public function entrar(Request $request)
    {        
        $user = Auth::user();
        $person = $user->person;
        
        //guardo el nombre en el session
        session(['name' => trim($person->name.' '.$person->lastname1) ]);        

        //se obtienen los roles para esa sede
        $roles_obj = $person->belongsToMany('App\Role','person_role_local')->wherePivot('local_id', $request['sede'])->get();
        // dd($roles_obj);
        $roles = [];
        $rol_nombre = '';
        foreach($roles_obj as $role){
            array_push($roles,$role->name);
            if($role->name == "Super"){
                $rol_nombre = 'admin';
            }
            else if($role->name == "Administrador"){
                $rol_nombre = 'Administrador';
            }
            else if ($role->name == "Entrenador"){
                $rol_nombre = 'Entrenador';
            }
            else if ($role->name == "Cliente"){
                $rol_nombre = 'Cliente';
            }
        }        
        //guardo los roles en el session
        session(['roles' => $roles]); 
        session(['rol_nombre' => $rol_nombre]);

        //guardo en el session la sede a la que se entro
        session(['sede' => $request['sede'] ]); 
        session(['sede_nombre' => Local::find($request['sede'])->name ]);         
        
        
        return redirect()->route('inicio');
    }
}
