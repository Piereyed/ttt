<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Local;
use App\Role;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile; //para archivos
use Illuminate\Support\Facades\DB; //para usar DB

class AdminController extends Controller
{

    public function index()
    {                 
        $admins = Role::find(2)->administradores->unique();
        
        $data = [
        'admins'    =>  $admins            
        ];
        return view('admin.index', $data);
    }

    public function search()
    {
        $query = "
        SELECT 
        people.id,people.name,people.lastname1,people.lastname2,people.photo
        FROM (
        SELECT people.id,people.name,people.lastname1,people.lastname2,people.photo from person_role_local inner join people on people.id = person_role_local.person_id 
        WHERE local_id =".session('sede')." and role_id= 2
        ) as admins     
        RIGHT JOIN people
        ON people.id = admins.id
        WHERE admins.id IS NULL and people.id > 1"    ;

        $people = DB::select(DB::raw($query));

        echo json_encode($people);
    }

    public function create()
    {
        $locals = Local::get();
        $data = [
        'locals'   =>  $locals
        ];
        return view('admin.create',$data);
    }

    public function storerole(Request $request){

    // dd($request);
        $this->validate($request, [
            'nombre'         => 'required',
            ]);

        try{
        //creo el rol y local
            DB::table('person_role_local')->insert(
                ['role_id' => 2,
            'person_id' => $request['nombre'],//codigo
            'local_id' => session('sede')
            ]
            );  
            return redirect()->route('trainer.index')->with('success', 'El administrador se ha asignado con éxito para la sede '.Local::find(session('sede'))->name);
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
            'sede'        => 'required',
            'foto'        => 'nullable|file'             
            ]);
        

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

            //creo la persona
            $admin = new Person;

            $admin->sex       = isset($request['sex']) ? 'M' : 'H' ;            
            $admin->num_doc       = $request['documento'];            
            $admin->type_doc       = $request['tipo_documento'];            
            $admin->name       = $request['nombre'];            
            $admin->lastname1  = $request['apellido_paterno'];
            $admin->lastname2  = $request['apellido_materno'];
            $admin->address  = $request['direccion'];
            $admin->email  = $request['email'];
            $admin->phone  = $request['telefono'];
            $admin->birthday  = $request['fecha_nacimiento'];            
            $admin->user_id  = $user->id; //usuario creado antes
            $admin->save();

            //creo el rol y local
            foreach($request['sede'] as $key => $sede){
                DB::table('person_role_local')->insert(
                    ['role_id' => 2,
                    'person_id' => $admin->id,
                    'local_id' => $sede
                    ]
                    ); 
            }

            //subo la foto
            if ($request->hasFile('foto')){
                if ($request->file('foto')->isValid()) {            
                    $request->foto->storeAs('public/fotos_perfil', $admin->id.'.jpg');
                    $admin->photo   = 'fotos_perfil/'. $admin->id.'.jpg' ;  
                    $admin->save();   
                }
                else{
                    return redirect()->route('admin.index')->with('warning', 'Se registró al administrador pero ocurrió un error al subir la foto.');
                } 
            }
            else{//si no hay foto
                $admin->photo   = 'fotos_perfil/default.jpg' ;  
                $admin->save();
            }

            return redirect()->route('admin.index')->with('success', 'El administrador se ha registrado con éxito para '.count($request['sede']).' sede(s).');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al hacer esta acción');
        }
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $client = Person::find($id);
        $data = [
        'client'       => $client,
        'title'        => "Editar cliente",
        ];

        return view('client.edit',$data);
    }


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
