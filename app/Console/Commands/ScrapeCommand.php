<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Ad;
use App\Scrapers\VarageSale;

class ScrapeCommand extends Command
{
    protected $signature = 'scrape';

    protected $description = 'Scrapes all sites that are added to the handle method';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $scraper = new VarageSale();

        $ads = $scraper->scrape();

        $this->create($ads);
    }

    private function create($ads = [])
    {
        foreach ($ads as $ad) {
            Ad::create($ad);
        }
    }
}
