<?php

use App\Machine;
use App\WorkOrder;
use Faker\Generator as Faker;

$factory->define(WorkOrder::class, function (Faker $faker) {
    return [];
});

$factory->state(WorkOrder::class, 'assigned', function ($faker) {
    $machineId = factory(Machine::class)->create()->id;
    return [
        'status' => 'assigned',
        'notes' => 'any notes you wanna put, to help the mechanic',
        'machine_id' => $machineId,
    ];
});
