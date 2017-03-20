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
            $table->timestamps(); //createt at , updated at
        });

        Schema::table('physical_evaluations', function (Blueprint $table) {
             $table->foreign('person_id')->references('id')->on('people');             
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
        });
        
        Schema::dropIfExists('physical_evaluations');
    }
}
