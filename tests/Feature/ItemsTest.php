<?php

namespace Tests\Feature;

use App\Ad;
use App\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ItemsTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function a_guest_can_view_items()
    {
        $items = factory(Item::class, 5)->create();

        $this->get('/items')->assertOk()->assertSee($items->first()->name);
    }

    /** @test */
    public function an_authenticated_user_can_add_an_item_to_their_ad()
    {
        $user = $this->signIn();

        $ad = factory(Ad::class)->create(['creator_id' => $user->id]);

        $item = factory(Item::class)->make();

        $this->post("/items/{$ad->id}", ['item' => $item->toArray()])->assertSuccessful();

        $this->assertDatabaseHas('items', ['name' => $item->name, 'ad_id' => $ad->id]);
    }

    /** @test */
    public function an_authenticated_user_can_edit_an_item_from_their_ad()
    {
        $item = factory(Item::class)->create();

        $this->actingAs($item->ad->creator);

        $description = "This is an updated description of ad";

        $this->patch("/items/{$item->id}", ['description' => $description])->assertSuccessful();

        $this->assertDatabaseHas('items', ['description' => $description]);
    }

    /** @test */
    public function an_authenticated_user_can_delete_an_item_from_their_ad()
    {
        $item = factory(Item::class)->create();

        $this->actingAs($item->ad->creator);

        $this->delete("/items/{$item->id}")->assertSuccessful();

        $this->assertDatabaseMissing('items', ['name' => $item->name]);
    }
}
