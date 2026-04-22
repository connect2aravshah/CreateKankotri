<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'CreateKankotri') }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .glass {
            background: rgba(255, 255, 255, 0.55);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .floaty {
            animation: floaty 6s ease-in-out infinite;
        }
        @keyframes floaty {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .shine {
            position: relative;
            overflow: hidden;
        }
        .shine:before {
            content: "";
            position: absolute;
            inset: -120% -80%;
            background: linear-gradient(110deg, transparent 35%, rgba(255,255,255,.35) 50%, transparent 65%);
            transform: translateX(-40%);
            transition: transform 800ms ease;
            pointer-events: none;
        }
        .shine:hover:before { transform: translateX(40%); }
        .reveal { opacity: 0; transform: translateY(14px); transition: opacity 650ms ease, transform 650ms ease; }
        .reveal.is-visible { opacity: 1; transform: translateY(0); }
    </style>
</head>
<body class="min-h-screen text-slate-900">
    <div class="relative overflow-hidden">
        <div class="absolute inset-0 -z-10">
            <div class="absolute -top-32 left-1/2 -translate-x-1/2 h-[520px] w-[1200px] rounded-full bg-gradient-to-r from-rose-200 via-fuchsia-200 to-indigo-200 blur-3xl opacity-70"></div>
            <div class="absolute top-40 left-1/2 -translate-x-1/2 h-[520px] w-[1200px] rounded-full bg-gradient-to-r from-amber-100 via-rose-100 to-purple-100 blur-3xl opacity-70"></div>
        </div>

        <header class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6">
            <div class="flex items-center justify-between">
                <a href="/" class="flex items-center gap-2">
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-gradient-to-br from-rose-600 to-fuchsia-700 text-white font-bold">CK</span>
                    <span class="font-semibold tracking-tight">CreateKankotri</span>
                </a>

                <nav class="hidden md:flex items-center gap-6 text-sm text-slate-700">
                    <a href="/templates" class="hover:text-slate-900">Templates</a>
                    <a href="#features" class="hover:text-slate-900">Features</a>
                    <a href="#testimonials" class="hover:text-slate-900">Loved by</a>
                </nav>

                <div class="flex items-center gap-3">
                    <a href="/templates" class="hidden sm:inline-flex items-center justify-center rounded-full px-5 h-10 text-sm font-semibold border border-slate-200 bg-white/70 hover:bg-white transition">
                        Browse templates
                    </a>
                    <a href="/templates" class="inline-flex items-center justify-center rounded-full px-5 h-10 text-sm font-semibold text-white bg-gradient-to-r from-rose-600 to-fuchsia-700 hover:opacity-95 shadow">
                        Get started
                    </a>
                </div>
            </div>
        </header>

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-14 pb-14">
            <section class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-flex items-center gap-2 rounded-full border border-white/60 glass px-4 py-2 text-xs font-medium text-slate-700">
                        <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                        Digital invitations • Mobile-first • Fast setup
                    </div>

                    <h1 class="mt-6 text-4xl sm:text-5xl font-semibold tracking-tight">
                        Digital Invitations That
                        <span class="bg-gradient-to-r from-rose-600 to-fuchsia-700 bg-clip-text text-transparent">Speak</span>
                        to Your Guests
                    </h1>

                    <p class="mt-4 text-slate-600 text-base sm:text-lg leading-relaxed max-w-xl">
                        Beautiful animated invitation templates for weddings, baby showers, birthdays, and celebrations.
                        Personalize quickly and share everywhere.
                    </p>

                    <div class="mt-8 flex flex-col sm:flex-row gap-3">
                        <a href="/templates" class="shine inline-flex items-center justify-center rounded-full px-6 h-11 text-sm font-semibold text-white bg-gradient-to-r from-rose-600 to-fuchsia-700 hover:opacity-95 shadow-lg shadow-rose-600/20 ring-2 ring-rose-500/10 active:scale-[0.98] transition">
                            Explore templates
                        </a>
                        <a href="#how" class="inline-flex items-center justify-center rounded-full px-6 h-11 text-sm font-semibold border border-slate-200 bg-white/70 hover:bg-white transition active:scale-[0.98]">
                            Ready in 30 minutes
                        </a>
                    </div>

                    <div class="mt-10 grid grid-cols-3 gap-4 max-w-md">
                        <div class="rounded-2xl glass border border-white/60 p-4 hover:bg-white/70 transition">
                            <div class="text-xs text-slate-600">Templates</div>
                            <div class="text-xl font-semibold mt-1 tabular-nums" data-count="{{ $templateCount }}">{{ $templateCount }}</div>
                        </div>
                        <div class="rounded-2xl glass border border-white/60 p-4 hover:bg-white/70 transition">
                            <div class="text-xs text-slate-600">Delivery</div>
                            <div class="text-xl font-semibold mt-1">Fast</div>
                        </div>
                        <div class="rounded-2xl glass border border-white/60 p-4 hover:bg-white/70 transition">
                            <div class="text-xs text-slate-600">Share</div>
                            <div class="text-xl font-semibold mt-1">Anywhere</div>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute -inset-6 rounded-[2.5rem] bg-gradient-to-br from-rose-300/40 to-indigo-300/40 blur-2xl"></div>
                    <div class="relative mx-auto w-[320px] sm:w-[360px]">
                        <div class="floaty rounded-[2.5rem] bg-slate-900 p-3 shadow-2xl">
                            <div class="rounded-[2rem] bg-white overflow-hidden">
                                <div class="h-12 bg-slate-50 flex items-center justify-center text-xs text-slate-500">Preview</div>
                                <div class="aspect-[9/16] bg-gradient-to-b from-rose-50 via-white to-indigo-50 flex items-center justify-center">
                                    <div class="text-center px-8">
                                        <div class="text-sm font-semibold text-slate-800">Your Invitation</div>
                                        <div class="text-xs text-slate-500 mt-1">Tap “Explore templates” to see all</div>
                                        <div class="mt-6 h-40 rounded-xl bg-white shadow border border-slate-100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="absolute -bottom-5 left-1/2 -translate-x-1/2 rounded-full glass border border-white/60 px-4 py-2 text-xs text-slate-700">
                            Mobile optimized
                        </div>
                    </div>
                </div>
            </section>

            <section class="mt-16 reveal">
                <div class="flex items-end justify-between gap-4 mb-6">
                    <div>
                        <h2 class="text-2xl font-semibold">Featured templates</h2>
                        <p class="mt-2 text-slate-600">A quick peek. Tap any card to open details.</p>
                    </div>
                    <a href="/templates" class="text-sm font-semibold text-rose-700 hover:text-rose-800 underline underline-offset-4">View all</a>
                </div>

                <div class="flex gap-5 overflow-x-auto pb-3 snap-x snap-mandatory">
                    @foreach ($featuredTemplates as $t)
                        @php
                            $id = $t['id'] ?? null;
                            $img = $t['image'] ?? null;
                            $title = $t['title'] ?? '';
                        @endphp
                        <a href="{{ $id ? route('templates.show', ['id' => $id]) : '/templates' }}"
                           class="snap-start shrink-0 w-[200px] sm:w-[220px] group">
                            <div class="rounded-2xl border bg-white/80 hover:bg-white shadow-sm hover:shadow-lg transition overflow-hidden">
                                <div class="bg-slate-100 aspect-[3/5] overflow-hidden">
                                    @if ($img)
                                        <img src="{{ $img }}" alt="{{ $title }}" class="w-full h-full object-cover object-top transition duration-300 group-hover:scale-[1.03]">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-sm text-slate-500">No image</div>
                                    @endif
                                </div>
                                <div class="p-3">
                                    <div class="text-sm font-semibold line-clamp-2 min-h-[2.5rem]">{{ $title }}</div>
                                    <div class="mt-2 text-xs text-slate-500">Tap to open</div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>

            @if (false)
            <section id="how" class="mt-20">
                <div class="text-center">
                    <h2 class="text-2xl font-semibold">Ready in 30 Minutes</h2>
                    <p class="mt-2 text-slate-600">A simple flow your customers understand instantly.</p>
                </div>

                <div class="mt-10 grid md:grid-cols-3 gap-6">
                    <div class="reveal rounded-2xl bg-white/80 border border-white/60 shadow-sm p-6 hover:shadow-lg transition">
                        <div class="h-10 w-10 rounded-xl bg-rose-100 text-rose-700 flex items-center justify-center font-bold">1</div>
                        <div class="mt-4 font-semibold">Choose a template</div>
                        <div class="mt-2 text-sm text-slate-600">Pick a design that matches the event and vibe.</div>
                    </div>
                    <div class="reveal rounded-2xl bg-white/80 border border-white/60 shadow-sm p-6 hover:shadow-lg transition">
                        <div class="h-10 w-10 rounded-xl bg-fuchsia-100 text-fuchsia-700 flex items-center justify-center font-bold">2</div>
                        <div class="mt-4 font-semibold">Customize details</div>
                        <div class="mt-2 text-sm text-slate-600">Names, venue, date/time, and optional notes.</div>
                    </div>
                    <div class="reveal rounded-2xl bg-white/80 border border-white/60 shadow-sm p-6 hover:shadow-lg transition">
                        <div class="h-10 w-10 rounded-xl bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold">3</div>
                        <div class="mt-4 font-semibold">Share instantly</div>
                        <div class="mt-2 text-sm text-slate-600">Send on WhatsApp, Instagram, email, or anywhere.</div>
                    </div>
                </div>
            </section>

            <section id="features" class="mt-20">
                <div class="text-center">
                    <h2 class="text-2xl font-semibold">Everything You Need, Nothing You Don’t</h2>
                    <p class="mt-2 text-slate-600">Clean, fast, and focused on invitations.</p>
                </div>

                <div class="mt-10 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @php
                        $featureCards = [
                            ['title' => 'Beautiful animations', 'desc' => 'Modern motion and premium look.'],
                            ['title' => 'Mobile-first design', 'desc' => 'Perfect on phones and tablets.'],
                            ['title' => 'Quick sharing', 'desc' => 'Send the link anywhere.'],
                            ['title' => 'Multiple events', 'desc' => 'Wedding, engagement, baby shower, birthday, more.'],
                            ['title' => 'Template categories', 'desc' => 'Browse by tags and styles.'],
                            ['title' => 'Easy updates', 'desc' => 'Change details without re-sending images.'],
                        ];
                    @endphp

                    @foreach ($featureCards as $f)
                        <button type="button"
                                class="reveal text-left rounded-2xl bg-white/80 border border-white/60 shadow-sm p-6 hover:shadow-lg transition active:scale-[0.99]">
                            <div class="font-semibold flex items-center justify-between gap-3">
                                <span>{{ $f['title'] }}</span>
                                <span class="text-xs text-slate-500">Learn</span>
                            </div>
                            <div class="mt-2 text-sm text-slate-600">{{ $f['desc'] }}</div>
                        </button>
                    @endforeach
                </div>
            </section>

            <section id="testimonials" class="mt-20">
                <div class="text-center">
                    <h2 class="text-2xl font-semibold">Loved by Indian Families</h2>
                    <p class="mt-2 text-slate-600">A delightful experience for every celebration.</p>
                </div>

                <div class="mt-10 grid md:grid-cols-3 gap-6">
                    @php
                        $testimonials = [
                            ['name' => 'Amit', 'text' => 'Shared instantly on WhatsApp. Everyone loved the design.'],
                            ['name' => 'Priya', 'text' => 'Looks premium and works perfectly on mobile.'],
                            ['name' => 'Neha', 'text' => 'So many templates. We found the perfect style quickly.'],
                        ];
                    @endphp
                    @foreach ($testimonials as $t)
                        <div class="reveal rounded-2xl bg-white/80 border border-white/60 shadow-sm p-6 hover:shadow-lg transition">
                            <div class="text-sm text-slate-700 leading-relaxed">“{{ $t['text'] }}”</div>
                            <div class="mt-4 flex items-center justify-between text-xs text-slate-500">
                                <span>— {{ $t['name'] }}</span>
                                <span class="inline-flex items-center gap-1">
                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Verified
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
            @endif

            <section class="mt-20 reveal">
                <div class="text-center">
                    <h2 class="text-2xl font-semibold">FAQs</h2>
                    <p class="mt-2 text-slate-600">Tap a question to expand.</p>
                </div>

                <div class="mt-10 max-w-3xl mx-auto space-y-3">
                    @php
                        $faqs = [
                            ['q' => 'How do I choose a template?', 'a' => 'Open Templates, tap any design, then contact us on WhatsApp with the template link.'],
                            ['q' => 'Can I share on WhatsApp?', 'a' => 'Yes. The invitation is designed for mobile and link sharing.'],
                            ['q' => 'How fast can I get it?', 'a' => 'Usually within the same day, depending on your details and revision needs.'],
                        ];
                    @endphp
                    @foreach ($faqs as $i => $f)
                        <details class="group rounded-2xl border bg-white/80 hover:bg-white transition p-5">
                            <summary class="cursor-pointer list-none flex items-center justify-between gap-4">
                                <span class="font-semibold">{{ $f['q'] }}</span>
                                <span class="h-8 w-8 rounded-xl border bg-white flex items-center justify-center text-slate-600 group-open:rotate-45 transition">+</span>
                            </summary>
                            <div class="mt-3 text-sm text-slate-600 leading-relaxed">{{ $f['a'] }}</div>
                        </details>
                    @endforeach
                </div>
            </section>

            <section class="mt-20">
                <div class="rounded-3xl bg-gradient-to-r from-rose-700 via-fuchsia-700 to-indigo-700 text-white shadow-xl overflow-hidden">
                    <div class="px-8 py-10 sm:px-12 sm:py-12 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
                        <div>
                            <h2 class="text-2xl font-semibold">Your Celebration Deserves Something Special</h2>
                            <p class="mt-2 text-white/80">Browse templates and message us on WhatsApp with the link.</p>
                        </div>
                        <div class="flex gap-3">
                            <a href="/templates" class="inline-flex items-center justify-center rounded-full px-6 h-11 text-sm font-semibold bg-white text-slate-900 hover:bg-white/90">
                                Browse templates
                            </a>
                            <a href="/templates" class="inline-flex items-center justify-center rounded-full px-6 h-11 text-sm font-semibold border border-white/40 hover:bg-white/10">
                                Explore now
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mt-14">
                <div class="text-center text-xs text-slate-500">
                    © {{ date('Y') }} {{ config('app.name', 'CreateKankotri') }}. All rights reserved.
                </div>
            </section>
        </main>
    </div>

    <script>
        // Scroll-reveal
        const els = Array.from(document.querySelectorAll('.reveal'));
        const io = new IntersectionObserver((entries) => {
            for (const e of entries) {
                if (e.isIntersecting) e.target.classList.add('is-visible');
            }
        }, { threshold: 0.12 });
        els.forEach(el => io.observe(el));

        // Tiny count animation (templates)
        const countEl = document.querySelector('[data-count]');
        if (countEl) {
            const target = Number(countEl.getAttribute('data-count') || 0);
            const start = 0;
            const duration = 900;
            const t0 = performance.now();
            const tick = (t) => {
                const p = Math.min(1, (t - t0) / duration);
                const val = Math.round(start + (target - start) * (1 - Math.pow(1 - p, 3)));
                countEl.textContent = String(val);
                if (p < 1) requestAnimationFrame(tick);
            };
            requestAnimationFrame(tick);
        }
    </script>
</body>
</html>

