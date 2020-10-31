<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ScrapeCommandTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_scrapes_classifieds_sites()
    {
        // Given
        // There are new classifieds ads for a given client

        $this->assertDatabaseCount('ads', 0);

        // When
        // I trigger the scrapeCommand command
        // and assuming theres new classifieds ads
        $this->artisan('scrape');

        // Then
        // the data base ads table should have new records
        $this->assertDatabaseCount('ads', 1);
    }
}
