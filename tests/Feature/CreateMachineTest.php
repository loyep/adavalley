<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Machine;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateMachineTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_machine_can_be_created_in_database()
    {
        $machine = factory(Machine::class)->make();

        $this->post('/machines', $machine->toArray())
            ->assertStatus(201);
            
        $this->assertDatabaseHas('machines', [
            'number'        => $machine->number,
            'name'          => $machine->name,
            'description'   => $machine->description
        ]);
    }

    /** @test */
    public function a_machine_must_have_a_unique_number()
    {
        $machine = factory(Machine::class)->create();

        $this->post('/machines', ['number' => $machine->number])->assertStatus(302);

        $this->assertCount(1, Machine::all());
    }
}
