<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingSessionExerciseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_session_exercise', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('work_objetive')->unsigned();
            $table->integer('work_done')->unsigned();
            $table->float('efficiency',8,2)->unsigned();            
            $table->integer('rm')->unsigned();
            
            $table->integer('exercise_id')->unsigned();
            $table->integer('training_session_id')->unsigned();            
        });
        
        Schema::table('training_session_exercise', function (Blueprint $table) {
             $table->foreign('exercise_id')->references('id')->on('exercises');             
             $table->foreign('training_session_id')->references('id')->on('training_sessions');             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('training_session_exercise', function (Blueprint $table) {
            $table->dropForeign('training_session_exercise_exercise_id_foreign');            
            $table->dropForeign('training_session_exercise_training_session_id_foreign');            
        });
        
        Schema::dropIfExists('training_session_exercise');
    }
}
