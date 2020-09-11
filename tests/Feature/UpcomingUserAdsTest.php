<?php

namespace Tests\Feature;

use App\Ad;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Carbon\Carbon;

class UpcomingUserAdsTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function an_authenticated_user_can_view_a_users_upcoming_ads()
    {
        $this->signIn();

        $ad = factory(Ad::class)->create(['start_date_time' => Carbon::now()->addDays(5)->toDateTime()]);

        $creator = $ad->creator;

        $this->get("/users/{$creator->id}/ads/upcoming")->assertJsonFragment([
            'name' => $ad->name,
        ]);
    }
}
