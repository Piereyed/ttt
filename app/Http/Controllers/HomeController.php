<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Local;
use App\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
            'locals'   =>  $user->person->locals->unique()
        ];
        return view('local.home', $data);
    }

    public function entrar(Request $request)
    {        
        $user = Auth::user();
        $person = $user->person;

        //la ruta de la foto de perfil        
        $filename = $person->photo;
        if(Storage::disk('local')->exists('public/'.$filename)){
            session(['photo' => $filename]);
        }        
        // dd(session()->all());


        //guardo el nombre en el session
        session(['name' => trim($person->name.' '.$person->lastname1) ]);        

        //se obtienen los roles para esa sede
        $roles_obj = $person->belongsToMany('App\Role','person_role_local')->wherePivot('local_id', $request['sede'])->get();
        // dd($roles_obj);
        $roles = [];
        $rol_min = 9999;        
        foreach($roles_obj as $role){
            array_push($roles,$role->name);
            if($role->id < $rol_min){
                $rol_min = $role->id;            
            }
        } 
        //guardo los roles en el session
        session(['roles' => $roles]); 
        session(['rol_nombre' => Role::find($rol_min)->name]);

        //guardo en el session la sede a la que se entro
        session(['sede' => $request['sede'] ]); 
        session(['sede_nombre' => Local::find($request['sede'])->name ]);  
        
        //guardo los dias que le quedan
        $now = strtotime(date('Y-m-d'));
        session(['days' =>  floor( ( strtotime($user->person->expiration_date) - $now) / (60 * 60 * 24))]);
        
        //verifico si ya vencio su membresia del cliente
        if(in_array('Cliente',$roles)){
            if($person->expiration_date < date('Y-m-d')){
                session(['activo' => false]); 
            }
            else{
                session(['activo' => true]); 
            }
        }

        return redirect()->route('inicio');
    }
}
