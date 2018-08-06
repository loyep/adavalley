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
        $this->post('/work-orders', [])
            ->assertStatus(200);

        $this->assertDatabaseHas('work_orders', ['id' => 1, 'status' => 'Pending']);
    }

    /** @test */
    public function a_work_order_with_a_status_other_than_pending_must_be_associated_with_a_asset()
    {
        $this->post('/work-orders', ['status' => 'Complete'])
            ->assertSessionHasErrorsIn('asset_id');

        $this->assertDatabaseMissing('work_orders', ['id' => 1, 'status' => ['Complete']]);
    }
}
