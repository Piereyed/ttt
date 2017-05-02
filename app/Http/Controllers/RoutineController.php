<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Period;
use App\Microcycle;
use App\Person;
use App\Program;
use App\Routine;
use App\Routine_exercise;
use App\Exercise;
use App\Muscle;
use App\Training_phase;
use App\Training_detail;
use App\Training_exercise;
use App\Training;
use App\Serie;
use App\Training_session;
use App\Training_session_serie;
use App\Training_session_exercise;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; //para usar DB



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
    public function create($id,$p,$m,$new)
    {
        $nuevo = $new;
        $trainer = Auth::user()->person;

        $person = Person::find($id);
        $period = Period::find($p);
        $microcycle = Microcycle::find($m);
        $exercises = Exercise::all();
        $muscles = Muscle::all();
        $phases = Training_phase::all();

        $arrLetters = [];
        $arrSub    = [];
        $arr_type    = [];
        foreach ($microcycle->units as $unit) {
            if($unit->letter != '-'){
                if(!in_array($unit->letter, $arrLetters, true)){
                    array_push($arrLetters, $unit->letter);
                    array_push($arrSub, $unit->level);
                    array_push($arr_type, $unit->type_session);
                }
                else{
                    $key = array_search($unit->letter, $arrLetters);
                    $arrSub[$key] = $unit->level; 
                } 
            }
        }


        $data = [        
            'nuevo'         =>  $nuevo,
            'period'        =>  $period,
            'microcycle'    =>  $microcycle,
            'client'        =>  $person,
            'trainer'       =>  $trainer,
            'exercises'     =>  $exercises  ,      
            'phases'        =>  $phases  ,      
            'muscles'       =>  $muscles  ,      
            'arrLetters'    =>  $arrLetters  ,      
            'arr_type'      =>  $arr_type  ,      
            'arrSub'        =>  $arrSub
        ];       

        return view('routine.create', $data);
    }

    ///////////////////////////////////////////////////// guardar la rutina
    public function store(Request $request)
    {
        // dd($request);
        $program = null;
        if( $request['nuevo'] == 1 ){
            //terminar el programa anterior
            $program_old = Program::where('person_id',$request['person_id'])->where('finished',0)->first();
            $program_old->finished = 1;
            $program_old->save();
            
            //creo uno nuevo
            $program = new Program;
            $program->number = sizeof(Program::where('person_id',$request['person_id'])->get()) + 1;
            $program->person_id = $request['person_id'];
            $program->finished = 0;
            $program->save();

        }
        else{
            $program = Program::where('person_id',$request['person_id'])->where('finished',0)->first(); 
        }


        $routine = new Routine;
        $routine->number= sizeof($program->routines) + 1;
        $routine->program_id = $program->id;
        $routine->period_id = $request['period_id'];
        $routine->goal_id = $request['goal_id'];
        $routine->total_sessions = $request['total_sesiones'];
        $routine->weeks = $request['total_semanas'];
        $routine->trainings_quantity = $request['cantidad_entrenamientos'];
        $routine->finished = 0;
        $routine->evaluated = 0;
        $routine->person_id = $request['person_id'];
        $routine->trainer_id = Auth::user()->person->id;
        $routine->save();


        for ($i=0; $i < $request['cantidad_entrenamientos'] ; $i++) { 
            $training = new Training;
            $training->letter = $request['letter'][$i];
            $training->level = 0;
            $training->type_session = $request['type_session'][$i];
            $training->resting_time = $request['duracion_descanso'][$i];
            $training->routine_id = $routine->id;
            $training->strength_type_id = 2; //observacion
            $training->save();

            // calentamiento
            for ($j=0; $j < sizeof($request['ejercicio_calentamiento'][$i]); $j++) { 
                $detail = new Training_detail;
                $detail->type = 1;
                $detail->training_id = $training->id;
                $detail->training_phase_id = 1;
                $detail->save();

                // se crea un ejercicio por detalle
                $training_exercise = new Training_exercise;
                $training_exercise->time= $request['t_calentamiento'][$i][$j];
                $training_exercise->exercise_id = $request['ejercicio_calentamiento'][$i][$j];
                $training_exercise->training_detail_id = $detail->id;
                $training_exercise->save();
            }

            // estiramiento
            for ($j=0; $j < sizeof($request['ejercicio_estiramiento'][$i]); $j++) { 
                $detail = new Training_detail;
                $detail->type = 1;
                $detail->training_id = $training->id;
                $detail->training_phase_id = 3;
                $detail->save();

                // se crea un ejercicio por detalle
                $training_exercise = new Training_exercise;
                $training_exercise->time= $request['t_estiramiento'][$i][$j];
                $training_exercise->exercise_id = $request['ejercicio_estiramiento'][$i][$j];
                $training_exercise->training_detail_id = $detail->id;
                $training_exercise->save();
            }

            // principal
            for ($j=0; $j < sizeof($request['tipo_ejer'][$i]); $j++) { 
                $detail = new Training_detail;
                $detail->type = $request['tipo_ejer'][$i][$j];
                $detail->training_id = $training->id;
                $detail->training_phase_id = 2;
                $detail->save();

                if($request['tipo_ejer'][$i][$j] == 1){ //ejercicio simple

                    $training_exercise = new Training_exercise;
                    // $training_exercise->time= 0;
                    // $training_exercise->min_heart_rate= 0;
                    // $training_exercise->max_heart_rate= 0;
                    $training_exercise->exercise_id = $request['id_ejer'][$i][$j];
                    $training_exercise->training_detail_id = $detail->id;
                    $training_exercise->save();



                    //busco en la BD si hay algun RM para ese ejercicio
                    $routine_exercise =Routine_exercise::where('person_id',$request['person_id'])->where('exercise_id',$training_exercise->exercise_id)->orderBy('routine_id','desc')->first();

                    //si no hay registro de RM para ese ejercicio, se ponen 0 en cada serie
                    if( $routine_exercise == null){
                        //se guarda cada serie
                        for ($s=0; $s < sizeof($request['serie'][$i][$j]); $s++) { 
                            $serie = new Serie;
                            $serie->number = $s+1;
                            $serie->repetitions = $request['serie'][$i][$j][$s];
                            $serie->weight = 0 ; //observacion
                            $serie->lb_weight = 0 ; //observacion
                            $serie->percentage_weight = round(102.78 - 2.78 * $serie->repetitions);
                            $serie->training_exercise_id = $training_exercise->id;
                            $serie->save();
                        }  


                        //guardo en latabla routine_exercise CON EL PESO 0
                        $routine_ex = new Routine_exercise;
                        $routine_ex->rm_inicial = 0;
                        $routine_ex->routine_id = $routine->id;
                        $routine_ex->exercise_id = $training_exercise->exercise_id;
                        $routine_ex->person_id = $request['person_id'];
                        $routine_ex->save();

                    }
                    else{//si hay registro de RM para ese ejercicio, se ponen un valor en cada serie

                        $rm_a_usar = $routine_exercise->rm_final/2.20462; //en kg

                        //se guarda cada serie con el PESO REAL A USAR
                        for ($s=0; $s < sizeof($request['serie'][$i][$j]); $s++) { 
                            $serie = new Serie;
                            $serie->number = $s+1;
                            $serie->repetitions = $request['serie'][$i][$j][$s];                            
                            $serie->percentage_weight = round(102.78 - 2.78 * $serie->repetitions);
                            $serie->weight = intdiv(  ($serie->percentage_weight * $rm_a_usar / 100) , 2.26 ) * 2.26;
                            $serie->lb_weight = round($serie->weight / 0.453592);
                            $serie->training_exercise_id = $training_exercise->id;
                            $serie->save();
                        }

                        //guardo en latabla routine_exercise CON EL ULTIMO RM QUE SE SABE
                        $routine_ex = new Routine_exercise;
                        $routine_ex->rm_inicial = $routine_exercise->rm_final;//EL RM final de rutinas anteriores
                        $routine_ex->routine_id = $routine->id;
                        $routine_ex->exercise_id = $training_exercise->exercise_id;
                        $routine_ex->person_id = $request['person_id'];
                        $routine_ex->save();

                    }



                }                    
            }

        }
        
        //verifico si todos los ejercicios ya tienen RM
        if(sizeof(Routine_exercise::where('routine_id',$routine->id)->where('person_id',$routine->person_id)->where('rm_inicial',0)->get()) == 0 ){
            $routine->evaluated = 1;
            $routine->save();
        }


        // ahora a crear las sesiones 
        $microcycle = Microcycle::find($request['microcycle_id']);

        $total_ses = sizeof($microcycle->sessions()) * $request['microciclos'];
        $count = 0;
        while ($count  < $total_ses) {

            foreach ($microcycle->sessions() as $key => $unit) {
                // dd($unit);
                $count ++;
                $t_session = new Training_session;
                $t_session->number = $count;                
                $t_session->done = 0;
                $t_session->work_objetive = 0;
                $t_session->work_done = 0;
                $t_session->efficiency = 0;

                $t_session->training_id = Training::where('routine_id',$routine->id)->where('letter',$unit->letter)->first()->id;
                $t_session->routine_id = $routine->id;
                $t_session->save();
            }
        }

        return redirect()->route('routine.index',$request['person_id'])->with('success', 'La rutina se ha registrado con éxito');


        // dd(sizeof($program->routines));



    }
    public function myroutines()
    {
        $sessions = null;
        $client_id = Auth::user()->person->id;
        $routine = Routine::where('finished',0)->where('person_id',$client_id)->first();

        if($routine != null){
            $sessions = $routine->training_sessions;
        }  

        $data = [
            'routine'     =>  $routine,
            'sessions'    =>  $sessions            
        ];

        //        dd($sessions);
        return view('routine.myroutines', $data);
    }

    public function train($id)
    {

        $training_session = Training_session::find($id);
        $training = Training::find($training_session->training_id);
        $warms = Training_detail::where('training_id',$training->id)->where('training_phase_id',1)->get();
        $stretchs = Training_detail::where('training_id',$training->id)->where('training_phase_id',3)->get();
        $principals = Training_detail::where('training_id',$training->id)->where('training_phase_id',2)->get();

        $data = [
            'training'     =>  $training,
            'warms'        =>  $warms,
            'stretchs'      =>  $stretchs,
            'principals'    =>  $principals,
            'session'      =>  $training_session,
            'routine'      =>  $training->routine            
        ];
        return view('routine.train', $data);
    }
    function rm($rep, $peso){
        return round((0.033 * ($peso / 2.20462) * $rep + ($peso / 2.20462)) * 2.20462);
    }

    public function store_myroutine(Request $request){
        //        dd($request);
        $arr_exercises = [];
        $arr_work=[];
        $arr_work_done=[];
        $arr_rm=[];

        foreach($request['serie'] as $key => $value){
            $serie = Serie::find($value);
            $id_exercise = $serie->training_exercise->exercise_id;




            $t_s_serie = new Training_session_serie;
            $t_s_serie->weight = $serie->lb_weight;
            $t_s_serie->weight_lifted = $request['weight_lifted'][$key];
            $t_s_serie->repetitions = $serie->repetitions;
            $t_s_serie->repetitions_done = $request['repetitions_done'][$key];
            $t_s_serie->work = $t_s_serie->weight * $t_s_serie->repetitions;
            $t_s_serie->work_done = $t_s_serie->weight_lifted * $t_s_serie->repetitions_done;
            $t_s_serie->efficiency = round($t_s_serie->work_done / $t_s_serie->work * 100);
            $t_s_serie->serie_id = $value;
            $t_s_serie->training_session_id = $request['session'];
            $t_s_serie->training_exercise_id = $serie->training_exercise_id;
            $t_s_serie->save();

            $the_rm = round((0.033 * ($t_s_serie->weight_lifted / 2.20462) * $t_s_serie->repetitions_done + ($t_s_serie->weight_lifted / 2.20462)) * 2.20462);

            //si no esta el ejercicio , se mete al arreglo
            if(!in_array($id_exercise, $arr_exercises) ){
                array_push($arr_exercises, $id_exercise) - 1;
                array_push($arr_work, $t_s_serie->work);
                array_push($arr_work_done, $t_s_serie->work_done);
                array_push($arr_rm, $the_rm);
            }
            else{
                //si esta, se calcula
                $key = array_search($id_exercise, $arr_exercises);
                $arr_work[$key] += $t_s_serie->work;
                $arr_work_done[$key] += $t_s_serie->work_done;

                if($the_rm > $arr_rm[$key] ){
                    $arr_rm[$key] = $the_rm;
                }
            }

        }
        //se termina la rutina
        $session = Training_session::find($request['session']);
        $session->done = 1 ;        
        $session->work_objetive = array_sum($arr_work);
        $session->work_done     = array_sum($arr_work_done);
        $session->efficiency    = $session->work_done/$session->work_objetive * 100;
        $session->save();



        //se calculan los resultados por ejercicio de ESA SESION
        foreach( $arr_exercises as $key => $value){
            $t_s_exercise = new Training_session_exercise;
            $t_s_exercise->work_objetive        = $arr_work[$key];
            $t_s_exercise->work_done            = $arr_work_done[$key];
            $t_s_exercise->efficiency           = round($t_s_exercise->work_done / $t_s_exercise->work_objetive * 100); 
            $t_s_exercise->rm                   = $arr_rm[$key];
            $t_s_exercise->training_session_id  = intval($request['session']);
            $t_s_exercise->exercise_id          = $value;
            $t_s_exercise->save();
        }


        //se verifica si es la ultima sesion
        if(sizeof(Training_session::where('routine_id',$session->routine_id)->where('done',0)->get()) == 0 ){
            //se da por terminada la rutina
            $routine =$session->routine;
            $routine->finished = 1;
            $routine->save();


            //se calculan los rm por ejercicio
            $arr = [];            
            foreach($routine->training_sessions as $session){
                array_push($arr,$session->id);
            }
            $t_s_exercises = Training_session_exercise::select('exercise_id', DB::raw('MAX(rm) as rm_max'))->whereIn('training_session_id', $arr)->groupBy('exercise_id')->get();

            foreach( $t_s_exercises as $t_s_exercise ){
                $routine_ex = Routine_exercise::where('routine_id',$routine->id)->where('exercise_id',$t_s_exercise->exercise_id)->first();
                $routine_ex->rm_final = $t_s_exercise->rm_max;//se actualiza el rm maximo que alcanzo en ese ejercicio
                $routine_ex->save();
            }


        }




        return redirect()->route('myroutines.index')->with('success', 'La sesión de entrenamiento se ha registrado con éxito');


    }

    public function show($id)
    {        
        $routine = Routine::find($id);
        $data = [
            'routine'      =>  $routine            
        ];
        return view('routine.show', $data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show_results($id)
    {        
        //        dd(Routine_exercise::where('person_id',44)->where('exercise_id',2)->orderBy('routine_id','desc')->first());
        $arr = [];
        $routine = Routine::find($id);
        foreach($routine->training_sessions as $session){
            array_push($arr,$session->id);
        }
        $t_s_exercises = Training_session_exercise::whereIn('training_session_id', $arr)->get();

        //genero un arreglo con los ejercicios de esa rutina
        $arr_exercises = [];
        foreach($t_s_exercises as $t_s_exercise){
            if( !in_array($t_s_exercise->exercise_id, $arr_exercises) ){
                array_push($arr_exercises, $t_s_exercise->exercise_id);
            }            
        }

        $exercises = Exercise::whereIn('id',$arr_exercises)->get();

        $routine_exercises = Routine_exercise::where('routine_id',$routine->id)->get();
        $data = [
            'routine'           =>  $routine ,           
            'exercises'         =>  $exercises ,           
            't_s_exercises'     =>  $t_s_exercises     ,       
            'routine_exercises' =>  $routine_exercises            
        ];
        return view('evaluation.results', $data);

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
