<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Professor;
use Faker\Generator as Faker;

$factory->define(Professor::class, function (Faker $faker) {
    return [
        'nome'  => $faker->name,
        'user_id' => [1,2,3,4]
    ];
});
