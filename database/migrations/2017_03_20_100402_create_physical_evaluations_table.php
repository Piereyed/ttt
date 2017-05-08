<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhysicalEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physical_evaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('person_id')->unsigned();
            $table->integer('routine_id')->unsigned()->nullable();
            $table->timestamps(); //createt at , updated at
        });

        Schema::table('physical_evaluations', function (Blueprint $table) {
             $table->foreign('person_id')->references('id')->on('people');             
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
        Schema::table('physical_evaluations', function (Blueprint $table) {
            $table->dropForeign('physical_evaluations_person_id_foreign');            
            $table->dropForeign('physical_evaluations_routine_id_foreign');            
        });
        
        Schema::dropIfExists('physical_evaluations');
    }
}
