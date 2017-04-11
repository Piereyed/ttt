<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Period;
use App\Goal;
use App\Experience;
use Illuminate\Support\Facades\DB; //para usar DB


class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periods = Period::get();
        
        $data = [
        'periods'    =>  $periods,
        ];
        return view('period.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $goals = Goal::all();
        $experiences = Experience::all();

        $data = [
        'goals'    =>  $goals,
        'experiences'    =>  $experiences
        ];

        return view('period.create', $data);
    }

    public function getPeriod($id){
        {
       $period = Period::find($id);       
       $pyra = $period->pyramids;//para sacar sus pyramides       
       echo json_encode($period);
   }
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre'       => 'regex:/^[\pL\s\-]+$/u|required|max:100',
            'experiencia'  => 'required',
            'objetivo'     => 'required'
            ]);

        $period = new Period;
        $period->name=$request['nombre'];
        $period->save();

        //creo cada experiencia
        foreach($request['experiencia'] as $key => $exp){
            DB::table('experience_period')->insert(
                ['experience_id' => $exp,
                'period_id' => $period->id
                ]
            ); 
        }

        //creo cada experiencia
        foreach($request['objetivo'] as $key => $obj){
            DB::table('period_goal')->insert(
                ['goal_id' => $obj,
                'period_id' => $period->id
                ]
            ); 
        }


        // dd($request);
        return redirect()->route('period.index')->with('success', 'El periodo se ha registrado con éxito');

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
