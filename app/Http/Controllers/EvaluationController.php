<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Experience;
use App\Measure;
use App\Physical_evaluation;
use App\Physical_Evaluation_Measure;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
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
    public function create($id)
    {
        $client = Person::find($id);
        $measures = Measure::all();
        $experiences = Experience::all();
        
        $data = [
            'client'    =>  $client,
            'measures'    =>  $measures,
            'experiences'    =>  $experiences
        ];
        return view('evaluation.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $this->validate($request, [
        'experiencia'         => 'required',            
        'objetivo'         => 'required',            
        'cuello'         => 'required|numeric',            
        'hombros'         => 'required|numeric'  ,          
        'pecho'         => 'required|numeric'     ,       
        'cintura'         => 'required|numeric'    ,        
        'cadera'         => 'required|numeric'      ,      
        'brazo'         => 'required|numeric'        ,    
        'antebrazo'         => 'required|numeric'     ,       
        'trasero'         => 'required|numeric'        ,    
        'pierna'         => 'required|numeric'          ,  
        'pantorrilla'         => 'required|numeric'      ,      
        'talla'         => 'required|numeric'            ,
        'peso'         => 'required|numeric'            ,
        'porcentajeGrasa'         => 'required|numeric'      ,      
        'grasa'         => 'required|numeric'            ,
        'porcentajeMasaMagra'         => 'required|numeric'  ,          
        'masaMagra'         => 'required|numeric'         ,   
        'imc'         => 'required|numeric'            ,
        'icc'         => 'required|numeric'            ,
        'ica'         => 'required|numeric'            
                   
        

        ]);
        // dd($request);

        $person = Person::find($id);
        $person->experience_id = $request['experiencia'];
        $person->goal_id = $request['objetivo'];
        $person->save();

        
        $ev = new Physical_evaluation;
        $ev->person_id = $id;
        $ev->save();

        //cuello
        $measure = new Physical_Evaluation_Measure; 
        $measure->physical_evaluation_id = $ev->id;
        $measure->measure_id=1;
        $measure->value= $request['cuello'];
        $measure->save();

        //hombros
        $measure = new Physical_Evaluation_Measure; 
        $measure->physical_evaluation_id = $ev->id;
        $measure->measure_id=2;
        $measure->value= $request['hombros'];
        $measure->save();

        //pecho
        $measure = new Physical_Evaluation_Measure; 
        $measure->physical_evaluation_id = $ev->id;
        $measure->measure_id=3;
        $measure->value= $request['pecho'];
        $measure->save();

        //cintura
        $measure = new Physical_Evaluation_Measure; 
        $measure->physical_evaluation_id = $ev->id;
        $measure->measure_id=4;
        $measure->value= $request['cintura'];
        $measure->save();

        //cadera
        $measure = new Physical_Evaluation_Measure; 
        $measure->physical_evaluation_id = $ev->id;
        $measure->measure_id=5;
        $measure->value= $request['cadera'];
        $measure->save();

        //brazo
        $measure = new Physical_Evaluation_Measure; 
        $measure->physical_evaluation_id = $ev->id;
        $measure->measure_id=6;
        $measure->value= $request['brazo'];
        $measure->save();

        //antebrazo
        $measure = new Physical_Evaluation_Measure; 
        $measure->physical_evaluation_id = $ev->id;
        $measure->measure_id=7;
        $measure->value= $request['antebrazo'];
        $measure->save();

        //trasero
        $measure = new Physical_Evaluation_Measure; 
        $measure->physical_evaluation_id = $ev->id;
        $measure->measure_id=8;
        $measure->value= $request['trasero'];
        $measure->save();

        //pierna
        $measure = new Physical_Evaluation_Measure; 
        $measure->physical_evaluation_id = $ev->id;
        $measure->measure_id=9;
        $measure->value= $request['pierna'];
        $measure->save();

        //pantorrilla
        $measure = new Physical_Evaluation_Measure; 
        $measure->physical_evaluation_id = $ev->id;
        $measure->measure_id=10;
        $measure->value= $request['pantorrilla'];
        $measure->save();

        //talla
        $measure = new Physical_Evaluation_Measure; 
        $measure->physical_evaluation_id = $ev->id;
        $measure->measure_id=11;
        $measure->value= $request['talla'];
        $measure->save();

        //peso
        $measure = new Physical_Evaluation_Measure; 
        $measure->physical_evaluation_id = $ev->id;
        $measure->measure_id=12;
        $measure->value= $request['peso'];
        $measure->save();

        //porcentajeGrasa
        $measure = new Physical_Evaluation_Measure; 
        $measure->physical_evaluation_id = $ev->id;
        $measure->measure_id=13;
        $measure->value= $request['porcentajeGrasa'];
        $measure->save();

        //grasa
        $measure = new Physical_Evaluation_Measure; 
        $measure->physical_evaluation_id = $ev->id;
        $measure->measure_id=14;
        $measure->value= $request['grasa'];
        $measure->save();

        //porcentajeMasaMagra
        $measure = new Physical_Evaluation_Measure; 
        $measure->physical_evaluation_id = $ev->id;
        $measure->measure_id=15;
        $measure->value= $request['porcentajeMasaMagra'];
        $measure->save();

        //masaMagra
        $measure = new Physical_Evaluation_Measure; 
        $measure->physical_evaluation_id = $ev->id;
        $measure->measure_id=16;
        $measure->value= $request['masaMagra'];
        $measure->save();

        //imc
        $measure = new Physical_Evaluation_Measure; 
        $measure->physical_evaluation_id = $ev->id;
        $measure->measure_id=17;
        $measure->value= $request['imc'];
        $measure->save();

        //icc
        $measure = new Physical_Evaluation_Measure; 
        $measure->physical_evaluation_id = $ev->id;
        $measure->measure_id=18;
        $measure->value= $request['icc'];
        $measure->save();

        //ica
        $measure = new Physical_Evaluation_Measure; 
        $measure->physical_evaluation_id = $ev->id;
        $measure->measure_id=19;
        $measure->value= $request['ica'];
        $measure->save();


        return redirect()->route('myathletes.index',Auth::user()->person->id)->with('success', 'La evaluación se ha registrado con éxito para '.$person->name);

        

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
