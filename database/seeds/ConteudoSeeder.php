<?php

use App\Model\Conteudo;
use Illuminate\Database\Seeder;

class ConteudoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Conteudo::class,40)->create();
    }
}
