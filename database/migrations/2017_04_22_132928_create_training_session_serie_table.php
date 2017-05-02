<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingSessionSerieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_session_serie', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('weight')->unsigned();  //objetivo en libras
            $table->integer('weight_lifted')->unsigned();  //en libras
            $table->integer('repetitions')->unsigned();
            $table->integer('repetitions_done')->unsigned();
            $table->integer('work')->unsigned();
            $table->integer('work_done')->unsigned();
            $table->float('efficiency',8,2)->unsigned();
            
            $table->integer('serie_id')->unsigned();
            $table->integer('training_session_id')->unsigned();
            $table->integer('training_exercise_id')->unsigned();
        });
        
        Schema::table('training_session_serie', function (Blueprint $table) {
             $table->foreign('serie_id')->references('id')->on('series');             
             $table->foreign('training_session_id')->references('id')->on('training_sessions');
             $table->foreign('training_exercise_id')->references('id')->on('training_exercises');             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('training_session_serie', function (Blueprint $table) {
            $table->dropForeign('training_session_serie_serie_id_foreign');            
            $table->dropForeign('training_session_serie_training_session_id_foreign');            
            $table->dropForeign('training_session_serie_training_exercise_id_foreign');          
        });
        
        Schema::dropIfExists('training_session_serie');
    }
}
