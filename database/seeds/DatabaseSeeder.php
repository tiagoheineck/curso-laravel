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
        $this->call(ProfessorSeeder::class);
        $this->call(DisciplinaSeeder::class);
        $this->call(DepartamentoSeeder::class);
        $this->call(ConteudoSeeder::class);
        $this->call(UserSeeder::class);
        
    }
}

