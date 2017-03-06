<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Person;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //    protected $redirectTo = '/home';
    protected $redirectTo = '/';



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    protected function redirectTo(){         
        $user = Auth::user();
        $person = $user->person;
        
        //guardo el nombre en el session
        session(['name' => trim($person->name.' '.$person->lastname1) ]);        

        $roles_obj = $person->roles;
        
        $roles = [];
        foreach($roles_obj as $role){
            array_push($roles,$role->name);
        }        
        //guardo los roles en el session
        session(['roles' => $roles]); 
        
        $data = [
            'locals'   =>  $person->locals
        ];

        return '/inicio_sedes';
    }
}
