<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Disciplina;
use Faker\Generator as Faker;

$factory->define(Disciplina::class, function (Faker $faker) {
    return [
        'nome'  => $faker->name,
        'professor_id'  => rand(1,40)
    ];
});
