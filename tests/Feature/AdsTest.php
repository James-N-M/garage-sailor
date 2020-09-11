<?php

namespace Tests\Feature;

use App\Ad;
use App\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_cannot_create_ads()
    {
        $ad = factory(Ad::class)->make();

        $this->get('/ads/create')->assertRedirect('login');

        $this->post('/ads', $ad->toArray())->assertRedirect('login');
    }

    /** @test */
    public function a_guest_can_view_ads()
    {
        $ads = factory(Ad::class, 5)->create();

        $this->get('/ads')->assertOk()->assertSee($ads->first()->name);
    }

    /** @test */
    public function an_authenticated_user_can_create_an_ad()
    {
        $this->signIn();

        $ad = factory(Ad::class)->make();

        $this->get('/ads/create')->assertOk();

        $this->post('/ads', $ad->toArray())->assertSuccessful();

        $this->assertDatabaseHas('ads', ['name' => $ad->name, 'description' => $ad->description]);
    }

    /** @test */
    public function an_authenticated_user_can_update_their_ad()
    {
        $user = $this->signIn();

        $ad = factory(Ad::class)->create(['creator_id' => $user->id]);

        $this->get("/ads/edit/{$ad->id}")->assertOk();

        $this->patch($ad->path(), ['name' => "Test"])->assertSuccessful();

        $this->assertDatabaseHas('ads', ['name' => "Test"]);
    }

    /** @test */
    public function an_authenticated_user_cant_update_an_ad_that_is_not_theirs()
    {
        $this->signIn();

        $ad = factory(Ad::class)->create();

        $this->get("/ads/edit/{$ad->id}")->assertStatus(403);

        $this->patch($ad->path(), ['name' => "Test"])->assertStatus(403);

        $this->assertDatabaseMissing('ads', ['name' => "Test"]);
    }

    /** @test */
    public function an_authenticated_user_can_delete_their_ad()
    {
        $user = $this->signIn();

        $ad = factory(Ad::class)->create(['creator_id' => $user->id]);

        $this->delete($ad->path())->assertSuccessful();

        $this->assertDatabaseMissing('ads', ['name' => $ad->name]);
    }

    /** @test */
    public function an_authenticated_user_cant_delete_an_ad_that_is_not_theirs()
    {
        $this->signIn();

        $ad = factory(Ad::class)->create();

        $this->delete($ad->path())->assertStatus(403);

        $this->assertDatabaseHas('ads', ['name' => $ad->name]);
    }

    /** @test */
    public function an_authenticated_user_can_create_an_ad_with_items()
    {
        $this->signIn();

        $ad = factory(Ad::class)->make();

        $items = factory(Item::class, 2)->make();

        $this->get('/ads/create')->assertOk();

        $this->post('/ads',
            array_merge($ad->toArray(), ['items' => $items->toArray()]))->assertSuccessful();

        $this->assertDatabaseHas('items', ['name' => $items[0]['name']]);
    }
}
