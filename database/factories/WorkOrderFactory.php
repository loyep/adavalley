<?php

use App\Machine;
use App\WorkOrder;
use Faker\Generator as Faker;

$factory->define(WorkOrder::class, function (Faker $faker) {
    return [
        'notes' => 'A spot to detail the problem.  ' . $faker->sentence(),
        'status' => 'pending',
    ];
});

$factory->state(WorkOrder::class, 'assigned', function ($faker) {
    $machine = factory(Machine::class)->create();

    return [
        'machine_id' => $machine->id,
        'status' => 'assigned',
        'notes' => 'A place to give maintanence personel a description of what is wrong. ' . $faker->sentence(),
    ];
});