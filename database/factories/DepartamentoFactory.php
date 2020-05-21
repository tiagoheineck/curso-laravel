<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Departamento;
use Faker\Generator as Faker;

$factory->define(Departamento::class, function (Faker $faker) {
    return [
        'nome' => $faker->firstName
    ];
});
