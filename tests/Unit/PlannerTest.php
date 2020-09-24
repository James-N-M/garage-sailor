<?php

namespace Tests\Unit;

use App\Planner;
use App\Ad;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlannerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_path()
    {
        $planner = factory(Planner::class)->create();

        $this->assertEquals('/planners/' . $planner->id, $planner->path());
    }

    /** @test */
    public function it_can_add_an_ad()
    {
        $planner = factory(Planner::class)->create();

        $planner->addAd($ad = factory(Ad::class)->create());

        $this->assertCount(1, $planner->ads);

        $this->assertTrue($planner->ads->contains($ad));
    }

    /** @test */
    public function it_can_remove_an_add()
    {
        $planner = factory(Planner::class)->create();

        $planner->addAd($ad = factory(Ad::class)->create());

        $this->assertTrue($planner->ads->contains($ad));

        $planner->removeAd($ad);

        $this->assertDatabaseMissing('ad_planner', ['ad_id' => $ad->id, 'planner_id' => $planner->id]);
    }
}
