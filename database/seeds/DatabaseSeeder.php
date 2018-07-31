<?php

use App\WorkOrder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(WorkOrderSeeder::class);
        for ($i = 0; $i < 8; $i++) {
            factory(WorkOrder::class)->states('assigned')->create();
        }
    
        factory(WorkOrder::class, 2)->create();
    }
}
