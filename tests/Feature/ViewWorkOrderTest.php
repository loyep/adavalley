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
            ->assertSee($workOrders[1]->fresh()->status)
            ->assertSee($workOrders[2]->fresh()->status)
            ->assertSee($workOrders[3]->fresh()->status);
    }

    /** @test */
    public function a_employee_can_view_a_single_work_order()
    {
        $workOrder = factory(WorkOrder::class)->states('assigned')->create();

        $this->get('/work-orders/1')
            ->assertSessionHasNoErrors()
            ->assertSeeText($workOrder->status);
    }
}
