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
        DB::table('locals')->insert([  // id = 1            
            'name' => 'Surco',
            'address' => 'Av. Universitaria 323'
        ]);
    }
}
