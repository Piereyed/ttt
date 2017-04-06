<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Period;
use App\Pyramid;


class PyramidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $periods = Period::all();

        $data = [
        'periods'    =>  $periods
        
        ];

        return view('pyramid.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
        'periodo'           => 'required',
        'duracion_descanso' => 'required|numeric',
        'numero_series'     => 'required|numeric',
        'series'            => 'required'
        ]);
       

       try {
            $periodo = Period::find($request['periodo']);
            $periodo->rest_duration = $request['duracion_descanso'];
            $periodo->number_series = $request['numero_series'];
            $periodo->save();

            for ($i=0; $i < $request['numero_series'] ; $i++) { 
               $py = new Pyramid;
               $py->period_id = $periodo->id; 
               $py->percentage_rm = $request['series'][$i];
               $py->save();
            }

           return redirect()->route('pyramid.create')->with('success', 'Se actualizó la pirámide para el periodo con éxito');
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
