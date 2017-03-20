<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ExperiencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('experiences')->insert([  
            'name' => 'Principiante',    
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

         DB::table('experiences')->insert([  
            'name' => 'Intermedio',    
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);
         DB::table('experiences')->insert([  
            'name' => 'Avanzado',    
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);
    }
}
