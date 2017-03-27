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
            'label' => 'cuello',
            'unity' => 'cm',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([  
            'name' => 'Hombros',
            'label' => 'hombros',
            'unity' => 'cm',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([  
            'name' => 'Pecho',
            'label' => 'pecho',
            'unity' => 'cm',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([  
            'name' => 'Cintura',
            'label' => 'cintura',
            'unity' => 'cm',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([  
            'name' => 'Cadera',
            'label' => 'cadera',
            'unity' => 'cm',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([  
            'name' => 'Brazo',
            'label' => 'brazo',
            'unity' => 'cm',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([  
            'name' => 'Antebrazo',
            'label' => 'antebrazo',
            'unity' => 'cm',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([  
            'name' => 'Trasero',
            'label' => 'trasero',
            'unity' => 'cm',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([  
            'name' => 'Pierna',
            'label' => 'pierna',
            'unity' => 'cm',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([  
            'name' => 'Pantorrilla',
            'label' => 'pantorrilla',
            'unity' => 'cm',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([  //id = 11
            'name' => 'Talla',
            'label' => 'talla',
            'unity' => 'cm',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([  //id = 12
            'name' => 'Peso',
            'label' => 'peso',
            'unity' => 'Kg',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([   //id = 13
            'name' => 'Porc. Grasa',
            'label' => 'porcentajeGrasa',
            'unity' => '%',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([  //id = 14
            'name' => 'Grasa',
            'label' => 'grasa',
            'unity' => 'Kg',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([  //id = 15
            'name' => 'Porc. Masa Magra',
            'label' => 'porcentajeMasaMagra',
            'unity' => '%',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([   //id = 16
            'name' => 'Masa Magra',
            'label' => 'masaMagra',
            'unity' => 'Kg',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([    //id = 17
            'name' => 'IMC',
            'label' => 'imc',
            'unity' => '-',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([  //id = 18
            'name' => 'ICC', 
            'label' => 'icc', 
            'unity' => '-',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);

        DB::table('measures')->insert([   //id = 19
            'name' => 'ICA',
            'label' => 'ica',
            'unity' => '-',
            'created_at' => date("Y-m-d H:i:s"),         
            'updated_at' => date("Y-m-d H:i:s")         
        ]);
    }
}
