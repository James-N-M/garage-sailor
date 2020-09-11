<?php

namespace Tests\Unit;

use App\Item;
use App\Ad;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ItemTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_path()
    {
        $item = factory(Item::class)->create();

        $this->assertEquals('/items/' . $item->id, $item->path());
    }

    /** @test */
    public function it_belongs_to_an_ad()
    {
        $item = factory(Item::class)->create();

        $this->assertInstanceOf(Ad::class, $item->ad);
    }
}