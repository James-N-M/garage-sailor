<?php

namespace Tests\Unit;

use App\Item;
use App\User;
use App\Ad;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_path()
    {
        $ad = factory(Ad::class)->create();

        $this->assertEquals('/ads/' . $ad->id, $ad->path());
    }

    /** @test */
    public function it_belongs_to_a_creator()
    {
        $ad = factory(Ad::class)->create();

        $this->assertInstanceOf(User::class, $ad->creator);
    }

    /** @test */
    public function it_can_add_a_item()
    {
        $ad = factory(Ad::class)->create();

        $item = $ad->addItem(factory(Item::class)->make()->toArray());

        $this->assertCount(1, $ad->items);

        $this->assertTrue($ad->items->contains($item));
    }
}