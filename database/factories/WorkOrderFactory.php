<?php

use App\Asset;
use App\WorkOrder;
use Faker\Generator as Faker;

$factory->define(WorkOrder::class, function (Faker $faker) {
    return [
        'notes' => 'A place for notes.',
    ];
});
