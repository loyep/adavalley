<?php

use App\Machine;
use Faker\Generator as Faker;

$factory->define(Machine::class, function (Faker $faker) {
    return [
        'number' => $faker->ean8,
        'name' => $faker->name,
        'description' => $faker->sentence(),
    ];
});
