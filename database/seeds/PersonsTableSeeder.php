<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PersonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
         DB::table('users')->insert([  // se creo el superusuario
            'name' => 'admin',    
            'email' => 'admin',         
            'password' => bcrypt('123')            
        ]);
        
        DB::table('people')->insert([ 
            'name' => 'Admin' ,           
            'email' => 'admin',          
            'user_id' => 1                        
        ]);
        
        DB::table('person_role_local')->insert([
            'person_id' => '1', 
            'role_id' => '1',
            'local_id' => '1',
        ]);
    }
}
