<?php

use App\Asset;
use App\WorkOrder;
use Faker\Generator as Faker;

$factory->define(WorkOrder::class, function (Faker $faker) {
    return [];
});

$factory->state(WorkOrder::class, 'assigned', function ($faker) {
    $assetId = factory(Asset::class)->create()->id;
    
    return [
        'status' => 'Assigned',
        'notes' => 'any notes you wanna put, to help the mechanic',
        'asset_id' => $assetId,
    ];
});
