<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type')->unsigned();  // 1=> simple, 2=> compuesta, 3=>superserie, 4=>triserie, 5=>serie gigante
            $table->integer('training_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('training_details', function (Blueprint $table) {
             $table->foreign('training_id')->references('id')->on('trainings');             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('training_details', function (Blueprint $table) {
            $table->dropForeign('training_details_training_id_foreign');            
        });

        Schema::dropIfExists('training_details');
    }
}
