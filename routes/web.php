<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home',['as'=>'inicio',function () {
    return view('index');
}] )->middleware('auth');

Route::get('/login', function () {    
    return view('auth.login');
});

Auth::routes();






Route::group(['middleware' => 'auth'], function(){

    Route::get('/','HomeController@locals')->name('inicio_sedes');;
    Route::post('/entrar_sede', 'HomeController@entrar');
    
    Route::group(['prefix' => 'administradores'], function(){    
        Route::get('/', ['as' => 'admin.index', 'uses' => 'AdminController@index']);
        Route::get('create', ['as' => 'admin.create', 'uses' => 'AdminController@create']);
        Route::post('create', ['as' => 'admin.store', 'uses' => 'AdminController@store']);
        Route::post('assignrole', ['as' => 'admin.storerole', 'uses' => 'AdminController@storerole']);
        Route::get('show/{id}', ['as' => 'admin.show', 'uses' => 'AdminController@show']);
        Route::get('edit/{id}', ['as' => 'admin.edit', 'uses' => 'AdminController@edit']);
        Route::post('edit/{id}', ['as' => 'admin.update', 'uses' => 'AdminController@update']);
        Route::get('delete/{id}', ['as' => 'admin.delete', 'uses' => 'AdminController@destroy']);
    });

    Route::group(['prefix' => 'entrenadores'], function(){    
        Route::get('/', ['as' => 'trainer.index', 'uses' => 'TrainerController@index']);
        Route::get('create', ['as' => 'trainer.create', 'uses' => 'TrainerController@create']);        
        Route::post('create', ['as' => 'trainer.store', 'uses' => 'TrainerController@store']);        
        Route::post('assignrole', ['as' => 'trainer.storerole', 'uses' => 'TrainerController@storerole']);
        Route::get('show/{id}', ['as' => 'trainer.show', 'uses' => 'TrainerController@show']);
        Route::get('edit/{id}', ['as' => 'trainer.edit', 'uses' => 'TrainerController@edit']);
        Route::post('edit/{id}', ['as' => 'trainer.update', 'uses' => 'TrainerController@update']);
        Route::get('delete/{id}', ['as' => 'trainer.delete', 'uses' => 'TrainerController@destroy']);
    });

    Route::group(['prefix' => 'clientes'], function(){    
        Route::get('/', ['as' => 'client.index', 'uses' => 'ClientController@index']);
        Route::get('create', ['as' => 'client.create', 'uses' => 'ClientController@create']);
        Route::post('create', ['as' => 'client.store', 'uses' => 'ClientController@store']);
        Route::post('assignrole', ['as' => 'client.storerole', 'uses' => 'ClientController@storerole']);
        Route::get('show/{id}', ['as' => 'client.show', 'uses' => 'ClientController@show']);
        Route::get('edit/{id}', ['as' => 'client.edit', 'uses' => 'ClientController@edit']);
        Route::post('edit/{id}', ['as' => 'client.update', 'uses' => 'ClientController@update']);
        Route::get('delete/{id}', ['as' => 'client.delete', 'uses' => 'ClientController@destroy']);
    });

    Route::group(['prefix' => 'sedes'], function(){    
        Route::get('/', ['as' => 'local.index', 'uses' => 'LocalController@index']);
        Route::get('create', ['as' => 'local.create', 'uses' => 'LocalController@create']);
        Route::post('create', ['as' => 'local.store', 'uses' => 'LocalController@store']);
        Route::get('show/{id}', ['as' => 'local.show', 'uses' => 'LocalController@show']);
        Route::get('edit/{id}', ['as' => 'local.edit', 'uses' => 'LocalController@edit']);
        Route::post('edit/{id}', ['as' => 'local.update', 'uses' => 'LocalController@update']);
        Route::get('delete/{id}', ['as' => 'local.delete', 'uses' => 'LocalController@destroy']);
    });

    Route::group(['prefix' => 'musculos'], function(){    
        Route::get('/', ['as' => 'muscle.index', 'uses' => 'MuscleController@index']);
        Route::get('create', ['as' => 'muscle.create', 'uses' => 'MuscleController@create']);
        Route::post('create', ['as' => 'muscle.store', 'uses' => 'MuscleController@store']);
        Route::get('show/{id}', ['as' => 'muscle.show', 'uses' => 'MuscleController@show']);
        Route::get('edit/{id}', ['as' => 'muscle.edit', 'uses' => 'MuscleController@edit']);
        Route::post('edit/{id}', ['as' => 'muscle.update', 'uses' => 'MuscleController@update']);
        Route::get('delete/{id}', ['as' => 'muscle.delete', 'uses' => 'MuscleController@destroy']);
    });

    Route::group(['prefix' => 'ejercicios'], function(){    
        Route::get('/', ['as' => 'exercise.index', 'uses' => 'ExerciseController@index']);
        Route::get('create', ['as' => 'exercise.create', 'uses' => 'ExerciseController@create']);
        Route::post('create', ['as' => 'exercise.store', 'uses' => 'ExerciseController@store']);
        Route::get('show/{id}', ['as' => 'exercise.show', 'uses' => 'ExerciseController@show']);
        Route::get('edit/{id}', ['as' => 'exercise.edit', 'uses' => 'ExerciseController@edit']);
        Route::post('edit/{id}', ['as' => 'exercise.update', 'uses' => 'ExerciseController@update']);
        Route::get('delete/{id}', ['as' => 'exercise.delete', 'uses' => 'ExerciseController@destroy']);
    });

    Route::group(['prefix' => 'evaluaciones'], function(){    
        Route::get('/{id}', ['as' => 'evaluation.index', 'uses' => 'EvaluationController@index']);
        Route::get('create/{id}', ['as' => 'evaluation.create', 'uses' => 'EvaluationController@create']);
        Route::get('create_rm/{id}', ['as' => 'evaluation_rm.create', 'uses' => 'EvaluationController@create_rm']);
        Route::post('create/{id}', ['as' => 'evaluation.store', 'uses' => 'EvaluationController@store']);
        Route::post('create_rm/{id}', ['as' => 'evaluation_rm.store', 'uses' => 'EvaluationController@store_rm']);
        Route::get('show/{id}', ['as' => 'evaluation.show', 'uses' => 'EvaluationController@show']);
        Route::get('edit/{id}', ['as' => 'evaluation.edit', 'uses' => 'EvaluationController@edit']);
        Route::post('edit/{id}', ['as' => 'evaluation.update', 'uses' => 'EvaluationController@update']);
        Route::get('delete/{id}', ['as' => 'evaluation.delete', 'uses' => 'EvaluationController@destroy']);
    });

    Route::group(['prefix' => 'mis_atletas'], function(){    
        Route::get('/', ['as' => 'myathletes.index', 'uses' =>'TrainerController@index_my_athletes']);
        // Route::get('create', ['as' => 'athlete.create', 'uses' => 'ExerciseController@create']);
        // Route::post('create', ['as' => 'athlete.store', 'uses' => 'ExerciseController@store']);
        // Route::get('show/{id}', ['as' => 'athlete.show', 'uses' => 'ExerciseController@show']);
        // Route::get('edit/{id}', ['as' => 'athlete.edit', 'uses' => 'ExerciseController@edit']);
        // Route::post('edit/{id}', ['as' => 'athlete.update', 'uses' => 'ExerciseController@update']);
        // Route::get('delete/{id}', ['as' => 'athlete.delete', 'uses' => 'ExerciseController@destroy']);
    });

    Route::group(['prefix' => 'objetivos'], function(){    
        Route::get('/', ['as' => 'goal.index', 'uses' => 'GoalController@index']);
        Route::get('create', ['as' => 'goal.create', 'uses' => 'GoalController@create']);
        Route::post('create', ['as' => 'goal.store', 'uses' => 'GoalController@store']);
        Route::get('show/{id}', ['as' => 'goal.show', 'uses' => 'GoalController@show']);
        Route::get('edit/{id}', ['as' => 'goal.edit', 'uses' => 'GoalController@edit']);
        Route::post('edit/{id}', ['as' => 'goal.update', 'uses' => 'GoalController@update']);
        Route::get('delete/{id}', ['as' => 'goal.delete', 'uses' => 'GoalController@destroy']);
    });

    Route::group(['prefix' => 'microciclos'], function(){    
        Route::get('/', ['as' => 'microcycle.index', 'uses' => 'MicrocycleController@index']);
        Route::get('create', ['as' => 'microcycle.create', 'uses' => 'MicrocycleController@create']);
        Route::post('create', ['as' => 'microcycle.store', 'uses' => 'MicrocycleController@store']);
        Route::get('show/{id}', ['as' => 'microcycle.show', 'uses' => 'MicrocycleController@show']);
        Route::get('edit/{id}', ['as' => 'microcycle.edit', 'uses' => 'MicrocycleController@edit']);
        Route::post('edit/{id}', ['as' => 'microcycle.update', 'uses' => 'MicrocycleController@update']);
        Route::get('delete/{id}', ['as' => 'microcycle.delete', 'uses' => 'MicrocycleController@destroy']);
    });

    Route::group(['prefix' => 'piramides'], function(){    
        Route::get('/', ['as' => 'pyramid.index', 'uses' => 'PyramidController@index']);
        Route::get('create', ['as' => 'pyramid.create', 'uses' => 'PyramidController@create']);
        Route::post('create', ['as' => 'pyramid.store', 'uses' => 'PyramidController@store']);
        Route::get('show/{id}', ['as' => 'pyramid.show', 'uses' => 'PyramidController@show']);
        Route::get('edit/{id}', ['as' => 'pyramid.edit', 'uses' => 'PyramidController@edit']);
        Route::post('edit/{id}', ['as' => 'pyramid.update', 'uses' => 'PyramidController@update']);
        Route::get('delete/{id}', ['as' => 'pyramid.delete', 'uses' => 'PyramidController@destroy']);
    });

    Route::group(['prefix' => 'rutinas'], function(){    
        
        Route::get('/misrutinas', ['as' => 'myroutines.index', 'uses' => 'RoutineController@myroutines']);
        Route::get('/susrutinas/{id}', ['as' => 'hisroutines.index', 'uses' => 'RoutineController@hisroutines']);
        Route::post('/guardar', ['as' => 'myroutine.store', 'uses' => 'RoutineController@store_myroutine']);
        Route::post('/guardarlo', ['as' => 'hisroutine.store', 'uses' => 'RoutineController@store_hisroutine']);
        Route::get('/entrenar/{id}', ['as' => 'routine.train', 'uses' => 'RoutineController@train']);
        Route::get('/entrenarlo/{id}', ['as' => 'routine.trainhim', 'uses' => 'RoutineController@trainhim']);
        Route::get('/{id}', ['as' => 'routine.index', 'uses' => 'RoutineController@index']);
        Route::get('create/{id}/{period}/{microcycle}/{new}', ['as' => 'routine.create', 'uses' => 'RoutineController@create']);        
        Route::post('create/', ['as' => 'routine.store', 'uses' => 'RoutineController@store']);
        Route::get('show/{id}', ['as' => 'routine.show', 'uses' => 'RoutineController@show']);
        Route::get('showsession/{id}', ['as' => 'routine.showsession', 'uses' => 'RoutineController@showsession']);
        Route::get('showhissession/{id}', ['as' => 'routine.showhissession', 'uses' => 'RoutineController@showhissession']);
        Route::get('show-results/{id}', ['as' => 'routine_results.show', 'uses' => 'RoutineController@show_results']);
        Route::get('edit/{id}', ['as' => 'routine.edit', 'uses' => 'RoutineController@edit']);
        Route::post('edit/{id}', ['as' => 'routine.update', 'uses' => 'RoutineController@update']);
        Route::get('delete/{id}', ['as' => 'routine.delete', 'uses' => 'RoutineController@destroy']);
    });

});



