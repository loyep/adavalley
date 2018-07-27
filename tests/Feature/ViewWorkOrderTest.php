<?php

namespace Tests\Feature;

use App\WorkOrder;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewWorkOrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_employee_can_view_all_work_orders()
    {
        $workOrders = factory(WorkOrder::class, 4)->create();

        $this->get('/work-orders')
            ->assertSee($workOrders[0]->fresh()->status)
            ->assertSee($workOrders[1]->fresh()->machine_id)
            ->assertSee($workOrders[2]->fresh()->status)
            ->assertSee($workOrders[3]->fresh()->machine_id);
    }
}
