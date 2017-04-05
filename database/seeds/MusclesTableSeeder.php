<?php

use Illuminate\Database\Seeder;

class MusclesTableSeeder extends Seeder
{
    public function run()
    {
    	DB::table('muscles')->insert([  
    		'name' => 'Hombros',
    		'measure_id' => 2,
            'body_part' => 0, //arriba
            'priority' => 2, 
            ]);
    	DB::table('muscles')->insert([  
    		'name' => 'Bíceps',
    		'measure_id' => 6,
            'body_part' => 0, //arriba
            'priority' => 3, 
            ]);
    	DB::table('muscles')->insert([  
    		'name' => 'Tríceps',
    		'measure_id' => 6,
            'body_part' => 0, //arriba
            'priority' => 3, 
            ]);
    	DB::table('muscles')->insert([  
    		'name' => 'Antebrazo',
    		'measure_id' => 7,
            'body_part' => 0, //arriba
            'priority' => 4, 
            ]);
        DB::table('muscles')->insert([  //-----------------------id = 5
        	'name' => 'Pecho',
        	'measure_id' => 3,
            'body_part' => 0, //arriba
            'priority' => 1, 
            ]);
        DB::table('muscles')->insert([   //-----------------------id = 6
        	'name' => 'Espalda',
        	'measure_id' => 3,
            'body_part' => 0, //arriba
            'priority' => 1, 
            ]);
        DB::table('muscles')->insert([  
        	'name' => 'Abdominales',
        	'measure_id' => 4,
            'body_part' => 0, //arriba
            'priority' => 4, 
            ]);





        DB::table('muscles')->insert([  
        	'name' => 'Glúteos',
        	'measure_id' => 8,
            'body_part' => 1, //abajo
            'priority' => 1, 
            ]);
        DB::table('muscles')->insert([  
        	'name' => 'Cuatríceps',
        	'measure_id' => 9,
            'body_part' => 1, //abajo
            'priority' => 1, 
            ]);
        DB::table('muscles')->insert([  
        	'name' => 'Abductores',
        	'measure_id' => 9,
            'body_part' => 1, //abajo
            'priority' => 3, 
            ]);
        DB::table('muscles')->insert([  
        	'name' => 'Aductores',
        	'measure_id' => 9,
            'body_part' => 1, //abajo
            'priority' => 3, 
            ]);
        DB::table('muscles')->insert([  
        	'name' => 'Femorales',
        	'measure_id' => 9,
            'body_part' => 1, //abajo
            'priority' => 2, 
            ]);
        DB::table('muscles')->insert([  
        	'name' => 'Gemelos',
        	'measure_id' => 10,
            'body_part' => 1, //abajo
            'priority' => 4, 
            ]);

		//zonas
        DB::table('zones')->insert([  
        	'name' => 'Pecho alto',
        	'muscle_id' => 5
        	]);

        DB::table('zones')->insert([  
        	'name' => 'Pecho medio',
        	'muscle_id' => 5
        	]);

        DB::table('zones')->insert([  
        	'name' => 'Pecho bajo',        	
        	'muscle_id' => 5        	
        	]);

        DB::table('zones')->insert([  
        	'name' => 'Dorsal',        	
        	'muscle_id' => 6        	
        	]);

        DB::table('zones')->insert([  
        	'name' => 'Espalda baja',        	
        	'muscle_id' => 6        	
        	]);

        DB::table('zones')->insert([  
        	'name' => 'Trapecios',        	
        	'muscle_id' => 6
        	]);


    }
}
