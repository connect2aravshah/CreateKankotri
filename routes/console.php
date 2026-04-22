<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\DomCrawler\Crawler;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('scrape:makemykankotri {--url=https://makemykankotri.in/templates} {--selector=} {--outDir=scrapes/makemykankotri}', function () {
    $url = (string) $this->option('url');
    $selector = (string) ($this->option('selector') ?? '');
    if ($selector === '') {
        $selector = '.container.py-12';
    }
    $outDir = trim((string) $this->option('outDir'), '/');

    $this->info("Fetching: {$url}");

    $res = Http::withHeaders([
        'User-Agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120 Safari/537.36',
        'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
    ])->timeout(30)->get($url);

    if (! $res->successful()) {
        $this->error("Request failed: HTTP {$res->status()}");
        return self::FAILURE;
    }

    $html = (string) $res->body();

    Storage::disk('local')->put("{$outDir}/page.html", $html);

    $crawler = new Crawler($html, $url);

    $fragmentHtml = null;
    if ($selector !== '') {
        $nodes = $crawler->filter($selector);
        if ($nodes->count() === 0) {
            $this->error("Selector matched 0 elements: {$selector}");
            $this->line("Tip: try something broad first, e.g. --selector='main' or --selector='body'");
            return self::FAILURE;
        }

        // Outer HTML of the first match.
        $node = $nodes->first()->getNode(0);
        if ($node === null) {
            $this->error("Selector matched, but node was null: {$selector}");
            return self::FAILURE;
        }

        $fragmentHtml = $node->ownerDocument?->saveHTML($node) ?: null;
        if ($fragmentHtml === null) {
            $this->error("Failed to extract outer HTML for selector: {$selector}");
            return self::FAILURE;
        }

        Storage::disk('local')->put("{$outDir}/fragment.html", $fragmentHtml);
        $this->info("Saved fragment HTML: storage/app/{$outDir}/fragment.html");
    }

    $root = $selector !== '' ? $crawler->filter($selector)->first() : $crawler;
    $cards = $root->filter('div.group.flex.flex-col.items-center');

    $templates = [];
    foreach ($cards as $cardEl) {
        $card = new Crawler($cardEl);

        $title = trim($card->filter('h3')->first()->text(''));
        if ($title === '') {
            continue;
        }

        $img = $card->filter('img')->first();
        $imgSrc = $img->count() ? (string) $img->attr('src') : null;

        $priceText = trim($card->filter('span')->reduce(function (Crawler $node) {
            return str_contains($node->text(''), 'From');
        })->first()->text(''));

        $href = $card->filter('a[href]')->first()->attr('href');
        $absHref = null;
        if ($href) {
            $href = (string) $href;
            $absHref = str_starts_with($href, 'http')
                ? $href
                : (parse_url($url, PHP_URL_SCHEME).'://'.parse_url($url, PHP_URL_HOST).$href);
        }

        $tags = [];
        foreach ($card->filter('div.flex.flex-wrap.gap-1 > div') as $tagEl) {
            $t = trim($tagEl->textContent ?? '');
            if ($t !== '' && $t[0] !== '+') {
                $tags[] = $t;
            }
        }

        $id = null;
        if ($href) {
            $parts = explode('/', trim((string) $href, '/'));
            $id = end($parts) ?: null;
        }

        $templates[] = [
            'id' => $id,
            'title' => $title,
            'image' => $imgSrc,
            'priceText' => $priceText !== '' ? $priceText : null,
            'href' => $href ? (string) $href : null,
            'url' => $absHref,
            'tags' => $tags,
        ];
    }

    Storage::disk('local')->put("{$outDir}/templates.json", json_encode([
        'sourceUrl' => $url,
        'scrapedAt' => now()->toIso8601String(),
        'selector' => $selector !== '' ? $selector : null,
        'templateCountGuess' => count($templates),
        'templates' => $templates,
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));

    $this->info("Saved page HTML: storage/app/{$outDir}/page.html");
    $this->info("Saved templates JSON: storage/app/{$outDir}/templates.json");

    return self::SUCCESS;
})->purpose('Scrape makemykankotri templates page (raw HTML + optional element fragment)');
