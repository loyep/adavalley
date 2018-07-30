<?php

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
        factory(WorkOrder::class, 8)->states('assigned')->create();
        factory(WorkOrder::class, 2)->create(['status' => 'pending']);
    }
}
