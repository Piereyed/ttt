<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
//        $this->call(ClientsTableSeeder::class);
        $this->call(LocalsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PersonsTableSeeder::class);  //crea el admin
        $this->call(ExperiencesTableSeeder::class);  
        $this->call(TrainingPhasesTableSeeder::class);  
        $this->call(GoalsTableSeeder::class);  
        $this->call(PeriodsTableSeeder::class);
        $this->call(MeasuresTableSeeder::class);
        $this->call(MusclesTableSeeder::class);        
        $this->call(StrengthTypesTableSeeder::class);        
        $this->call(MicrocyclesTableSeeder::class);        
        $this->call(PyramidsTableSeeder::class);        
    }
}
