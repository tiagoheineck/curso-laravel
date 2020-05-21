<?php

use App\Model\Curso;
use App\Model\Cidade;
use Illuminate\Database\Seeder;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cidade = Cidade::first();
        
        Curso::create(
            [
                'nome'=>'Computação',
                'cidade_id'=>$cidade->id,
                'departamento_id'=>rand(1,5)
            ]
        );
    }
}
