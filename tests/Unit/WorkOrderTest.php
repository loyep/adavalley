<?php

namespace Tests\Unit;

use App\Asset;
use App\WorkOrder;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WorkOrderTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A WorkOrder can be associated with a Asset.
     *
     * @return void
     */
    public function testAsset()
    {
        $workOrder = factory(WorkOrder::class)->states('assigned')->create();
        
        $this->assertInstanceOf(Asset::class, $workOrder->asset);
    }
}
