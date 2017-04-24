<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number')->unsigned();
            $table->integer('program_id')->unsigned();
            $table->integer('period_id')->unsigned();
            $table->integer('goal_id')->unsigned();            
            $table->integer('total_sessions')->unsigned();
            $table->integer('weeks')->unsigned();
            $table->integer('trainings_quantity')->unsigned();
            $table->boolean('finished');
            $table->boolean('evaluated');
            $table->integer('person_id')->unsigned();
            $table->integer('trainer_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('routines', function (Blueprint $table) {
             $table->foreign('program_id')->references('id')->on('programs');             
             $table->foreign('period_id')->references('id')->on('periods');             
             $table->foreign('goal_id')->references('id')->on('goals');             
             $table->foreign('person_id')->references('id')->on('people');             
             $table->foreign('trainer_id')->references('id')->on('people');             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('routines', function (Blueprint $table) {
            $table->dropForeign('routines_program_id_foreign');            
            $table->dropForeign('routines_period_id_foreign');            
            $table->dropForeign('routines_goal_id_foreign');            
            $table->dropForeign('routines_person_id_foreign');            
            $table->dropForeign('routines_trainer_id_foreign');            
        });

        Schema::dropIfExists('routines');
    }
}
