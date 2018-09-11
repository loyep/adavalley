<?php

namespace Tests\Feature;

use App\Part;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdatePartTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_part_number_can_be_updated_in_database()
    {
        $number = "234ab";
        $updatedNumber = "987zy";

        $part = factory(Part::class)->create(['number' => $number]);

        $this->assertDatabaseHas('parts', [
            'number' => $number,
            'name' => $part->name,
            'description' => $part->description,
        ]);

        $this->put("parts/{$part->id}", ['number' => $updatedNumber])
            ->assertStatus(200);

        $this->assertDatabaseHas('parts', [
            'number' => $updatedNumber,
            'name' => $part->name,
            'description' => $part->description,
        ]);
    }

    /** @test */
    public function a_part_name_can_be_updated_in_database()
    {
        $name = "old name";
        $updatedName = "updated name";

        $part = factory(Part::class)->create(['name' => $name]);
        
        $this->assertDatabaseHas('parts', [
            'number' => $part->number,
            'name' => $name,
            'description' => $part->description,
        ]);

        $this->put("parts/{$part->id}", ['name' => $updatedName])
            ->assertStatus(200);

        $this->assertDatabaseHas('parts', [
            'number' => $part->number,
            'name' => $updatedName,
            'description' => $part->description,
        ]);
    }

    /** @test */
    public function a_part_description_can_be_updated_in_database()
    {
        $description = "old description";
        $updatedDescription = "updated description";

        $part = factory(Part::class)->create(['description' => $description]);

        $this->assertDatabaseHas('parts', [
            'number' => $part->number,
            'name' => $part->name,
            'description' => $description,
        ]);

        $this->put("parts/{$part->id}", ['description' => $updatedDescription])
            ->assertStatus(200);

        $this->assertDatabaseHas('parts', [
            'number' => $part->number,
            'name' => $part->name,
            'description' => $updatedDescription,
        ]);
    }
}
