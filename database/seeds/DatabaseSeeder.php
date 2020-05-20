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
        $this->call([
                // UserSeeder::class
                CidadesSeeder::class,
                CursosSeeder::class,
                ProfessoresSeeder::class,
                DisciplinasSeeder::class
        ]);
        // $this->call(CidadesSeeder::class);
    }
}
