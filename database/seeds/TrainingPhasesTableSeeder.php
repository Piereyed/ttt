<?php

use Illuminate\Database\Seeder;

class TrainingPhasesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('training_phases')->insert([  
            'name' => 'Calentamiento',    
            'max_duration' => 5,    
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('training_phases')->insert([  
            'name' => 'Principal',
            
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('training_phases')->insert([  
            'name' => 'Estiramiento',    
            'max_duration' => 2,    
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);
    }
}
