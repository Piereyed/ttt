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
        ]);

        DB::table('measures')->insert([  
            'name' => 'Hombros',
            'label' => 'hombros',
            'unity' => 'cm',
        ]);

        DB::table('measures')->insert([  
            'name' => 'Pecho',
            'label' => 'pecho',
            'unity' => 'cm',
        ]);

        DB::table('measures')->insert([  
            'name' => 'Cintura',
            'label' => 'cintura',
            'unity' => 'cm',
        ]);

        DB::table('measures')->insert([  
            'name' => 'Cadera',
            'label' => 'cadera',
            'unity' => 'cm',
        ]);

        DB::table('measures')->insert([  
            'name' => 'Brazo',
            'label' => 'brazo',
            'unity' => 'cm',
        ]);

        DB::table('measures')->insert([  
            'name' => 'Antebrazo',
            'label' => 'antebrazo',
            'unity' => 'cm',
        ]);

        DB::table('measures')->insert([  
            'name' => 'Trasero', //8
            'label' => 'trasero',
            'unity' => 'cm',
        ]);

        DB::table('measures')->insert([  
            'name' => 'Pierna',
            'label' => 'pierna',
            'unity' => 'cm',
        ]);

        DB::table('measures')->insert([  
            'name' => 'Pantorrilla',
            'label' => 'pantorrilla',
            'unity' => 'cm',
        ]);

        DB::table('measures')->insert([  //id = 11
            'name' => 'Talla',
            'label' => 'talla',
            'unity' => 'cm',
        ]);

        DB::table('measures')->insert([  //id = 12
            'name' => 'Peso',
            'label' => 'peso',
            'unity' => 'Kg',
        ]);

        DB::table('measures')->insert([   //id = 13
            'name' => 'Porc. Grasa',
            'label' => 'porcentajeGrasa',
            'unity' => '%',
        ]);

        DB::table('measures')->insert([  //id = 14
            'name' => 'Grasa',
            'label' => 'grasa',
            'unity' => 'Kg',
        ]);

        DB::table('measures')->insert([  //id = 15
            'name' => 'Porc. Masa Magra',
            'label' => 'porcentajeMasaMagra',
            'unity' => '%',
        ]);

        DB::table('measures')->insert([   //id = 16
            'name' => 'Masa Magra',
            'label' => 'masaMagra',
            'unity' => 'Kg',
        ]);

        DB::table('measures')->insert([    //id = 17
            'name' => 'IMC',
            'label' => 'imc',
            'unity' => '-',
        ]);

        DB::table('measures')->insert([  //id = 18
            'name' => 'ICC', 
            'label' => 'icc', 
            'unity' => '-',
        ]);

        DB::table('measures')->insert([   //id = 19
            'name' => 'ICA',
            'label' => 'ica',
            'unity' => '-',
        ]);
    }
}
