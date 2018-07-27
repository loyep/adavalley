<?php

use App\Machine;
use App\WorkOrder;
use Faker\Generator as Faker;

$factory->define(WorkOrder::class, function (Faker $faker) {
    return [
        'machine_id' => factory(Machine::class)->create(),
        'notes' => 'A spot to detail the problem.  ' . $faker->sentence(),
    ];
});
