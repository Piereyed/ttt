<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number')->unsigned();
            $table->integer('person_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('programs', function (Blueprint $table) {
             $table->foreign('person_id')->references('id')->on('people');             
        });
    }

   
    public function down()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropForeign('programs_person_id_foreign');            
        });

        Schema::dropIfExists('programs');
    }
}
