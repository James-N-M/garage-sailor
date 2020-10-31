<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Scrapers\WebScraper;

class ScrapeCommand extends Command
{

    protected $signature = 'scrape';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $scraper = new WebScraper();

        $scraper->scrape();
    }
}
