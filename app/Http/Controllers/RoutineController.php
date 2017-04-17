<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Period;
use App\Microcycle;
use App\Person;
use App\Program;
use App\Routine;
use App\Exercise;
use App\Muscle;
use App\Training_phase;
use App\Training_detail;
use App\Training_exercise;
use App\Training;
use App\Serie;
use App\Training_session;
use Illuminate\Support\Facades\Auth;


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
        $program = new Program;
        $program->number = sizeof(Program::where('person_id',$request['person_id'])->get()) + 1;
        $program->person_id = $request['person_id'];
        $program->save();

        $routine = new Routine;
        $routine->number= sizeof($program->routines) + 1;
        $routine->program_id = $program->id;
        $routine->period_id = $request['period_id'];
        $routine->goal_id = $request['goal_id'];
        $routine->total_sessions = $request['total_sesiones'];
        $routine->weeks = $request['total_semanas'];
        $routine->trainings_quantity = $request['cantidad_entrenamientos'];
        $routine->finished = 0;
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

                    for ($s=0; $s < sizeof($request['serie'][$i][$j]); $s++) { 
                        $serie = new Serie;
                        $serie->number = $s+1;
                        $serie->repetitions = $request['serie'][$i][$j][$s];
                        $serie->weight = 0 ; //observacion
                        $serie->percentage_weight = round(102.78 - 2.78 * $serie->repetitions);
                        $serie->training_exercise_id = $training_exercise->id;
                        $serie->save();
                    }                    
                }                    
            }
            
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
                $t_session->routine_id = $routine->id;
                $t_session->done = 0;
                $t_session->training_id = Training::where('routine_id',$routine->id)->where('letter',$unit->letter)->first()->id;
                $t_session->save();
            }
        }

        return redirect()->route('routine.index',$request['person_id'])->with('success', 'La rutina se ha registrado con éxito');


    // dd(sizeof($program->routines));



    }
    public function myroutines()
    {
        $client_id = Auth::user()->person->id;
        $routine = Routine::where('finished',0)->where('person_id',$client_id)->first();
        $sessions = $routine->training_sessions;

        $data = [
            'routine'     =>  $routine,
            'sessions'    =>  $sessions            
        ];
        return view('routine.myroutines', $data);
    }

    public function train($id)
    {

        $training = Training::find($id);
        $warms = Training_detail::where('training_id',$training->id)->where('training_phase_id',1)->get();
        $stretchs = Training_detail::where('training_id',$training->id)->where('training_phase_id',3)->get();
        $principals = Training_detail::where('training_id',$training->id)->where('training_phase_id',2)->get();

        $data = [
            'training'     =>  $training,
            'warms'        =>  $warms,
            'stretchs'      =>  $stretchs,
            'principals'    =>  $principals,
            'routine'      =>  $training->routine            
        ];
        return view('routine.train', $data);
    }


    public function store_myroutine(Request $request){
        dd($request);
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
