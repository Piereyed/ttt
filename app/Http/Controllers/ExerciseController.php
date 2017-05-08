<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exercise;
use App\Experience;
use App\Muscle;
use App\Zone;
use App\TrainingPhase;
use App\Exercise_Muscle;
use Illuminate\Support\Facades\DB; //para usar DB

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercises = Exercise::get();        
        $data = [
            'exercises'    =>  $exercises

        ];
        return view('exercise.index', $data);
    }



    public function create()
    {
        $phases = TrainingPhase::all();
        $muscles = Muscle::all();
        $experiences = Experience::all();

        $data = [
            'phases'    =>  $phases,
            'muscles'    =>  $muscles,
            'experiences'    =>  $experiences        
        ];

        return view('exercise.create',$data);
    }

    public function getZones($id_muscle)
    {
        $zones = DB::table('zones')->where('muscle_id',$id_muscle)->get();
        echo json_encode($zones);
        // echo "ok";
    }

    public function obtain(Request $request)
    {
        $this->validate($request, [
            'musculo1'         => 'required'
        ]);
        
        $query = "select exercises.id as id, name ,AVG( rm_final - rm_inicial)  as dif 
                    from exercises 
                    INNER JOIN exercise_muscle ON exercises.id =exercise_muscle.exercise_id
                    LEFT JOIN routine_exercise ON exercises.id =routine_exercise.exercise_id
                    where muscle_id=" . $request['musculo1']." and
                     type=1 and
                     training_phase_id=2
                    GROUP BY id , name 
                    ORDER BY dif desc";
        //        $routine_exercises = DB::table('exercises')
        //            ->leftJoin('routine_exercise', 'exercises.id', '=', 'routine_exercise.exercise_id')
        //            ->select(DB::raw('exercises.id as id ,exercises.name as name, AVG(rm_final - rm_inicial) as diff'))
        //            ->where('routine_exercise.person_id',$request['person'])
        //            ->groupBy('id','name')
        //            ->orderBy('diff','desc')
        //            ->get();
        $exercises = DB::select(DB::raw($query));

//                dd($exercises[0]->id);
        $index = $request['index'];
        try {            
            $data = [
                'muscle_id'    =>  $request['musculo1'],
                'muscle_name'    =>  Muscle::find($request['musculo1'])->name,
                'exercises'    =>  $exercises,
                'index'    =>  $index
            ];

            //le paso todo a la vista donde esta la tabla
            return response()->view('exercise.obtain', $data);        
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }

    public function obtain_warm(Request $request)
    {
        // dd($request); 
        $index = $request['index'];
        $muscles = $request['arr_muscles'];

        try {            
            $exercises = Exercise::where('training_phase_id',1)->get();            

            $data = [
                'exercises'    =>  $exercises,
                'index'    =>  $index
            ];

            //le paso todo a la vista donde esta la tabla
            return response()->view('exercise.obtain_warm', $data);        
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }

    public function obtain_strech(Request $request)
    {
        //         dd($request); 
        $index = $request['index'];
        $arr_muscles = explode(",", $request['arr_muscles']);
        $new = array();
        for($k=0;$k<sizeof($arr_muscles);$k++){
            array_push($new, intval($arr_muscles[$k]));
        }


        try {       
            $exercises = Exercise_Muscle::whereIn('muscle_id',$new)->get();
            //            dd($exercises);
            $data = [
                'exercises'    =>  $exercises,
                'index'    =>  $index
            ];

            //le paso todo a la vista donde esta la tabla
            return response()->view('exercise.obtain_strech', $data);        
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre'       => 'regex:/^[\pL\s\-]+$/u|required|max:100',
            'tipo'         => 'required',
            'fase'         => 'required',
            'descripcion'  => 'required',
            'experiencia'  => 'required',
            'peso'         => 'nullable',
            'musculo'      => 'nullable', //observacion
            'zona_pecho'   => 'nullable',
            'zona_espalda' => 'nullable',
            'foto'         => 'required|file'  ,        

        ]);

        // dd($request);

        try {
            $exercise = new Exercise;
            $exercise->name              = $request['nombre']; 
            $exercise->description       = $request['descripcion']; 
            $exercise->type              = $request['tipo']; 
            $exercise->use_weight        = isset($request['peso']) ;      // V o F 
            $exercise->training_phase_id = $request['fase']; 
            $exercise->experience_id     = $request['experiencia']; 
            $exercise->photo      = $request['foto'];

            $exercise->save();

            //se guardan las relaciones
            if($request['tipo'] == 0){ //si es de calentamiento son todos los musculos
                $musculos = ["1","2","3","4","5","6","7","8","9","10","11","12","13"];
            }
            else{
                $musculos = $request['musculo'];
            }


            for ($i=0; $i < sizeof($musculos) ; $i++) { 
                $exer_muscle = new Exercise_Muscle;
                $exer_muscle->muscle_id = $musculos[$i] ;
                if( $musculos[$i] == "5" &&  isset($request['zona_pecho'])){
                    $exer_muscle->zone_id = $request['zona_pecho'];
                }
                else if( $musculos[$i] == "6" && isset($request['zona_espalda'])){
                    $exer_muscle->zone_id = $request['zona_espalda'];
                }
                $exer_muscle->exercise_id = $exercise->id;
                $exer_muscle->save();
            }


            //subo la foto
            if ($request->hasFile('foto')){
                if ($request->file('foto')->isValid()) {            
                    $request->foto->storeAs('public/fotos_ejercicios', $exercise->id.'.jpg');
                    $exercise->photo   = 'fotos_ejercicios/'. $exercise->id.'.jpg' ;  
                    $exercise->save();
                }
                else{
                    return redirect()->route('exercise.index')->with('warning', 'Se registró el ejercicio pero ocurrió un error al subir la foto.');
                } 
            }

            return redirect()->route('exercise.index')->with('success', 'El ejercicio se ha registrado con éxito.');
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
