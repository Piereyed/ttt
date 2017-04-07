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
            'name' => 'Principiante'
        ]);

         DB::table('experiences')->insert([  
            'name' => 'Intermedio'
        ]);
         DB::table('experiences')->insert([  
            'name' => 'Avanzado'
        ]);

        

    }
}
