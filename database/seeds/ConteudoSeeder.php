<?php

use App\Model\Conteudo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
