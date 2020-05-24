<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DepartamentoSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('departamentos')->insert(
          [
            'nome'        => 'Filosofia',
            'chefe_id'    => 10
          ]
      );
    }
}
