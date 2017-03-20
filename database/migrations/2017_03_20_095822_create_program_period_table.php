<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramPeriodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_period', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number')->unsigned();
            $table->integer('program_id')->unsigned();
            $table->integer('period_id')->unsigned();
            $table->integer('goal_id')->unsigned();
            $table->integer('duration')->unsigned();  //en semanas
            $table->integer('finished')->unsigned(); // 0=> no terminado ,  1=> terminado
            $table->integer('routine_id')->unsigned();
            
            $table->softDeletes();            
            $table->timestamps();
        });

        Schema::table('program_period', function (Blueprint $table) {
             $table->foreign('program_id')->references('id')->on('programs');             
             $table->foreign('period_id')->references('id')->on('periods');             
             $table->foreign('goal_id')->references('id')->on('goals');             
             $table->foreign('routine_id')->references('id')->on('routines');             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('program_period', function (Blueprint $table) {
            $table->dropForeign('program_period_program_id_foreign');            
            $table->dropForeign('program_period_period_id_foreign');            
            $table->dropForeign('program_period_goal_id_foreign');            
            $table->dropForeign('program_period_routine_id_foreign');            
        });
        
        Schema::dropIfExists('program_period');
    }
}
