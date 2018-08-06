<?php

use App\Part;
use App\Asset;
use App\Employee;
use App\WorkOrder;
use Illuminate\Database\Seeder;

class CMMSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assetCount = 10;
        $employeeCount = 2;
        $partCount = 23;
        $workOrderCount = 6;

        $employees = factory(Employee::class, $employeeCount)->create();
        $assets = factory(Asset::class, $assetCount)->create();
        $parts = factory(Part::class, $partCount)->create();
        $orders = factory(WorkOrder::class, $workOrderCount)->create();

        // associate parts with assets
        $assets->each(function ($asset, $key) use ($parts) {
            $asset->parts()->saveMany($parts->where('asset_id', null)->random(2));
        });

        // associate assets with work orders
        $orders->each(function ($order, $key) use ($assets, $employees) {
            $assets[$key]->orders()->save($order);
            $order->employee()->associate($employees->random());
            $order->save();
        });
    }
}
