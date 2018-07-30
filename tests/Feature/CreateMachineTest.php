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
        $duplicateNumber = (factory(Machine::class)->create())->number;

        $this->post('/machines', ['number' => $duplicateNumber])
            ->assertSessionHasErrorsIn('number')
            ->assertStatus(302);

        $this->assertCount(1, Machine::all());
    }

    /** @test */
    public function a_machine_must_have_a_name()
    {
        $nullName = null;

        $machine = factory(Machine::class)->make(['name' => $nullName]);

        $this->post('/machines', $machine->toArray())
            ->assertSessionHasErrorsIn('name');

        $this->assertCount(0, Machine::all());
    }
}
