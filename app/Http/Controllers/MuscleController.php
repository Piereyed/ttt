<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Muscle;

class MuscleController extends Controller
{

    public function index()
    {
        $muscles = Muscle::get();        
        $data = [
        'muscles'    =>  $muscles
        
        ];
        return view('muscle.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('muscle.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre'         => 'regex:/^[\pL\s\-]+$/u|required|max:100'
            ]);

        try {
            $muscle             = new Muscle;
            $muscle->name       = $request['nombre']; 

            $muscle->save();
            return redirect()->route('muscle.index')->with('success', 'El músculo se ha registrado con éxito');
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
