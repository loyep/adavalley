<?php

namespace Tests\Unit;

use App\Asset;
use App\Employee;
use App\WorkOrder;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WorkOrderTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A WorkOrder can be assigned an Asset.
     *
     * @return void
     */
    public function testAsset()
    {
        $order = factory(WorkOrder::class)->make();
        $asset = factory(Asset::class)->make();

        $order->asset()->associate($asset);
        
        $this->assertInstanceOf(Asset::class, $order->asset);
    }

    /**
     * A WorkOrder can be assigned an Employee.
     *
     * @return void
     */
    public function testEmployee()
    {
        $order = factory(WorkOrder::class)->create();
        $employee = factory(Employee::class)->create();

        $order->employee()->associate($employee);
        
        $this->assertInstanceOf(Employee::class, $order->employee);
    }
}
