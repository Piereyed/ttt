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
    }
}
