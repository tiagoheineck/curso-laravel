<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Integer;

use App\Cidade;
use App\Curso;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Primeiro teste - funcionando
        // $listCidades= DB::table('cidades')->pluck('id');

        // $faker = Faker\Factory::create();

        // DB::table('cursos')->insert([
        //     'nome' => Str::random(10).'-nome',
        //     'cidade_id' => $faker->randomElement($listCidades)
        // ]);

        //Segundo teste - funcionando
        // Vantagem deste create é que atualiza o timestamp!

        $cidade = Cidade::first();
        $curso = Curso::create(['nome' => 'Curso01', 'cidade_id' => $cidade->id]);

        //Terceiro teste - funcionando

        // $cidade = Cidade::first();
        // // $curso = Curso::create(['nome' => 'Laravel 7', 'cidade_id' => $cidade->id]);
        // DB::table('cursos')->insert([
        //         'nome' => 'Laravel 7',
        //         'cidade_id' => $cidade->id
        //     ]);
    }
}
