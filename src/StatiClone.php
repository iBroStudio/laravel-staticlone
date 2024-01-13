<?php

namespace IBroStudio\StatiClone;

use GuzzleHttp\RequestOptions;
use IBroStudio\StatiClone\Observers\DefaultCrawlObserver;
use Illuminate\Support\Facades\Process;
use Spatie\Crawler\Crawler;
use Spatie\Crawler\CrawlProfiles\CrawlInternalUrls;

class StatiClone
{
    public function __construct(public readonly string $url) //TODO make ValueObject for url
    {
    }

    public function run()
    {
        /*
        Crawler::create([RequestOptions::ALLOW_REDIRECTS => true, RequestOptions::TIMEOUT => 30])
            ->acceptNofollowLinks()
            ->ignoreRobots()
            // ->setParseableMimeTypes(['text/html', 'text/plain'])
            ->setCrawlObserver(new DefaultCrawlObserver())
            ->setCrawlProfile(new CrawlInternalUrls($this->url))
            ->setMaximumResponseSize(1024 * 1024 * 2) // 2 MB maximum
            //->setTotalCrawlLimit(100) // limit defines the maximal count of URLs to crawl
            // ->setConcurrency(1) // all urls will be crawled one by one
            ->setDelayBetweenRequests(100)
            ->startCrawling($this->url);
        */

        $result = Process::path('/Users/yann/dev/php-packages/laravel-staticlone/download/')
            ->forever()
            ->run('wget --mirror --page-requisites --no-check-certificate --user-agent="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36" '.$this->url)
            ->throw();

        //return $result->output();

        return true;
    }
}
