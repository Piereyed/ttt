<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class LocalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locals')->insert([
            ['name' => 'Surco',   // id = 1            
             'address' => 'Av. Universitaria 323'],
            ['name' => 'Miraflores', 
             'address' => 'Av. Pardo 3323'],
             ['name' => 'San Borja', 
             'address' => 'Av. Pardo 3323'],
             ['name' => 'Surquillo', 
             'address' => 'Av. Pardo 3323'],
             ['name' => 'Surco Viejo', 
             'address' => 'Av. Pardo 3323'],
             ['name' => 'Carl', 
             'address' => 'Av. Pardo 3323'],
             ['name' => 'Gernomo', 
             'address' => 'Av. Pardo 3323'],
             ['name' => 'Chorrillos', 
             'address' => 'Av. Pardo 3323'],
             ['name' => 'SJM', 
             'address' => 'Av. Pardo 3323'],
             ['name' => 'Higereta', 
             'address' => 'Av. Pardo 3323'],
             ['name' => 'Flores', 
             'address' => 'Av. Pardo 3323'],
             ['name' => 'Lima', 
             'address' => 'Av. Pardo 3323'],
             ['name' => 'Trujillo', 
             'address' => 'Av. Pardo 3323'],
             ['name' => 'San Agustin', 
             'address' => 'Av. Pardo 3323'],
             ['name' => 'Ica', 
             'address' => 'Av. Pardo 3323'],
             ['name' => 'Loreto', 
             'address' => 'Av. Pardo 3323'],
             ['name' => 'Tumbes', 
             'address' => 'Av. Pardo 3323'],
             ['name' => 'Piura', 
             'address' => 'Av. Pardo 3323'],
             ['name' => 'Lambayeque', 
             'address' => 'Av. Pardo 3323'],
             ['name' => 'Colmena', 
             'address' => 'Av. Pardo 3323'],
             ['name' => 'VMT', 
             'address' => 'Av. Pardo 3323']
        ]);
    }
}
