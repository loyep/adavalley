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
        $orders = factory(WorkOrder::class, 3)->create();
 
        $this->get('/work-orders')
            ->assertSeeText($orders[0]->status)
            ->assertSeeText($orders[1]->status)
            ->assertSeeText($orders[2]->status);
    }

    /** @test */
    public function a_employee_can_view_a_single_work_order()
    {
        $order = factory(WorkOrder::class)->states('assigned')->create();

        $this->get("/work-orders/{$order->id}")
            ->assertStatus(200)
            ->assertSeeText($order->status);
    }
}
