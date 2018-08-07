<?php

namespace Tests\Unit;

use App\Part;
use App\Asset;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;

class PartTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A Part can belong to an Asset.
     *
     * @return void
     */
    public function testAsset()
    {
        $asset = factory(Asset::class)->create();
        $part = factory(Part::class)->create();

        $asset->addPart($part);

        $this->assertInstanceOf(Asset::class, $part->asset);
    }
}
