<?php

namespace Tests\Feature;

use App\Part;
use App\Asset;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewPartTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_employee_can_view_all_parts()
    {
        $parts = factory(Part::class, 3)->create();

        $this->get('/parts')
            ->assertSee($parts[0]->name)
            ->assertSee($parts[1]->description)
            ->assertSee($parts[2]->number);
    }

    /** @test */
    public function an_employee_can_view_a_single_part()
    {
        $part = factory(Part::class)->create();

        $this->get("/parts/$part->id")
            ->assertSee($part->description)
            ->assertSee($part->name)
            ->assertSee($part->number);
    }

    /** @test */
    public function an_employee_can_view_all_parts_associated_with_an_asset()
    {
        $asset = factory(Asset::class)->create();
        $parts = factory(Part::class, 2)->create();

        $asset->parts()->saveMany($parts);

        $this->get("/assets/$asset->id")
            ->assertSee($asset->parts()->latest()->first()->number)
            ->assertSee($asset->parts()->oldest()->first()->number);
    }
}
