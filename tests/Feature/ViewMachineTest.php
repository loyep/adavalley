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
            ->assertSee($machines[0]->name)
            ->assertSee($machines[1]->description)
            ->assertSee($machines[2]->number);
    }

    /** @test */
    public function an_employee_can_view_a_single_machine()
    {
        $machine = factory(Machine::class)->create();

        $this->get('/machines/1')
            ->assertSee($machine->description)
            ->assertSee($machine->name)
            ->assertSee($machine->number);
    }
}
