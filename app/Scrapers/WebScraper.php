<?php


namespace App\Scrapers;


use App\Ad;

class WebScraper implements Scraper
{
    public function scrape(): void
    {
        factory(Ad::class)->create();
    }
}
