<?php

use Illuminate\Database\Seeder;

class ProfessoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('professores')
        ->insert([
            [
                'nome'=>'Diego Menegazzi'
            ],
            [
                'nome'=>'Alisson'
            ],
            [
                'nome'=>'Tiago'
            ],
            [
                'nome'=>'Gustavo'
            ],
        ]                
        );
    }
}
