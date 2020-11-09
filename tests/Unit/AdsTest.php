<?php

namespace Tests\Unit;

use App\Ad;
use App\AdCollection;
use App\User;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_collection_of_ads_can_calculate_the_shortest_path_to_each_ad()
    {
//        // Given we have a collection of ads
//        factory(Ad::class)->create(['latitude' => "52.52282",'longitude' => "13.37011"]);
//        factory(Ad::class)->create(['latitude' => "52.51293",'longitude' => "13.24021",]);
//
//        factory(Ad::class)->create(['latitude' => "52.53066",'longitude' => "13.38511",]);
//        factory(Ad::class)->create(['latitude' => "52.50341",'longitude' => "13.44429",]);
//
//        $ads = Ad::all();
//
//        $ads->shortestPath();
//
//        $this->assertArrayHasKey('waypoints', $ads->shortestPath);
    }

}
