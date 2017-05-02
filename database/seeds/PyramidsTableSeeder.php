<?php

use Illuminate\Database\Seeder;

class PyramidsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('pyramids')->insert([  
            'percentage_rm' => 15,
            'period_id' => 2
        ]);
        
        DB::table('pyramids')->insert([  
            'percentage_rm' => 12,
            'period_id' => 2
        ]);
        
        DB::table('pyramids')->insert([  
            'percentage_rm' => 10,
            'period_id' => 2
        ]);
    }
}
