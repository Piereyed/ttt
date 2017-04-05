<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_exercises', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('time')->unsigned()->nullable(); //seconds
            $table->integer('min_heart_rate')->unsigned()->nullable();
            $table->integer('max_heart_rate')->unsigned()->nullable();
            $table->integer('exercise_id')->unsigned();    
            $table->integer('training_detail_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('training_exercises', function (Blueprint $table) {
             $table->foreign('exercise_id')->references('id')->on('exercises');             
             $table->foreign('training_detail_id')->references('id')->on('training_details');             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('training_exercises', function (Blueprint $table) {
            $table->dropForeign('training_exercises_exercise_id_foreign');            
            $table->dropForeign('training_exercises_training_detail_id_foreign');            
        });
        
        Schema::dropIfExists('training_exercises');
    }
}
