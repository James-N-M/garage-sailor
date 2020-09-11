<?php

namespace Tests\Feature;

use App\Planner;
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
        $this->withoutExceptionHandling();

        $user = $this->signIn();

        $planners = factory(Planner::class, 5)->create(['creator_id' => $user->id]);

        $this->get('/planners')->assertOk()->assertSee($planners->first()->name);
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
}
