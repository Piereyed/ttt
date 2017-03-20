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
    		'created_at' => date("Y-m-d H:i:s"),         
    		'updated_at' => date("Y-m-d H:i:s")         
    		]);

    	DB::table('periods')->insert([  
    		'name' => 'Aumento de fuerza',
    		'created_at' => date("Y-m-d H:i:s"),         
    		'updated_at' => date("Y-m-d H:i:s")         
    		]);

    	DB::table('periods')->insert([  
    		'name' => 'Hipertrofia muscular',
    		'created_at' => date("Y-m-d H:i:s"),         
    		'updated_at' => date("Y-m-d H:i:s")         
    		]);

    	 DB::table('periods')->insert([  
            'name' => 'Quema de grasa',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);
    }
}
