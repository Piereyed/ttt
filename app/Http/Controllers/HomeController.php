<?php

namespace App\Http\Controllers;

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
        //guardo en el session la sede a la que se entro
        session(['sede' => $request['sede'] ]); 
        
        
        return redirect()->route('inicio');
    }
}
