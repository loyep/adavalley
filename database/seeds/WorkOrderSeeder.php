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
        $machineIds = \App\Machine::all()->pluck('id');

        for ($i = 0; $i < 4; $i++) {
            factory(WorkOrder::class)->create(['machine_id' => $machineIds->random()]);
        }  
    }
}
