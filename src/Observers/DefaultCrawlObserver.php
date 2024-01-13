<?php

namespace IBroStudio\StatiClone\Observers;

use DOMDocument;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use Spatie\Crawler\CrawlObservers\CrawlObserver;

class DefaultCrawlObserver extends CrawlObserver
{
    private $content;

    public function __construct()
    {
        $this->content = null;
    }

    public function willCrawl(UriInterface $url, ?string $linkText): void
    {
        Log::info('willCrawl', ['url' => $url]);
    }

    public function crawled(
        UriInterface $url,
        ResponseInterface $response,
        ?UriInterface $foundOnUrl = null,
        ?string $linkText = null,
    ): void {
        $doc = new DOMDocument();
        @$doc->loadHTML($response->getBody());
        //$doc->saveHTMLFile(storage_path('app/test.html'));
        $doc->saveHTMLFile('/Users/yann/dev/php-packages/laravel-staticlone/test.html');
        //# save HTML
        $content = $doc->saveHTML();
        //# convert encoding
        $content1 = mb_convert_encoding($content, 'UTF-8', mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true));
        //# strip all javascript
        $content2 = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $content1);
        //# strip all style
        $content3 = preg_replace('/<style\b[^>]*>(.*?)<\/style>/is', '', $content2);
        //# strip tags
        $content4 = str_replace('<', ' <', $content3);
        $content5 = strip_tags($content4);
        $content6 = str_replace('  ', ' ', $content5);
        //# strip white spaces and line breaks
        $content7 = preg_replace('/\s+/S', ' ', $content6);
        //# html entity decode - ö was shown as &ouml;
        $html = html_entity_decode($content7);
        //# append
        $this->content .= $html;
    }

    public function crawlFailed(
        UriInterface $url,
        RequestException $requestException,
        ?UriInterface $foundOnUrl = null,
        ?string $linkText = null,
    ): void {
        Log::error('crawlFailed', ['url' => $url, 'error' => $requestException->getMessage()]);
    }

    public function finishedCrawling(): void
    {
        Log::info('finishedCrawling');
        //# store $this->content in DB
        //# Add logic here
        //dd($this->content);
    }
}
