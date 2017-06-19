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
            'user_id' => 1      ,                  
            'photo' => 'fotos_perfil/default.jpg'
        ]);
        
        DB::table('person_role_local')->insert([
            'person_id' => '1', 
            'role_id' => '1',
            'local_id' => '1',
        ]);

        //ahora el adminstrador de surco
        DB::table('users')->insert([  // se creo el usuario
            'name' => 'Alex Aranibar',    
            'email' => 'piereyed@gmail.com',         
            'password' => bcrypt('123')            
        ]);
  
        DB::table('people')->insert([ 
            'sex' => 'H' ,   
            'type_doc' => 0 ,         
            'num_doc' => '32329087' ,           
            'name' => 'Alex' ,           
            'lastname1' => 'Aranibar' ,           
            'lastname2' => 'Mendoza' ,           
            'address' => 'Surco viejo 2332',          
            'email' => 'piereyed@gmail.com',          
            'birthday' => '1990-04-20',          
            'user_id' => 2      ,                  
            'photo' => 'fotos_perfil/2.jpg'
        ]);
        
        DB::table('person_role_local')->insert([
            'person_id' => '2', 
            'role_id' => '2',
            'local_id' => '1',
        ]);

        DB::table('person_role_local')->insert([
            'person_id' => '2', 
            'role_id' => '3',
            'local_id' => '1',
        ]);
        //entrenador 2
        DB::table('users')->insert([  // se creo el usuario
            'name' => 'Carlos Zagastegui',    
            'email' => 'pier.rojas@pucp.pe',         
            'password' => bcrypt('123')            
        ]);
        DB::table('people')->insert([ 
            'sex' => 'H' ,           
            'type_doc' => 0 ,           
            'num_doc' => '32329017' ,           
            'name' => 'Carlos' ,           
            'lastname1' => 'Zagastegui' ,           
            'lastname2' => 'Rosales' ,           
            'address' => 'Surco 2332',          
            'email' => 'pier.rojas@pucp.pe',          
            'birthday' => '1990-01-22',          
            'user_id' => 3      ,                  
            'photo' => 'fotos_perfil/3.jpg'
        ]);
        
        DB::table('person_role_local')->insert([
            'person_id' => '3', 
            'role_id' => '3',
            'local_id' => '1',
        ]);

        //cliente 1
        DB::table('users')->insert([  // se creo el usuario
            'name' => 'Sharvel Irigoyen',    
            'email' => 'elmaster_11@hotmail.com',         
            'password' => bcrypt('123')            
        ]);
        DB::table('people')->insert([ 
            'sex' => 'H' ,           
            'type_doc' => 0 ,           
            'num_doc' => '91234543' ,           
            'name' => 'Sharvel' ,           
            'lastname1' => 'Irigoyen' ,           
            'lastname2' => 'Matos' ,           
            'address' => 'Surco 2323232',          
            'email' => 'elmaster@hotmail.com',          
            'birthday' => '1991-06-22',          
            'user_id' => 4      ,                  
            'photo' => 'fotos_perfil/4.jpg',
            'expiration_date' => '2017-07-20',
            'freeze_days' => 15,
            'trainer_id' => 2
        ]);
        
        DB::table('person_role_local')->insert([
            'person_id' => '4', 
            'role_id' => '4',
            'local_id' => '1',
        ]);
    }
}
