<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LocalRequest; //request for local
use App\Local;

class LocalController extends Controller
{
    public function index()
    {   
        $locals = Local::get();
        $locals_pag = Local::paginate(10);
        $data = [
            'locals'    =>  $locals_pag,
            'size'       => count($locals),
        ];
        return view('local.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('local.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocalRequest $request)
    {
//        dd($request);

        try {
            $local = new Local;
            $local->name       = $request['name'];            
            $local->address  = $request['address'];

            $local->save();
            return redirect()->route('local.index')->with('success', 'La sede se ha registrado con éxito.');
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
        $local = Local::find($id);
        $data = [
            'local'       => $local,
        ];
        
        return view('local.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LocalRequest $request, $id)
    {
         try {
            $local = Local::find($id);
            $local->name       = $request['name'];            
            $local->address  = $request['address'];
            $local->save();
            return redirect()->route('local.index')->with('success', 'La sede se ha actualizado con éxito.');
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
//        dd($id);
        try {
            $local   = Local::find($id);
            
//            if(count($local->questions) ==0){//solo si la competencia no se ha usado
            if(true){//solo si la competencia no se ha usado
                $local->delete();
                return redirect()->route('local.index')->with('success', 'La sede se ha eliminado con éxito');
            }
            else{
                return redirect()->back()->with('warning', 'La sede no se puede eliminar.');
            }            
            
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }
}
