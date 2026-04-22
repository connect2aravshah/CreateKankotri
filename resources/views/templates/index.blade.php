<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Templates</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
</head>
<body class="bg-gray-50 text-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="flex items-end justify-between gap-4 mb-8">
            <div>
                <h1 class="text-2xl font-semibold">Templates</h1>
                <p class="text-sm text-gray-500 mt-1">Click any template to open its details in a new tab.</p>
            </div>
        </div>

        @if (count($templates) === 0)
            <div class="rounded-lg border bg-white p-6">
                <div class="font-medium">No scraped data found.</div>
                <div class="text-sm text-gray-600 mt-1">
                    Run: <code class="px-1.5 py-0.5 bg-gray-100 rounded">/opt/lampp/bin/php artisan scrape:makemykankotri</code>
                </div>
            </div>
        @else
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6 justify-items-center">
                @foreach ($templates as $t)
                    @php
                        $id = $t['id'] ?? null;
                        $title = $t['title'] ?? '';
                        $img = $t['image'] ?? null;
                        $tags = is_array($t['tags'] ?? null) ? $t['tags'] : [];
                        $url = $id ? route('templates.show', ['id' => $id]) : null;
                    @endphp

                    <a href="{{ $url ?: '#' }}"
                       class="group flex flex-col items-center">
                        <div class="relative">
                            <div class="relative overflow-hidden rounded-xl bg-gradient-to-br from-gray-100 to-gray-50 transition-all duration-300 hover:shadow-lg hover:shadow-black/10 hover:scale-[1.02]"
                                 style="width:242px;height:523px;contain:layout style paint">
                            @if ($img)
                                <img src="{{ $img }}" alt="{{ $title }}" class="size-full object-cover object-top">
                            @else
                                <div class="size-full flex items-center justify-center text-sm text-gray-500">No image</div>
                            @endif
                                <div class="absolute bottom-0 inset-x-0 h-16 bg-gradient-to-t from-black/20 to-transparent pointer-events-none z-[5]"></div>
                            </div>
                        </div>

                        <div class="py-3 space-y-2.5" style="width:242px">
                            <div class="space-y-1">
                                <h3 class="line-clamp-2 text-base font-semibold leading-tight">{{ $title }}</h3>
                            </div>

                            <div class="flex items-center justify-end">
                                <span class="inline-flex items-center justify-center text-sm font-medium select-none transition-colors active:scale-[0.98] bg-rose-600 text-white hover:bg-rose-700 shadow-sm hover:shadow-md h-8 px-3 rounded-md">
                                    View
                                </span>
                            </div>

                            @if (count($tags) > 0)
                                <div class="flex flex-wrap gap-1">
                                    @foreach (array_slice($tags, 0, 4) as $tag)
                                        <div class="inline-flex items-center border rounded-full font-semibold text-[10px] px-1.5 py-0 bg-gray-100 border-gray-300 text-gray-700">
                                            {{ $tag }}
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>

