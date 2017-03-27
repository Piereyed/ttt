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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $this->validate($request, [
        'nombre'       => 'regex:/^[\pL\s\-]+$/u|required|max:100',
        'tipo'         => 'required',
        'fase'         => 'required',
        'descripcion'  => 'required',
        'experiencia'  => 'required',
        'musculo'      => 'required',
        'zona'         => 'nullable',
        'foto'        => 'required|file'  ,

        ]);

     // dd($request);

     try {
        $exercise = new Exercise;
        $exercise->name       = $request['nombre']; 
        $exercise->description       = $request['descripcion']; 
        $exercise->type       = $request['tipo']; 
        $exercise->training_phase_id       = $request['fase']; 
        $exercise->experience_id       = $request['experiencia']; 
        $exercise->photo      = $request['foto'];

        $exercise->save();

        //se guarda la relacion
        $exer_muscle = new Exercise_Muscle;
        $exer_muscle->muscle_id = $request['musculo'];
        $exer_muscle->zone_id = $request['zona'];
        $exer_muscle->exercise_id = $exercise->id;
        $exer_muscle->save();

        //subo la foto
        if ($request->hasFile('foto')){
            if ($request->file('foto')->isValid()) {            
                $request->foto->storeAs('public/fotos_ejercicios', $exercise->id.'.jpg');
                $exercise->photo   = 'fotos_perfil/'. $exercise->id.'.jpg' ;  
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
