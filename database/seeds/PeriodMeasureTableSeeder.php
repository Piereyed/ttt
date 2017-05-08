<?php

use Illuminate\Database\Seeder;

class PeriodMeasureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('period_measure')->insert([  
            'period_id' => 3,
            'measure_id' => 2, 
            'success' => 1 
        ]);
        DB::table('period_measure')->insert([  
            'period_id' => 3,
            'measure_id' => 3, 
            'success' => 1 
        ]);
        DB::table('period_measure')->insert([  
            'period_id' => 3,
            'measure_id' => 6, 
            'success' => 1 
        ]);
        DB::table('period_measure')->insert([  
            'period_id' => 3,
            'measure_id' => 7, 
            'success' => 1 
        ]);
        DB::table('period_measure')->insert([  
            'period_id' => 3,
            'measure_id' => 8, 
            'success' => 1 
        ]);
        DB::table('period_measure')->insert([  
            'period_id' => 3,
            'measure_id' => 9, 
            'success' => 1 
        ]);
        DB::table('period_measure')->insert([  
            'period_id' => 3,
            'measure_id' => 10, 
            'success' => 1 
        ]);
        
        //para definicion muscular        
        DB::table('period_measure')->insert([  
            'period_id' => 4,
            'measure_id' => 13, 
            'success' => 0 
        ]);
        
        //para perdida de peso
        DB::table('period_measure')->insert([  
            'period_id' => 5,
            'measure_id' => 12, 
            'success' => 0 
        ]);
    }
}
