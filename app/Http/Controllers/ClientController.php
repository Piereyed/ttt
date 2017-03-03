<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Client;
use App\Local;
use App\Http\Controllers\Auth\RegisterController;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $clients = Client::get();
        //        $clients_pag = Client::paginate(10);
        $data = [
            'clients'    =>  $clients,
            //            'size'       => count($clients),
        ];
        return view('client.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locals = Local::get();
        $data = [
            'locals'   =>  $locals
        ];
        return view('client.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //        dd($request);

        $this->validate($request, [
            'name'         => 'regex:/^[\pL\s\-]+$/u|required|max:100',            
            'lastname1'    => 'regex:/^[\pL\s\-]+$/u|required|max:100',            
            'lastname1'    => 'regex:/^[\pL\s\-]+$/u|required|max:100',
            'email'        => 'email|required|max:100',
            'phone'        => 'max:15',
            'birthday'     => 'date|required|before:today',
            'document'     => 'digits_between:6,15|required|max:15',            
            'address'      => 'regex:/^[A-Za-zá-úä-üÁ-Ú0-9\-.,!¡¿?; ]+$/u|required|max:500',            
            'local'        => 'required',
            
        ]);



        if($request['type_document']==0 and strlen($request['document'])!=8  )
            return redirect()->back()->with('warning', 'Número de DNI inválido');

        try {
            $client = new Client;

            $client->sex       = isset($request['sex']) ? 'M' : 'H' ;            
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


            //registrara usuario
            $reg = new RegisterController;            
            $reg->create([
                'name'=>$client->name.' '.$client->lastname1,
                'email'=>$client->email,
                'password'=>'123123'
            ]);


            return redirect()->route('client.index')->with('success', 'El cliente se ha registrado con éxito.');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $client = Client::find($id);
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
            $client = Client::find($id);
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
            $client   = Client::find($id);
            $client->delete();
            return redirect()->route('client.index')->with('success', 'El cliente se ha eliminado con éxito');


        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }
}
