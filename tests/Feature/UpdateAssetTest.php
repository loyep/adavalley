<?php

namespace Tests\Feature;

use App\Asset;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateAssetTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_assets_number_can_be_updated_in_database()
    {
        $number = "234ab";
        $updatedNumber = "987zy";

        $asset = factory(Asset::class)->create(['number' => $number]);

        $this->assertDatabaseHas('assets', [
            'number' => $number,
            'name' => $asset->name,
            'description' => $asset->description,
        ]);

        $this->put("assets/{$asset->id}", ['number' => $updatedNumber])
            ->assertStatus(200);

        $this->assertDatabaseHas('assets', [
            'number' => $updatedNumber,
            'name' => $asset->name,
            'description' => $asset->description,
        ]);
    }

    /** @test */
    public function an_assets_name_can_be_updated_in_database()
    {
        $name = "old name";
        $updatedName = "updated name";

        $asset = factory(Asset::class)->create(['name' => $name]);

        $this->assertDatabaseHas('assets', [
            'number' => $asset->number,
            'name' => $name,
            'description' => $asset->description,
        ]);

        $this->put("assets/{$asset->id}", ['name' => $updatedName])
            ->assertStatus(200);

        $this->assertDatabaseHas('assets', [
            'number' => $asset->number,
            'name' => $updatedName,
            'description' => $asset->description,
        ]);
    }

    /** @test */
    public function an_assets_description_can_be_updated_in_database()
    {
        $description = "old description";
        $updatedDescription = "updated description";

        $asset = factory(Asset::class)->create(['description' => $description]);

        $this->assertDatabaseHas('assets', [
            'number' => $asset->number,
            'name' => $asset->name,
            'description' => $description,
        ]);

        $this->put("assets/{$asset->id}", ['description' => $updatedDescription])
            ->assertStatus(200);

        $this->assertDatabaseHas('assets', [
            'number' => $asset->number,
            'name' => $asset->name,
            'description' => $updatedDescription,
        ]);
    }
}
