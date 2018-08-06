<?php

namespace Tests\Feature;

use App\Asset;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewAssetTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_employee_can_view_all_assets()
    {
        $assets = factory(Asset::class, 3)->create();

        $this->get('/assets')
            ->assertSee($assets[0]->name)
            ->assertSee($assets[1]->description)
            ->assertSee($assets[2]->number);
    }

    /** @test */
    public function an_employee_can_view_a_single_asset()
    {
        $asset = factory(Asset::class)->create();

        $this->get('/assets/1')
            ->assertSee($asset->description)
            ->assertSee($asset->name)
            ->assertSee($asset->number);
    }
}
