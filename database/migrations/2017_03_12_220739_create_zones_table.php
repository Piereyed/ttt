<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100)->nullable();
            $table->integer('muscle_id')->unsigned()->nullable();
        });

        Schema::table('zones', function (Blueprint $table) {
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
        Schema::table('zones', function (Blueprint $table) {
            $table->dropForeign('zones_muscle_id_foreign');            
        });

        Schema::dropIfExists('zones');
    }
}
