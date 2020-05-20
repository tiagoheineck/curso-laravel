<?php

use Illuminate\Database\Seeder;

use App\Professor;

class DisciplinasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $professor = Professor::first();

        DB::table('disciplinas')->insert([
            'nome' => 'Informática',
            'professor_id' => $professor->id
        ]);
    }
}
