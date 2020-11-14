<?php

namespace Tests\Feature;

use App\Planner;
use App\Ad;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlannersTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function guests_cant_create_planners()
    {
        $planner = factory(Planner::class)->make();

        $this->get('/planners/create')->assertRedirect('login');

        $this->post('/planners', $planner->toArray())->assertRedirect('login');
    }

    /** @test */
    public function authenticated_users_can_view_their_planners()
    {
        $user = $this->signIn();

        $planners = factory(Planner::class, 5)->create(['creator_id' => $user->id]);

        $this->get('/planners')->assertOk()->assertSee($planners->first()->name);
    }

    /** @test */
    public function authenticated_users_can_view_one_of_their_planners()
    {
        $user = $this->signIn();

        $planner = factory(Planner::class)->create(['creator_id' => $user->id]);

        $this->get('/planners/' . $planner->id)->assertOk()->assertSee($planner->name);
    }

    /** @test */
    public function authenticated_users_can_create_planners()
    {
        $this->signIn();

        $planner = factory(Planner::class)->make();

        $this->get('/planners/create')->assertOk();

        $this->post('/planners', $planner->toArray());

        $this->assertDatabaseHas('planners', ['name' => $planner->name]);
    }

    /** @test */
    public function authenticated_users_can_add_ad_to_planner()
    {
        $user = $this->signIn();

        $planner = factory(Planner::class)->create(['creator_id' => $user->id]);

        $ad = factory(Ad::class)->create();

        $this->post('/planners/' . $planner->id . $ad->path())->assertSuccessful();

        $this->assertDatabaseHas('ad_planner', ['planner_id' => $planner->id, 'ad_id' => $ad->id]);
    }

    /** @test */
    public function a_user_can_add_a_starting_point_to_their_planner()
    {
        $user = $this->signIn();

        $planner = factory(Planner::class)->create(['creator_id' => $user->id]);
        $planner->addAd($ad = factory(Ad::class)->create());
        $planner->addAd(factory(Ad::class)->create());
        $planner->addAd(factory(Ad::class)->create());

        $this->get("/planners/edit/$planner->id")->assertOk();

        $this->patch("/ad-planner/$planner->id", ['start' => $ad->id]);

        $this->assertDatabaseHas('ad_planner', ['ad_id' => $ad->id, 'planner_id' => $planner->id, 'start' => true]);
    }

    /** @test */
    public function a_user_can_add_a_end_point_to_their_planner()
    {
        $user = $this->signIn();

        $planner = factory(Planner::class)->create(['creator_id' => $user->id]);
        $planner->addAd($ad = factory(Ad::class)->create());
        $planner->addAd(factory(Ad::class)->create());
        $planner->addAd(factory(Ad::class)->create());

        $this->get("/planners/edit/$planner->id")->assertOk();

        $this->patch("/ad-planner/$planner->id", ['end' => $ad->id]);

        $this->assertDatabaseHas('ad_planner', ['ad_id' => $ad->id, 'planner_id' => $planner->id, 'end' => true]);
    }
}
