<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateWorkOrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_work_order_can_be_created_in_database()
    {
        $this->post('/work-orders', [])->assertStatus(201);

        $this->assertDatabaseHas('work_orders', ['id' => 1]);
    }

    /** @test */
    public function a_work_order_will_default_to_a_pending_status()
    {
        $this->post('/work-orders', []);

        $this->assertDatabaseHas('work_orders', ['id' => 1, 'status' => 'pending']);
    }
}
