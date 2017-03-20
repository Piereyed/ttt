<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sex',1)->nullable();
            $table->integer('type_doc')->unsigned()->nullable();
            $table->string('num_doc',20)->nullable();
            $table->string('name',100)->nullable();
            $table->string('lastname1',100)->nullable();
            $table->string('lastname2',100)->nullable();
            $table->string('address',500)->nullable();
            $table->string('email',100)->nullable();
            $table->date('birthday')->nullable();
            $table->string('phone',15)->nullable();
            $table->string('photo',100)->nullable();//ruta de la foto
            
            $table->integer('user_id')->unsigned();           
            $table->integer('experience_id')->unsigned()->nullable();           
            
            $table->softDeletes();
            $table->timestamps();
        });
        
        Schema::table('people', function (Blueprint $table) {
             $table->foreign('user_id')->references('id')->on('users');             
             $table->foreign('experience_id')->references('id')->on('experiences');             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('people', function (Blueprint $table) {
            $table->dropForeign('people_user_id_foreign');            
            $table->dropForeign('people_experience_id_foreign');            
        });
        
        Schema::dropIfExists('people');
    }
}
