<?php

use App\Part;
use Faker\Generator as Faker;

$factory->define(Part::class, function (Faker $faker) {
    return [
        'number' => $faker->ean13,
        'name' => $faker->name,
        'description' => $faker->sentence(),
    ];
});
