<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Experience;
use App\Training_exercise;
use App\Measure;
use App\Routine_exercise;
use App\Physical_evaluation;
use App\Physical_Evaluation_Measure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; //para usar DB

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $client = Person::find($id);
        $evaluations = Physical_evaluation::where('person_id',$id)->orderBy('created_at','desc')->get(); 
        
        $data = [
            'client'    =>  $client,
            'evaluations'    =>  $evaluations
        ];
        return view('evaluation.index', $data);
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create_rm($id)
    {
        $client = Person::find($id);
        $routine = $client->routines()->where('finished',0)->first();       

        $t_exercises = DB::table('training_exercises')
            ->join('exercises', 'exercises.id', '=', 'training_exercises.exercise_id')
            ->join('training_details', 'training_details.id', '=', 'training_exercises.training_detail_id')
            ->join('trainings', 'trainings.id', '=', 'training_details.training_id')
            ->join('routines', 'routines.id', '=', 'trainings.routine_id')
            ->where('routines.id','=',$routine->id)
            ->where('exercises.training_phase_id','=',2)
            ->where('exercises.use_weight','=',1)
            ->select('training_exercises.id', 'training_exercises.exercise_id','exercises.name')
            ->distinct()
            ->get();

        //se obtienen los ejercicios que aun no tiene RM para esa rutina
        $routine_exercises = Routine_exercise::where('routine_id',$routine->id)->where('person_id',$id)->where('rm_inicial',0)->get();
        $arr_exercises=[];
        foreach($routine_exercises as $routine_exercise){
            array_push($arr_exercises , $routine_exercise->exercise_id);
        }
//        dd($arr_exercises);

        $data = [
            'client'            =>  $client,
            'routine'           =>  $routine,
            'arr_exercises'     =>  $arr_exercises,
            't_exercises'       =>  $t_exercises
        ];
        return view('evaluation.create_rm', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store_rm(Request $request,$id){
        //        dd($request);
        $routine = Training_exercise::find($request['ids'][0])->training_detail->training->routine;
        for ($i=0; $i < sizeof( $request['ids'] ) ; $i++) { 
            $training_exercise = Training_exercise::find($request['ids'][$i]);
            $rep = $request['rep'][$i];
            $peso = $request['peso'][$i] / 2.20462;   //peso en kilos
            $rm = 0.033 * $peso * $rep + $peso;  //rm en kg

            //actualizo los pesos de las series con la formula del RM
            foreach( $training_exercise->series as $serie ){
                $serie->weight = intdiv(  ($serie->percentage_weight * $rm / 100) , 2.26 ) * 2.26;
                $serie->lb_weight = round($serie->weight / 0.453592);
                $serie->save();
            }

            //actualizo el rm en la tabla routine x exercise
            $routine_ex = Routine_exercise::where('routine_id',$routine->id)->where('exercise_id',$training_exercise->exercise_id)->where('person_id',$routine->person_id)->first();
            $routine_ex->rm_inicial = round($rm * 2.20462); //solo se guarda el RM inicial
            $routine_ex->person_id = $routine->person_id;
            $routine_ex->routine_id = $routine->id;
            $routine_ex->exercise_id = $training_exercise->exercise_id;
            $routine_ex->save();

        }

        //actualizo la rutina en el campo evaluado        
        $routine->evaluated = 1;
        $routine->save();

        return redirect()->route('myathletes.index',Auth::user()->person->id)->with('success', 'La evaluación de RM se ha registrado con éxito para '.$routine->athlete->name);

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
//            'ica'         => 'required|numeric'            



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
//        $measure = new Physical_Evaluation_Measure; 
//        $measure->physical_evaluation_id = $ev->id;
//        $measure->measure_id=19;
//        $measure->value= $request['ica'];
//        $measure->save();


        return redirect()->route('evaluation.index',$person->id)->with('success', 'La evaluación se ha registrado con éxito para '.$person->name);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evaluation = Physical_Evaluation::find($id);
        
        $data = [
            'evaluation'       =>  $evaluation
        ];
        return view('evaluation.show', $data);
        
    }

    /**
     * Show the formrm for editing the specified resource.
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
