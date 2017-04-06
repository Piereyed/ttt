<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goal;
use App\Experience;
use App\Microcycle;
use App\UnitMicrocycle;

class MicrocycleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $microcycles = Microcycle::all();

        $data = [
        'microcycles'    =>  $microcycles
        ];

        return view('microcycle.index', $data);
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

     return view('microcycle.create', $data);
 }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $this->validate($request, [
            'objetivo'         => 'required',
            'experiencia'      => 'required',
            'letra'            => 'required'
            ]);

        try{
            $microcycle = new Microcycle;
            $microcycle->goal_id = $request['objetivo'];
            $microcycle->experience_id = $request['experiencia'];
            $microcycle->save();

            for ($i=0; $i < count($request['letra']); $i++) { 
                $unit = new UnitMicrocycle;
                if( strlen ($request['letra'][$i]) == 2  ){//es A1, B1 , C1...
                    $unit->letter = substr($request['letra'][$i], 0, 1) ; //toma solo A , B, C
                    $unit->level = 1;
                    $unit->type_session = $request['tipo_sesion'][$i]=="m"? 1: 2;
                    $unit->microcycle_id = $microcycle->id;//el creado recien
                    $unit->save();
                }                
                else if( $request['letra'][$i] == 'descanso' ){ // es  descanso
                    $unit->letter = '-';
                    $unit->level = 0;
                    $unit->type_session = 0;//descanso
                    $unit->microcycle_id = $microcycle->id;//el creado recien
                    $unit->save();
                }
                else { // es  A , B, C ...
                    $unit->letter = $request['letra'][$i];
                    $unit->level = 0;
                    $unit->type_session = $request['tipo_sesion'][$i]=="m"? 1: 2;
                    $unit->microcycle_id = $microcycle->id;//el creado recien
                    $unit->save();
                }                
            }
            
            
            return redirect()->route('microcycle.index')->with('success', 'El microciclo se ha creado con éxito');

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
