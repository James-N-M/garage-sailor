<?php


namespace App\Scrapers;

use Goutte\Client as GoutteClient;
use Carbon\Carbon;

class Kijiji implements Scraper
{
    private $client;

    private $url;

    private $crawler;

    public function __construct()
    {
        $this->url = "https://www.kijiji.ca/b-garage-sale-yard-sale/windsor-area-on/c638l1700220";

        $this->client = new GoutteClient();

        $this->crawler = $this->client->request('GET', $this->url);
    }

    public function scrape(): array
    {
        $links = [];

        $ads = [];

        $this->crawler->filter('.search-item')->each(function ($node) use (&$links) {
            $links[] = "https://www.kijiji.ca" . $node->attr('data-vip-url');
        });

        foreach ($links as $link) {
            $client = new GoutteClient();

            $crawler = $client->request('GET', $link);

            $ad = ['name' => '', 'description' => ''];

            $ad['name'] = $crawler->filter('div > h1')->text();

            $ad['description'] = $crawler->filter('div > p')->text();

            if ($crawler->filter('dd')->count()) {

                $startDateTime = "";
                $endDateTime = "";
                // Start time
                $crawler->filter('dd > span')
                    ->first()
                    ->children('span')->each(function ($node) use (&$startDateTime) {
                        $startDateTime .= $node->text() . " ";
                    });

                // End time
                $crawler->filter('dd > span')
                    ->last()
                    ->children('span')->each(function ($node) use (&$endDateTime) {
                        $endDateTime .= $node->text() . " ";
                    });

                $ad['start_date_time'] = Carbon::parse($startDateTime)->toDateTime();
                $ad['end_date_time'] = Carbon::parse($endDateTime)->toDateTime();
            }

            // Address
            if ($crawler->filter('[itemprop="address"]')->count()) {
                $ad['address'] = $crawler->filter('[itemprop="address"]')->text();
            }

            $ad['origin'] = "Kijiji";

            $ads[] = $ad;
        }

        return $ads;
    }
}
