<?php

use Illuminate\Database\Seeder;

class MusclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('muscles')->insert([  
    		'name' => 'Hombros',
    		'photo' => 'fotos_musculos/hombros.jpg',
            'body_part' => 0, //arriba
            'priority' => 2, 
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
            ]);
    	DB::table('muscles')->insert([  
    		'name' => 'Bíceps',
    		'photo' => 'fotos_musculos/biceps.jpg',
            'body_part' => 0, //arriba
            'priority' => 3, 
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
            ]);
    	DB::table('muscles')->insert([  
    		'name' => 'Tríceps',
    		'photo' => 'fotos_musculos/triceps.jpg',
            'body_part' => 0, //arriba
            'priority' => 3, 
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
            ]);
    	DB::table('muscles')->insert([  
    		'name' => 'Antebrazo',
    		'photo' => 'fotos_musculos/antebrazo.jpg',
            'body_part' => 0, //arriba
            'priority' => 4, 
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
            ]);
        DB::table('muscles')->insert([  //-----------------------id = 5
        	'name' => 'Pecho',
        	'photo' => 'fotos_musculos/pecho.jpg',
            'body_part' => 0, //arriba
            'priority' => 1, 
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
            ]);
        DB::table('muscles')->insert([   //-----------------------id = 6
        	'name' => 'Espalda',
        	'photo' => 'fotos_musculos/espalda.jpg',
            'body_part' => 0, //arriba
            'priority' => 1, 
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
            ]);
        DB::table('muscles')->insert([  
        	'name' => 'Abdominales',
        	'photo' => 'fotos_musculos/abdominales.jpg',
            'body_part' => 0, //arriba
            'priority' => 4, 
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
            ]);





        DB::table('muscles')->insert([  
        	'name' => 'Glúteos',
        	'photo' => 'fotos_musculos/gluteos.jpg',
            'body_part' => 1, //abajo
            'priority' => 1, 
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
            ]);
        DB::table('muscles')->insert([  
        	'name' => 'Cuatríceps',
        	'photo' => 'fotos_musculos/cuatriceps.jpg',
            'body_part' => 1, //abajo
            'priority' => 1, 
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
            ]);
        DB::table('muscles')->insert([  
        	'name' => 'Abductores',
        	'photo' => 'fotos_musculos/abductores.jpg',
            'body_part' => 1, //abajo
            'priority' => 3, 
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
            ]);
        DB::table('muscles')->insert([  
        	'name' => 'Aductores',
        	'photo' => 'fotos_musculos/aductores.jpg',
            'body_part' => 1, //abajo
            'priority' => 3, 
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
            ]);
        DB::table('muscles')->insert([  
        	'name' => 'Femorales',
        	'photo' => 'fotos_musculos/femorales.jpg',
            'body_part' => 1, //abajo
            'priority' => 2, 
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
            ]);
        DB::table('muscles')->insert([  
        	'name' => 'Gemelos',
        	'photo' => 'fotos_musculos/gemelos.jpg',
            'body_part' => 1, //abajo
            'priority' => 4, 
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
            ]);

		//zonas
        DB::table('zones')->insert([  
        	'name' => 'Pecho alto',
        	'photo' => 'fotos_musculos/pecho_alto.jpg',
        	'muscle_id' => 5,
        	'created_at' => date("Y-m-d H:i:s"),         
        	'updated_at' => date("Y-m-d H:i:s")         
        	]);

        DB::table('zones')->insert([  
        	'name' => 'Pecho medio',
        	'photo' => 'fotos_musculos/pecho_medio.jpg',
        	'muscle_id' => 5,
        	'created_at' => date("Y-m-d H:i:s"),         
        	'updated_at' => date("Y-m-d H:i:s")         
        	]);

        DB::table('zones')->insert([  
        	'name' => 'Pecho bajo',
        	'photo' => 'fotos_musculos/pecho_bajo.jpg',
        	'muscle_id' => 5,
        	'created_at' => date("Y-m-d H:i:s"),         
        	'updated_at' => date("Y-m-d H:i:s")         
        	]);

        DB::table('zones')->insert([  
        	'name' => 'Dorsales',
        	'photo' => 'fotos_musculos/dorsales.jpg',
        	'muscle_id' => 6,
        	'created_at' => date("Y-m-d H:i:s"),         
        	'updated_at' => date("Y-m-d H:i:s")         
        	]);

        DB::table('zones')->insert([  
        	'name' => 'Espalda baja',
        	'photo' => 'fotos_musculos/espalda_baja.jpg',
        	'muscle_id' => 6,
        	'created_at' => date("Y-m-d H:i:s"),         
        	'updated_at' => date("Y-m-d H:i:s")         
        	]);

        DB::table('zones')->insert([  
        	'name' => 'Trapecios',
        	'photo' => 'fotos_musculos/trapecios.jpg',
        	'muscle_id' => 6,
        	'created_at' => date("Y-m-d H:i:s"),         
        	'updated_at' => date("Y-m-d H:i:s")         
        	]);


    }
}
