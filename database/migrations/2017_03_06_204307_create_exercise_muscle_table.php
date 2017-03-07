<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExerciseMuscleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercise_muscle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exercise_id')->unsigned();
            $table->integer('muscle_id')->unsigned();
            $table->timestamps();
        });

         Schema::table('exercise_muscle', function (Blueprint $table) {
             $table->foreign('exercise_id')->references('id')->on('exercises');
             $table->foreign('muscle_id')->references('id')->on('muscles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exercise_muscle', function (Blueprint $table) {
            $table->dropForeign('exercise_muscle_exercise_id_foreign');
            $table->dropForeign('exercise_muscle_muscle_id_foreign');
        });
        
        Schema::dropIfExists('exercise_muscle');
    }
}
