<?php


namespace App\Scrapers;

use Goutte\Client as GoutteClient;

class VarageSale implements Scraper
{
    private $client;

    private $url;

    private $crawler;

    public function __construct()
    {
        $this->url = "https://www.varagesale.com/windsor-essex-ontario-buy-and-sell/c/more-categories%2Fevents-community%2Fgarage-yard-sales";

        $this->client = new GoutteClient();

        $this->crawler = $this->client->request('GET', $this->url);
    }

    public function scrape(): array
    {
        $links = [];

        $ads = [];

        $this->crawler->filter('.card > a')->each(function ($node) use (&$links) {
            $links[] = $node->link()->getUri();
        });

        foreach ($links as $link) {
            $client = new GoutteClient();

            $crawler = $client->request('GET', $link);

            $ad = ['name' => '', 'description' => ''];

            $ad['name'] = $crawler->filter('.title-container > h1')->text();

            $ad['description'] = $crawler->filter('.description-container .break-word')->text();

            $ad['origin'] = "Varagesale";

            $ads[] = $ad;
        }

        return $ads;
    }
}
