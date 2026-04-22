<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $template['title'] ?? 'Template' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-900">
    @php
        $title = $template['title'] ?? '';
        $img = $template['image'] ?? null;
        $tags = is_array($template['tags'] ?? null) ? $template['tags'] : [];
        $id = $template['id'] ?? '';

        $pageUrl = url()->current();
        $waText = rawurlencode("Hi, I want this invitation template: {$title}\n\nLink: {$pageUrl}");
        $waLink = "https://wa.me/91{$whatsappNumber}?text={$waText}";
    @endphp

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 pb-28 lg:pb-10">
        <div class="flex items-center justify-between gap-4 mb-8">
            <div>
                <a href="/templates" class="text-sm text-gray-600 hover:underline">&larr; Back to templates</a>
                <h1 class="mt-2 text-2xl font-semibold">{{ $title }}</h1>
                @if (count($tags) > 0)
                    <div class="mt-3 flex flex-wrap gap-2">
                        @foreach ($tags as $tag)
                            <span class="inline-flex items-center rounded-full border bg-white px-2.5 py-1 text-xs font-medium text-gray-700">
                                {{ $tag }}
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>

            <a href="{{ $waLink }}" target="_blank" rel="noreferrer"
               class="hidden sm:inline-flex items-center justify-center rounded-full px-6 h-11 text-sm font-semibold text-white bg-green-600 hover:bg-green-700 shadow-lg shadow-green-600/20 ring-2 ring-green-500/20">
                Chat on WhatsApp
            </a>
        </div>

        <div class="grid lg:grid-cols-2 gap-8 items-start">
            <div class="rounded-2xl border bg-white p-4">
                <div class="rounded-xl overflow-hidden bg-gray-100">
                    @if ($img)
                        <img src="{{ $img }}" alt="{{ $title }}" class="w-full h-auto object-cover object-top">
                    @else
                        <div class="aspect-[3/5] flex items-center justify-center text-sm text-gray-500">No image</div>
                    @endif
                </div>
            </div>

            <div class="space-y-6">
                <div class="rounded-2xl border bg-white p-6">
                    <h2 class="text-lg font-semibold">Get this template</h2>
                    <p class="mt-1 text-sm text-gray-600">Most people use WhatsApp to confirm quickly.</p>

                    <a href="{{ $waLink }}" target="_blank" rel="noreferrer"
                       class="mt-5 w-full inline-flex items-center justify-center rounded-2xl px-6 h-12 text-sm font-semibold text-white bg-green-600 hover:bg-green-700 shadow-lg shadow-green-600/20 ring-2 ring-green-500/20">
                        Chat on WhatsApp (Fastest)
                    </a>

                    <div class="mt-3 text-xs text-gray-500">
                        WhatsApp: {{ $whatsappNumber }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed bottom-0 inset-x-0 z-50 sm:hidden">
        <div class="mx-auto max-w-6xl px-4 pb-4">
            <div class="rounded-2xl border bg-white/95 backdrop-blur shadow-lg p-3 flex gap-3">
                <a href="{{ $waLink }}" target="_blank" rel="noreferrer"
                   class="flex-1 inline-flex items-center justify-center rounded-xl h-12 text-sm font-semibold text-white bg-green-600 hover:bg-green-700 shadow ring-2 ring-green-500/20">
                    WhatsApp (Fastest)
                </a>
            </div>
        </div>
    </div>
</body>
</html>

