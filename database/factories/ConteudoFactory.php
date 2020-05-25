<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Model\Conteudo;
use Faker\Generator as Faker;

$factory->define(Conteudo::class, function (Faker $faker) {
    return [
        'titulo'  => $faker->name,
        'conteudo' => $faker->name,
        'disciplina_id'  => rand(1,40)
    ];
});
