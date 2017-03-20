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
            'name' => 'Tonificar',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('goals')->insert([  
            'name' => 'Ganar masa muscular',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('goals')->insert([  
            'name' => 'Perder peso',    
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('goals')->insert([  
            'name' => 'Adaptar',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);
    }
}
