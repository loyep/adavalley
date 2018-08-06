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
        $part = factory(Part::class)->create();

        $asset->parts()->save($part);
        
        $this->assertInstanceOf(Part::class, $asset->parts()->first());
    }
}
