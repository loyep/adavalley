<?php

namespace Tests\Feature;

use App\Part;
use App\Asset;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ActivatingAssetsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_asset_can_be_marked_active_and_deactivated()
    {
        $asset = factory(Asset::class)->create();

        $asset->deactivate();

        $this->assertSoftDeleted('assets', $asset->toArray());

        $asset->activate();

        $this->assertNull($asset->deleted_at);
    }

    /** @test */
    public function a_part_can_be_marked_active_and_deactivated()
    {
        $part = factory(Part::class)->create();
        
        $part->deactivate();

        $this->assertSoftDeleted('parts', $part->toArray());

        $part->activate();

        $this->assertNull($part->deleted_at);
    }
}
