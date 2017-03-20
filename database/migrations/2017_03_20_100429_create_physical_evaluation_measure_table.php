<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhysicalEvaluationMeasureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physical_evaluation_measure', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('physical_evaluation_id')->unsigned();
            $table->integer('measure_id')->unsigned();
            $table->float('value', 8, 2)->unsigned();
            $table->timestamps();
        });

        Schema::table('physical_evaluation_measure', function (Blueprint $table) {
             $table->foreign('physical_evaluation_id')->references('id')->on('physical_evaluations');             
             $table->foreign('measure_id')->references('id')->on('measures');             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('physical_evaluation_measure', function (Blueprint $table) {
            $table->dropForeign('physical_evaluation_measure_physical_evaluation_id_foreign');            
            $table->dropForeign('physical_evaluation_measure_measure_id_foreign');
        });

        Schema::dropIfExists('physical_evaluation_measure');
    }
}
