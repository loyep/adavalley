<?php

namespace Tests\Unit;

use App\Machine;
use App\WorkOrder;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WorkOrderTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A WorkOrder is associated with a Machine.
     *
     * @return void
     */
    public function testMachine()
    {
        $workOrder = factory(WorkOrder::class)->states('assigned')->create();
        
        $this->assertInstanceOf(Machine::class, $workOrder->machine);
    }
}
