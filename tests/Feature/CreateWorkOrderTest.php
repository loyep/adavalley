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

        $this->post('/work-orders', $workOrder->toArray())
            ->assertStatus(201);

        $this->assertDatabaseHas('work_orders', ['id' => 1]);
    }

    /** @test */
    public function a_work_order_will_default_to_a_pending_status()
    {
        $workOrder = factory(WorkOrder::class)->create();

        $this->post('/work-orders', $workOrder->toArray())
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('work_orders', ['id' => 1, 'status' => 'pending', 'machine_id' => null]);
    }

    /** @test */
    public function a_work_order_with_a_status_other_than_pending_must_be_associated_with_a_machine()
    {
        $workOrder = factory(WorkOrder::class)->make(['status' => 'assigned']);

        $this->post('/work-orders', $workOrder->toArray())
            ->assertSessionHasErrorsIn('machine_id');

        $this->assertDatabaseMissing('work_orders', ['id' => 1]);
    }
}
