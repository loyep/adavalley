<?php

use App\Asset;
use Faker\Generator as Faker;

$factory->define(Asset::class, function (Faker $faker) {
    return [
        'number' => $faker->ean8,
        'name' => $faker->name,
        'description' => $faker->sentence(),
    ];
});
