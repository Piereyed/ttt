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

    public function create()
    {
        $locals = Local::get();
        $data = [
        'locals'   =>  $locals
        ];
        return view('admin.create',$data);
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
            if ($request->hasFile('foto') && $request->file('foto')->isValid()) {            
                $path = $request->foto->storeAs('public/fotos_perfil', $admin->id.'.jpg');                
            }
            else if ($request->hasFile('foto') && !$request->file('foto')->isValid() ){
                return redirect()->back()->with('warning', 'Se registró al administrador pero ocurrió un error al subir la foto.');
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
