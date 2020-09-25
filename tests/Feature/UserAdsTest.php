<?php

namespace Tests\Feature;

use App\Ad;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserAdsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_authenticated_user_can_view_their_ads()
    {
        $user = $this->signIn();

        $ads = factory(Ad::class, 3)->create(['creator_id' => $user->id]);

        $this->get("/users/$user->id/ads")->assertSee($ads->first()->name);
    }
}
