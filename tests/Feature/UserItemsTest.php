<?php

namespace Tests\Feature;

use App\Ad;
use App\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserItemsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_authenticated_user_can_view_their_items()
    {
        $this->withoutExceptionHandling();

        $user = $this->signIn();

        $ad = factory(Ad::class)->create();

        $items = factory(Item::class, 3)->create(['ad_id' => $ad->id]);

        $this->get("/users/$user->id/items")->assertSee($items->first()->name);
    }
}
