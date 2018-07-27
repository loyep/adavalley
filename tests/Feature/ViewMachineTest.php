<?php

namespace Tests\Feature;

use App\Machine;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewMachineTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_employee_can_view_all_machines()
    {
        $machines = factory(Machine::class, 3)->create();

        $this->get('/machines')
            ->assertSee($machines[0]->fresh()->name)
            ->assertSee($machines[1]->fresh()->description)
            ->assertSee($machines[2]->fresh()->number);
    }
}