Route::post('/searchTrainer', ['as' => 'search.trainer','uses' => 'TrainerController@search']);//NO TOCAR!
Route::post('/searchClient', ['as' => 'search.client','uses' => 'ClientController@search']);//NO TOCAR!
Route::post('/searchAdmin', ['as' => 'search.admin','uses' => 'AdminController@search']);//NO TOCAR!
Route::post('/getZones/{id}', ['as' => 'search.zones','uses' => 'ExerciseController@getZones']);//NO TOCAR!
Route::post('/getGoals/{id}', ['as' => 'search.goals','uses' => 'GoalController@getGoals']);//NO TOCAR!
Route::post('/getMeasures/{id}', ['as' => 'client.measure','uses' => 'ClientController@getMeasures']);//NO TOCAR!
Route::post('/getExercisesOfMuscle/{id}', ['as' => 'exercise.get','uses' => 'ExerciseController@getExercisesForRm']);//NO TOCAR!
Route::post('/getRMs/{id}', ['as' => 'client.rm','uses' => 'ClientController@getRMs']);//NO TOCAR!
Route::post('/getMicrocycles/{goal_id}/{experience_id}', ['as' => 'search.microcycles','uses' => 'MicrocycleController@getMicrocycles']);//NO TOCAR!
Route::post('/getMicrocycle/{id}', ['as' => 'get.microcycle','uses' => 'MicrocycleController@getMicrocycle']);//NO TOCAR!
Route::post('/obtenerEjercicios/', ['as' => 'exercise.obtain','uses' => 'ExerciseController@obtain']);//NO TOCAR!
Route::post('/obtenerEjerciciosCalentamiento/', ['as' => 'exercise.obtain_warm','uses' => 'ExerciseController@obtain_warm']);//NO TOCAR!
Route::post('/obtenerEjerciciosEstiramiento/', ['as' => 'exercise.obtain_strech','uses' => 'ExerciseController@obtain_strech']);//NO TOCAR!
Route::post('/getPeriod/{id}', ['as' => 'get.period','uses' => 'PeriodController@getPeriod']);//NO TOCAR!

