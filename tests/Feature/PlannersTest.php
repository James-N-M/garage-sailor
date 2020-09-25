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

        $this->post('/planners', $planner->toArray())->assertSuccessful();

        $this->assertDatabaseHas('planners', ['name' => $planner->name]);
    }

    /** @test */
    public function authenticated_users_can_add_ad_to_planner()
    {
        $user = $this->signIn();

        $planner = factory(Planner::class)->create(['creator_id' => $user->id]);

        $ad = factory(Ad::class)->create();

        // TODO assert that users see the ad on the planner show page

        $this->post('/planners/' . $planner->id . $ad->path())->assertSuccessful();

        $this->assertDatabaseHas('ad_planner', ['planner_id' => $planner->id, 'ad_id' => $ad->id]);
    }
}
