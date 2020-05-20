<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CidadesSeeder::class);
        $this->call(CursosSeeder::class);
        $this->call(ProfessoresSeeder::class);
        $this->call(DisciplinasSeeder::class);
        
    }
}
