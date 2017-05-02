<?php

use Illuminate\Database\Seeder;

class MicrocyclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('microcycles')->insert([  
            'goal_id' => 2,
            'experience_id' => 2
        ]);
        
        //unidades
        DB::table('unit_microcycles')->insert([  
            'letter' => 'a',
            'level' => 0,
            'type_session' => 1,
            'microcycle_id' => 1
        ]);
        DB::table('unit_microcycles')->insert([  
            'letter' => '-',
            'level' => 0,
            'type_session' => 0,
            'microcycle_id' => 1
        ]);
        DB::table('unit_microcycles')->insert([  
            'letter' => 'a',
            'level' => 0,
            'type_session' => 1,
            'microcycle_id' => 1
        ]);
        DB::table('unit_microcycles')->insert([  
            'letter' => '-',
            'level' => 0,
            'type_session' => 0,
            'microcycle_id' => 1
        ]);
        DB::table('unit_microcycles')->insert([  
            'letter' => 'a',
            'level' => 0,
            'type_session' => 1,
            'microcycle_id' => 1
        ]);
        DB::table('unit_microcycles')->insert([  
            'letter' => '-',
            'level' => 0,
            'type_session' => 0,
            'microcycle_id' => 1
        ]);
        DB::table('unit_microcycles')->insert([  
            'letter' => '-',
            'level' => 0,
            'type_session' => 0,
            'microcycle_id' => 1
        ]);
    }
}
