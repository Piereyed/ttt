<?php

use Illuminate\Database\Seeder;

class MeasuresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('measures')->insert([  
            'name' => 'Cuello',
            'unity' => 'cm',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([  
            'name' => 'Hombros',
            'unity' => 'cm',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([  
            'name' => 'Pecho',
            'unity' => 'cm',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([  
            'name' => 'Cintura',
            'unity' => 'cm',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([  
            'name' => 'Cadera',
            'unity' => 'cm',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([  
            'name' => 'Brazo',
            'unity' => 'cm',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([  
            'name' => 'Antebrazo',
            'unity' => 'cm',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([  
            'name' => 'Trasero',
            'unity' => 'cm',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([  
            'name' => 'Pierna',
            'unity' => 'cm',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([  
            'name' => 'Pantorrilla',
            'unity' => 'cm',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([  //id = 11
            'name' => 'Talla',
            'unity' => 'cm',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([  //id = 12
            'name' => 'Peso',
            'unity' => 'Kg',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([   //id = 13
            'name' => 'Porc. Grasa',
            'unity' => '%',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([  //id = 14
            'name' => 'Grasa',
            'unity' => 'Kg',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([  //id = 15
            'name' => 'Porc. Masa Magra',
            'unity' => '%',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([   //id = 16
            'name' => 'Masa Magra',
            'unity' => 'Kg',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([    //id = 17
            'name' => 'IMC',
            'unity' => '-',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([  //id = 18
            'name' => 'ICC', 
            'unity' => '-',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([   //id = 19
            'name' => 'ICA',
            'unity' => '-',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);
    }
}
