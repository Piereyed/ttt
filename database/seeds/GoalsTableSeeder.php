<?php

use Illuminate\Database\Seeder;

class GoalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('goals')->insert([  
            'name' => 'Aprendizaje'
        ]);

        DB::table('goals')->insert([  
            'name' => 'Acondicionamiento físico'
        ]);

        DB::table('goals')->insert([  
            'name' => 'Competición/Fitness'
        ]);

        //experiencia vs objetivos

        DB::table('experience_goal')->insert([  
            'experience_id' => 1,
            'goal_id' => 1
        ]);

        DB::table('experience_goal')->insert([  
            'experience_id' => 2,
            'goal_id' => 2
        ]);

        DB::table('experience_goal')->insert([  
            'experience_id' => 2,
            'goal_id' => 3
        ]);

        DB::table('experience_goal')->insert([  
            'experience_id' => 3,
            'goal_id' => 2
        ]);

        DB::table('experience_goal')->insert([  
            'experience_id' => 3,
            'goal_id' => 3
        ]);
    }
}
