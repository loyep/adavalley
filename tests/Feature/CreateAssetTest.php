<?php

namespace Tests\Feature;

use App\Asset;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateAssetTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_asset_can_be_created_in_database()
    {
        $asset = factory(Asset::class)->make();

        $this->post('/assets', $asset->toArray())
            ->assertStatus(200);
            
        $this->assertDatabaseHas('assets', [
            'number'        => $asset->number,
            'name'          => $asset->name,
            'description'   => $asset->description
        ]);
    }

    /** @test */
    public function a_asset_must_have_a_unique_number()
    {
        $asset = factory(Asset::class)->create();

        $this->post('/assets', ['number' => $asset->number])
            ->assertSessionHasErrorsIn('number');

        $this->assertCount(1, Asset::all());
    }

    /** @test */
    public function a_asset_must_have_a_name()
    {
        $nullName = null;

        $asset = factory(Asset::class)->make(['name' => $nullName]);

        $this->post('/assets', $asset->toArray())
            ->assertSessionHasErrorsIn('name');

        $this->assertCount(0, Asset::all());
    }
}
