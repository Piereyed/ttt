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
        
        // $locals_pag = Local::paginate(10);
        $data = [
        'locals'    =>  $locals,
        // 'size'       => count($locals),
        ];
        return view('local.index', $data);
    }

  
    public function create()
    {
        return view('local.create');
    }

   
    public function store(Request $request)
    {
//        dd($request);
         $this->validate($request, [
            'nombre'    => 'regex:/^[\pL\s\-]+$/u|required|max:100',            
            'direccion' => 'regex:/^[A-Za-zá-úä-üÁ-Ú0-9\-.,!¡¿?; ]+$/u|required|max:500',
            ]);

         try {
            $local = new Local;
            $local->name       = $request['nombre'];            
            $local->address  = $request['direccion'];
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

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre'    => 'regex:/^[\pL\s\-]+$/u|required|max:100',            
            'direccion' => 'regex:/^[A-Za-zá-úä-üÁ-Ú0-9\-.,!¡¿?; ]+$/u|required|max:500',
            ]);

       try {
        $local = Local::find($id);
        $local->name       = $request['nombre'];            
        $local->address  = $request['direccion'];
        $local->save();
        return redirect()->route('local.index')->with('success', 'La sede se ha actualizado con éxito.');
    } catch (Exception $e) {
        return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
    }
}


public function destroy($id)
{
    try {
        $local   = Local::find($id);
            if(count($local->people) ==0){//solo si la sede no se ha usado
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
