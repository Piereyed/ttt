<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Local;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; //para usar DB

class TrainerController extends Controller
{
    public function index()
    {

       $trainers = DB::table('person_role_local')
       ->join('people', 'people.id', '=', 'person_role_local.person_id')
       ->select('people.*')
       ->where('local_id',session('sede'))
       ->where('role_id',3)->get();

       $data = [
       'trainers'    =>  $trainers            
       ];
       return view('trainer.index', $data);
   }


   public function create()
   {
    
    return view('trainer.create');
}


public function store(Request $request)
{
    $this->validate($request, [
        'nombre'         => 'regex:/^[\pL\s\-]+$/u|required|max:100',            
        'apellido_paterno'    => 'regex:/^[\pL\s\-]+$/u|required|max:100',            
        'apellido_materno'    => 'regex:/^[\pL\s\-]+$/u|required|max:100',
        'email'        => 'email|required|max:100|unique:users,email',
        'telefono'        => 'max:15',
        'fecha_nacimiento'     => 'date|required|before:today',
        'documento'     => 'digits_between:6,15|required|max:15',            
        'direccion'      => 'regex:/^[A-Za-zá-úä-üÁ-Ú0-9\-.,!¡¿?; ]+$/u|required|max:500'

        ]);

    if($request['tipo_documento']==0 and strlen($request['documento'])!=8  ){            
        return redirect()->back()->with('warning', 'Número de DNI inválido');
    }    

    try {

        //creo el usuario
        $reg = new RegisterController;            
        $reg->create([
            'name'=>$request['nombre'].' '.$request['apellido_paterno'],
            'email'=>$request['email'],
            'password'=>'123'
            ]);

        $user =  DB::table('users')
        ->where('email', $request['email'] )                    
        ->first();

        //creo la persona
        $trainer = new Person;

        $trainer->sex       = isset($request['sex']) ? 'M' : 'H' ;            
        $trainer->num_doc   = $request['documento'];            
        $trainer->type_doc  = $request['tipo_documento'];            
        $trainer->name      = $request['nombre'];            
        $trainer->lastname1 = $request['apellido_paterno'];
        $trainer->lastname2 = $request['apellido_materno'];
        $trainer->address   = $request['direccion'];
        $trainer->email     = $request['email'];
        $trainer->phone     = $request['telefono'];
        $trainer->birthday  = $request['fecha_nacimiento'];            
        $trainer->user_id   = $user->id; //usuario creado antes
        $trainer->save();

            //creo el rol y local
            
            DB::table('person_role_local')->insert(
                ['role_id' => 3,
                'person_id' => $trainer->id,
                'local_id' => session('sede')
                ]
                );          
            
            return redirect()->route('trainer.index')->with('success', 'El entrenador se ha registrado con éxito para la sede '.Local::find(session('sede'))->name);
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }

    
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}