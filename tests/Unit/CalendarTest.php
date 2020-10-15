<?php

use App\Planner;
use App\Calendar;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CalendarTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_add_a_planner()
    {
        $calendar = factory(Calendar::class)->create();

        $planner = factory(Planner::class)->create();

        $calendar->addPlanner($planner);

        $this->assertInstanceOf(Planner::class, $calendar->planners->first());
    }
}
