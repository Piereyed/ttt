<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Local;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\DB; //para usar DB

class ClientController extends Controller
{
    public function index()
    {          
        $clients = DB::table('person_role_local')
        ->join('people', 'people.id', '=', 'person_role_local.person_id')
        ->select('people.*')
        ->where('local_id',session('sede'))
        ->where('role_id',4)->get();

        $data = [
        'clients'    =>  $clients
        ];
        return view('client.index', $data);
    }


    public function create()
    {        
        return view('client.create');
    }


    public function store(Request $request)
    {
        //        dd($request);
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

            $client = new Person;

            $client->sex        = isset($request['sex']) ? 'M' : 'H' ;            
            $client->num_doc    = $request['documento'];            
            $client->type_doc   = $request['tipo_documento'];            
            $client->name       = $request['nombre'];            
            $client->lastname1  = $request['apellido_paterno'];
            $client->lastname2  = $request['apellido_materno'];
            $client->address    = $request['direccion'];
            $client->email      = $request['email'];
            $client->phone      = $request['telefono'];
            $client->birthday   = $request['fecha_nacimiento'];
            $client->user_id   = $user->id; //usuario creado antes
            $client->save();


            //creo el rol y local            
            DB::table('person_role_local')->insert(
                ['role_id' => 4, //rol cliente
                'person_id' => $client->id,
                'local_id' => session('sede')
                ]
                );

            return redirect()->route('client.index')->with('success', 'El cliente se ha registrado con éxito para la sede '.Local::find(session('sede'))->name);
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
        $client = Person::find($id);
        $data = [
        'client'       => $client,
        'title'        => "Editar cliente",
        ];

        return view('client.edit',$data);
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
        try {
            $client = Person::find($id);
            $client->sex       = $request['sex'];            
            $client->num_doc       = $request['document'];            
            $client->type_doc       = $request['type_document'];            
            $client->name       = $request['name'];            
            $client->lastname1  = $request['lastname1'];
            $client->lastname2  = $request['lastname2'];
            $client->address  = $request['address'];
            $client->email  = $request['email'];
            $client->phone  = $request['phone'];
            $client->birthday  = $request['birthday'];
            //            $client->address  = $request['local'];

            $client->save();
            return redirect()->route('client.index')->with('success', 'El cliente se ha actualizado con éxito.');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $client   = Person::find($id);
            $client->delete();
            return redirect()->route('client.index')->with('success', 'El cliente se ha eliminado con éxito');


        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }
}
