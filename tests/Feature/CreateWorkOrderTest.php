<?php

namespace Tests\Feature;

use App\WorkOrder;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateWorkOrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_work_order_can_be_created_in_database()
    {
        $workOrder = factory(WorkOrder::class)->make();

        $this->post('/work-orders', $workOrder->toArray())->assertStatus(201);

        $this->assertDatabaseHas('work_orders', ['id' => 1]);
    }

    /** @test */
    public function a_work_order_will_default_to_a_pending_status()
    {
        $workOrder = factory(WorkOrder::class)->make();

        $this->post('/work-orders', $workOrder->toArray());

        $this->assertDatabaseHas('work_orders', ['id' => 1, 'status' => 'pending']);
    }

    /** @test */
    public function a_work_order_must_be_associated_with_a_machine()
    {
        $workOrder = factory(WorkOrder::class)->make(['machine' => null]);

        $this->post('/work-orders', $workOrder->toArray());

        $this->assertDatabaseHas('work_orders', ['id' => 1, 'status' => 'pending']);
    }
}
