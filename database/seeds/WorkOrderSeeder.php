<?php

use App\Asset;
use App\WorkOrder;
use Illuminate\Database\Seeder;

class WorkOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(WorkOrder::class)->states('assigned')->create();
        factory(WorkOrder::class)->states('assigned')->create();
        factory(WorkOrder::class)->states('assigned')->create();
        factory(WorkOrder::class)->states('assigned')->create();
        factory(WorkOrder::class)->states('assigned')->create();
        factory(WorkOrder::class)->states('assigned')->create();
        factory(WorkOrder::class)->states('assigned')->create();
        factory(WorkOrder::class)->states('assigned')->create();

        factory(WorkOrder::class)->create();
        factory(WorkOrder::class)->create();
    }
}
