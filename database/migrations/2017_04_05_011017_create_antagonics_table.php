<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntagonicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antagonics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('muscle_id');
            $table->integer('antagonic_id');            
        });

        Schema::table('antagonics', function (Blueprint $table) {
             $table->foreign('muscle_id')->references('id')->on('muscles');
             $table->foreign('antagonic_id')->references('id')->on('muscles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('antagonics', function (Blueprint $table) {
            $table->dropForeign('antagonics_muscle_id_foreign');
            $table->dropForeign('antagonics_antagonic_id_foreign');
        });
        
        Schema::dropIfExists('antagonics');
    }
}
