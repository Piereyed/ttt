<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Period;
use App\Microcycle;
use App\Person;
use App\Program;
use App\Exercise;

class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $programs = Program::where('person_id',$id)->get();
        $person = Person::find($id);
        $person = Person::find($id);
        $data = [
        'programs'    =>  $programs,
        'person'    =>  $person
        ];
        return view('routine.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id,$p,$m)
    {
        $person = Person::find($id);
        $period = Period::find($p);
        $microcycle = Microcycle::find($m);
        $exercises = Exercise::all();

        $arrLetters = [];
        $arrSub    = [];
        foreach ($microcycle->units as $unit) {
            if($unit->letter != '-'){
                if(!in_array($unit->letter, $arrLetters, true)){
                    array_push($arrLetters, $unit->letter);
                    array_push($arrSub, $unit->level);
                }
                else{
                    $key = array_search($unit->letter, $arrLetters);
                    $arrSub[$key] = $unit->level; 
                } 
            }
        }


        $data = [        
        'period'        =>  $period,
        'microcycle'    =>  $microcycle,
        'client'        =>  $person,
        'exercises'     =>  $exercises  ,      
        'arrLetters'    =>  $arrLetters  ,      
        'arrSub'        =>  $arrSub
        ];       

        return view('routine.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
