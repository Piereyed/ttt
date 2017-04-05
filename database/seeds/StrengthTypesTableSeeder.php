<?php

use Illuminate\Database\Seeder;

class StrengthTypesTableSeeder extends Seeder
{
   
    public function run()
    {
         DB::table('strength_types')->insert([  
            'name' => 'Fuerza Explosiva',    
            'description' => 'Máxima aceleración posible'
        ]);

         DB::table('strength_types')->insert([  
            'name' => 'Fuerza Rápida',    
            'description' => 'Rápida aceleración'
        ]);

         DB::table('strength_types')->insert([  
            'name' => 'Fuerza Constante',    
            'description' => 'Mínima aceleración posible'
        ]);
    }
}
