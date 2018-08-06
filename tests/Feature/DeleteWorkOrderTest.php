<?php

namespace Tests\Feature;

use App\WorkOrder;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteWorkOrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_employee_can_delete_a_pending_work_order()
    {
        $order = factory(WorkOrder::class)->create();

        $this->assertCount(1, WorkOrder::all());

        $this->delete("work-orders/$order->id", [$order->id]);
        
        $this->assertCount(0, WorkOrder::all());
    }
}
