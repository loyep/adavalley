<?php

namespace Tests\Unit;

use App\Part;
use App\Asset;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AssetTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * An Asset can have many Parts.
     *
     * @return void
     */
    public function testParts()
    {
        $asset = factory(Asset::class)->create();
        $parts = factory(Part::class, 2)->create();

        $asset->addPart($parts);

        $this->assertInstanceOf(Part::class, $asset->parts()->find(1));
        $this->assertInstanceOf(Part::class, $asset->parts()->find(2));
    }

    /**
     * A Part can be associated with an Asset.
     *
     * @return void
     */
    public function testAddPart()
    {
        $asset = factory(Asset::class)->create();
        $part = factory(Part::class)->create();

        $asset->addPart($part);

        $this->assertCount(1, $asset->parts);
    }

    /**
     * Multiple Parts can be associated with an Asset.
     *
     * @return void
     */
    public function testAddParts()
    {
        $asset = factory(Asset::class)->create();
        $parts = factory(Part::class, 3)->create();

        $asset->addParts($parts);

        $this->assertCount(3, $asset->parts);
    }
}
