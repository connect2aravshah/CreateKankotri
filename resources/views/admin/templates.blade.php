<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin • Templates</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-900">
    <div class="max-w-3xl mx-auto px-4 py-10">
        <h1 class="text-2xl font-semibold">Admin • Templates</h1>
        <p class="mt-1 text-sm text-slate-600">This page is for you only (not customers).</p>

        <div class="mt-6 rounded-2xl border bg-white p-6 space-y-4">
            <div class="text-sm">
                <div><span class="font-semibold">Last scraped:</span> {{ $meta['scrapedAt'] ?? '—' }}</div>
                <div><span class="font-semibold">Source:</span> {{ $meta['sourceUrl'] ?? '—' }}</div>
                <div><span class="font-semibold">Templates:</span> {{ $meta['templateCountGuess'] ?? '—' }}</div>
            </div>

            <form method="POST" action="{{ route('scrape.run') }}" class="flex items-center gap-3">
                @csrf
                <button type="submit" class="inline-flex items-center justify-center rounded-full px-5 h-10 text-sm font-semibold text-white bg-slate-900 hover:bg-slate-800">
                    Run scraping now
                </button>
                <a href="/templates" class="text-sm underline text-slate-700">Open customer templates page</a>
            </form>

            @if (session()->has('scrape_output'))
                <div class="rounded-xl border bg-slate-50 p-4 text-sm">
                    <div class="font-semibold">Scrape output (exit {{ session('scrape_exit_code') }})</div>
                    <pre class="mt-2 text-xs text-slate-700 whitespace-pre-wrap">{{ session('scrape_output') }}</pre>
                </div>
            @endif
        </div>
    </div>
</body>
</html>

