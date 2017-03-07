<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([  // id = 1
            'name' => 'Super'
        ]);
        
        DB::table('roles')->insert([  // id = 2
            'name' => 'Administrador'
        ]);
        
        DB::table('roles')->insert([  // id = 3
            'name' => 'Entrenador'
        ]);
        
        DB::table('roles')->insert([  // id = 4
            'name' => 'Cliente'
        ]);
        
    }
}
