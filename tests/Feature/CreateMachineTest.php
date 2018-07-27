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
        $number = 34;
        
        $this->post('/machines', ['number' => $number])
            ->assertStatus(201);
            
        $this->assertDatabaseHas('machines', ['number' => $number]);
    }

    /** @test */
    public function a_machine_must_have_a_unique_number()
    {
        $this->post('/machines', ['number' => 1]);
        $this->post('/machines', ['number' => 1]);

        $this->assertCount(1, Machine::all());
    }
}
