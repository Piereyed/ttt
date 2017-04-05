<?php

use Illuminate\Database\Seeder;

class TrainingPhasesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('training_phases')->insert([  
            'name' => 'Calentamiento',    
            'max_duration' => 5
        ]);

        DB::table('training_phases')->insert([  
            'name' => 'Principal'
        ]);

        DB::table('training_phases')->insert([  
            'name' => 'Estiramiento',    
            'max_duration' => 2
        ]);
    }
}
