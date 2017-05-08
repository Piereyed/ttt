<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutineExerciseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routine_exercise', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rm_inicial');  //en libras
            $table->integer('rm_final')->nullable();  //en libras
            $table->integer('person_id')->unsigned();
            $table->integer('routine_id')->unsigned();
            $table->integer('exercise_id')->unsigned();
            $table->timestamps();
        });
        
         Schema::table('routine_exercise', function (Blueprint $table) {
             $table->foreign('person_id')->references('id')->on('people');             
             $table->foreign('routine_id')->references('id')->on('routines');             
             $table->foreign('exercise_id')->references('id')->on('exercises');             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('routine_exercise', function (Blueprint $table) {
            $table->dropForeign('routine_exercise_person_id_foreign');            
            $table->dropForeign('routine_exercise_routine_id_foreign');            
            $table->dropForeign('routine_exercise_exercise_id_foreign');            
        });
        
        Schema::dropIfExists('routine_exercise');
    }
}
