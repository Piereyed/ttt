<?php

use Illuminate\Database\Seeder;

class PeriodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('periods')->insert([  
            'name' => 'Iniciación',
            'specific_goal' => 'Aprender',
            'rest_duration' => 120,
    		'number_series' => 4
    		]);

    	DB::table('periods')->insert([  
    		'name' => 'Desarrollo de fuerza',
    		'specific_goal' => 'Aumentar fuerza',
            'rest_duration' => 180,
            'number_series' => 4     
    		]);

    	DB::table('periods')->insert([  
    		'name' => 'Construcción de masa muscular',
            'specific_goal' => 'Aumentar masa muscular',
            'rest_duration' => 60, 
            'number_series' => 5  
    		]);

    	 DB::table('periods')->insert([  
            'name' => 'Separación muscular',
            'specific_goal' => 'Quemar grasa',
            'rest_duration' => 30,
            'number_series' => 4           
        ]);

         DB::table('periods')->insert([  
            'name' => 'Pérdida de peso',
            'specific_goal' => 'Perder peso',
            'rest_duration' => 120,
            'number_series' => 3           
        ]);


          //experiencia vs periodo

        DB::table('experience_period')->insert([  
            'experience_id' => 1,
            'period_id' => 1
        ]);


        DB::table('experience_period')->insert([  
            'experience_id' => 2,
            'period_id' => 2
        ]);

        DB::table('experience_period')->insert([  
            'experience_id' => 2,
            'period_id' => 3
        ]);

        DB::table('experience_period')->insert([  
            'experience_id' => 2,
            'period_id' => 4
        ]);

        DB::table('experience_period')->insert([  
            'experience_id' => 2,
            'period_id' => 5
        ]);


        DB::table('experience_period')->insert([  
            'experience_id' => 3,
            'period_id' => 2
        ]);

        DB::table('experience_period')->insert([  
            'experience_id' => 3,
            'period_id' => 3
        ]);

        DB::table('experience_period')->insert([  
            'experience_id' => 3,
            'period_id' => 4
        ]);

        DB::table('experience_period')->insert([  
            'experience_id' => 3,
            'period_id' => 5
        ]);
    }
}
