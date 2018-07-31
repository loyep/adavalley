<?php

use App\Machine;
use App\WorkOrder;
use Faker\Generator as Faker;

$factory->define(WorkOrder::class, function (Faker $faker) {
    return [];
});

$factory->state(WorkOrder::class, 'assigned', function ($faker) {
    return [
        'status' => 'assigned',
        'notes' => 'A place to give maintanence personel a description of what is wrong. ' . $faker->sentence(),
    ];
});

$factory->afterMakingState(WorkOrder::class, 'assigned', function ($order, $faker) {
    $machine = factory(Machine::class)->create();

    $order->machine()->associate($machine);
});