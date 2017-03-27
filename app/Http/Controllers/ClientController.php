<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Person_Role_Local;
use App\Local;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\DB; //para usar DB

class ClientController extends Controller
{
    public function index()
    {          
        // $clients = DB::table('person_role_local')
        // ->join('people', 'people.id', '=', 'person_role_local.person_id')
        // ->select('people.*')
        // ->where('local_id',session('sede'))
        // ->where('role_id',4)->get();

        $clients=Person_Role_Local::where('local_id',session('sede'))->where('role_id',4)->get();

        $trainers = DB::table('person_role_local')
        ->join('people', 'people.id', '=', 'person_role_local.person_id')
        ->select('people.*')
        ->where('local_id',session('sede'))
        ->where('role_id',3)->get();

        $data = [
        'clients'    =>  $clients,
        'trainers'    =>  $trainers
        ];
        return view('client.index', $data);
    }

    public function search()
    {
        //devuelve las personas que no son clientes de mi sede
        $query = "
        SELECT 
        people.id,people.name,people.lastname1,people.lastname2,people.photo
        FROM (
        SELECT people.id,people.name,people.lastname1,people.lastname2,people.photo from person_role_local inner join people on people.id = person_role_local.person_id 
        WHERE local_id =".session('sede')." and role_id= 4
        ) as clients     
        RIGHT JOIN people
        ON people.id = clients.id
        WHERE clients.id IS NULL and people.id > 1"    ;

        $people = DB::select(DB::raw($query));

        echo json_encode($people);
    }


    public function create()
    {

        $trainers = DB::table('person_role_local')
        ->join('people', 'people.id', '=', 'person_role_local.person_id')
        ->select('people.*')
        ->where('local_id',session('sede'))
        ->where('role_id',3)->get();

        $data = [
        'trainers'    =>  $trainers
        ];

        return view('client.create',$data);
    }

    public function storerole(Request $request){

    // dd($request);
        $this->validate($request, [
            'nombre'         => 'required',
            'entrenador'     => 'required'
            ]);

        try{
            //borro los roles del cliente en otra sede si hubiera
            Person_Role_Local::where('role_id',4)->where('person_id',$request['nombre'])->delete();

            //creo el rol y local
            $person_role_local = new Person_Role_Local;
            $person_role_local->role_id = 4;
            $person_role_local->person_id = $request['nombre'];//codigo
            $person_role_local->local_id = session('sede');
            $person_role_local->save();

            //actualizo su entrenador
            $person_role_local->person->trainer_id=$request['entrenador'];
            $person_role_local->person->save();

            //actualizar el session rol        
            if($request['nombre'] == Auth::user()->person->id ){
                $roles = session('roles');
                array_push($roles,'Cliente');
                session(['roles' => $roles]); 
            } 
            
            return redirect()->route('client.index')->with('success', 'El cliente se ha asignado con éxito para la sede '.Local::find(session('sede'))->name);

        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }

    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre'         => 'regex:/^[\pL\s\-]+$/u|required|max:100',            
            'apellido_paterno'    => 'regex:/^[\pL\s\-]+$/u|required|max:100',            
            'apellido_materno'    => 'regex:/^[\pL\s\-]+$/u|required|max:100',
            'email'        => 'email|required|max:100|unique:users,email',
            'telefono'        => 'nullable|digits_between:6,15',
            'fecha_nacimiento'     => 'date|required|before:today',
            'documento'     => 'unique:people,num_doc|digits_between:6,15|required|max:15',            
            'direccion'      => 'regex:/^[A-Za-zá-úä-üÁ-Ú0-9\-.,!¡¿?; ]+$/u|required|max:500',        
            'foto'        => 'nullable|file'  ,
            'entrenador' =>'required' 
            
            ]);
        // dd($request);

        if($request['tipo_documento']==0 and strlen($request['documento'])!=8  ){            
            return redirect()->back()->with('error', 'Número de DNI inválido');
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
            $client->trainer_id   = $request['entrenador']; //su entrenador
            $client->save();


            //creo el rol y local            
            DB::table('person_role_local')->insert(
                ['role_id' => 4, //rol cliente
                'person_id' => $client->id,
                'local_id' => session('sede')
                ]
                );

            //subo la foto
            if ($request->hasFile('foto')){
                if ($request->file('foto')->isValid()) {            
                    $request->foto->storeAs('public/fotos_perfil', $client->id.'.jpg');
                    $client->photo   = 'fotos_perfil/'. $client->id.'.jpg' ;  
                    $client->save();   
                }
                else{
                    return redirect()->route('client.index')->with('warning', 'Se registró al cliente pero ocurrió un error al subir la foto.');
                } 
            }
            else{//si no hay foto
                $client->photo   = 'fotos_perfil/default.jpg' ;  
                $client->save();
            }       

            return redirect()->route('client.index')->with('success', 'El cliente se ha registrado con éxito para la sede '.Local::find(session('sede'))->name);
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }

    public function show($id)
    {
        $client = Person::find($id);

     // dd($client->birthday);
        $birthDate = explode("-", $client->birthday);
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md") ? ((date("Y") - $birthDate[0]) - 1): (date("Y") - $birthDate[0]));

        $data = [
        'client'    =>  $client,
        'age'        => $age
        ];
        return view('client.show', $data);
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
