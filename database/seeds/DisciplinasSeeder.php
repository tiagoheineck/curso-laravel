<?php

use App\Model\Professor;
use App\Model\Disciplina;
use Illuminate\Database\Seeder;

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
        Disciplina::create(
            [
                'nome'=>'Matematica',
                'professor_id'=>$professor->id
            ],
        );
    }
}
