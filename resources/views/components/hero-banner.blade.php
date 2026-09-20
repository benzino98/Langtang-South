{{--
    Hero Banner Component

    Two variants:
    - Full (homepage): Split layout. Left = content, Right = premium green panel.
    - Compact (inner pages): A full-width dark green header bar.

    @props
        - eyebrow (string, optional)
        - title (string)
        - subtitle (string, optional)
        - ctaText (string, optional)
        - ctaLink (string, optional)
        - secondaryCtaText (string, optional)
        - secondaryCtaLink (string, optional)
        - compact (boolean): true for inner page header, false (default) for homepage split layout.
--}}
@props([
    'eyebrow'            => 'LANGTANG SOUTH LOCAL GOVERNMENT COUNCIL',
    'title'              => 'Welcome to Langtang South',
    'subtitle'           => 'Serving the people of Langtang South with transparency, integrity, and dedication.',
    'ctaText'            => 'Learn More About Us',
    'ctaLink'            => '/about',
    'secondaryCtaText'   => 'Contact Us',
    'secondaryCtaLink'   => '/contact',
    'compact'            => false,
])

@if($compact)
{{-- ===================================================================== --}}
{{--  COMPACT VARIANT — Inner page header                                  --}}
{{-- ===================================================================== --}}
<section class="relative overflow-hidden" style="background: linear-gradient(135deg, #0A5C42 0%, #063B2A 60%, #0A5C42 100%);">
    {{-- Decorative blobs --}}
    <div class="absolute top-0 right-0 w-80 h-80 rounded-full opacity-10 pointer-events-none"
         style="background:#D4AF37; filter:blur(60px); transform:translate(30%, -30%);" aria-hidden="true"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 rounded-full opacity-8 pointer-events-none"
         style="background:#ffffff; filter:blur(60px); transform:translate(-30%, 30%);" aria-hidden="true"></div>
    {{-- Grid texture --}}
    <div class="absolute inset-0 pointer-events-none" aria-hidden="true"
         style="background-image:repeating-linear-gradient(0deg,rgba(255,255,255,0.04) 0px,rgba(255,255,255,0.04) 1px,transparent 1px,transparent 40px),repeating-linear-gradient(90deg,rgba(255,255,255,0.04) 0px,rgba(255,255,255,0.04) 1px,transparent 1px,transparent 40px);"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 md:py-20">
        @if($eyebrow)
            <div class="flex items-center gap-3 mb-4">
                <span class="block w-6 h-0.5" style="background:#D4AF37;"></span>
                <p class="text-xs font-extrabold tracking-widest uppercase" style="color:#D4AF37;">{{ $eyebrow }}</p>
            </div>
        @endif
        <h1 class="font-heading text-3xl sm:text-4xl md:text-5xl font-extrabold text-white leading-tight mb-4 max-w-3xl">
            {{ $title }}
        </h1>
        @if($subtitle)
            <p class="text-lg leading-relaxed max-w-2xl" style="color:rgba(209,250,229,0.85);">
                {{ $subtitle }}
            </p>
        @endif
    </div>
</section>

@else
{{-- ===================================================================== --}}
{{--  FULL VARIANT — Homepage split hero                                   --}}
{{-- ===================================================================== --}}
<section class="relative overflow-hidden bg-white border-b border-gray-100" style="min-height:600px;">
    <div class="flex flex-col lg:flex-row" style="min-height:600px;">

        {{-- ---- LEFT PANEL ---- --}}
        <div class="relative z-10 flex items-center w-full lg:w-[55%] bg-white">
            {{-- Slanted SVG edge (desktop only) --}}
            <svg class="absolute right-0 top-0 bottom-0 h-full hidden lg:block pointer-events-none" style="width:80px; z-index:20;" fill="white" viewBox="0 0 80 100" preserveAspectRatio="none" aria-hidden="true">
                <polygon points="0,0 80,0 20,100 0,100"/>
            </svg>

            <div class="w-full px-6 sm:px-10 lg:px-16 xl:px-20 py-20 md:py-28 lg:py-32 max-w-2xl mx-auto lg:mx-0">
                @if($eyebrow)
                    <div class="flex items-center gap-3 mb-6">
                        <span class="block w-8 h-0.5" style="background:#D4AF37;"></span>
                        <p class="text-xs font-extrabold tracking-widest text-primary-green uppercase">{{ $eyebrow }}</p>
                    </div>
                @endif

                <h1 class="font-heading font-extrabold text-gray-900 leading-tight tracking-tight mb-6" style="font-size:clamp(2.5rem,5vw,3.75rem);">
                    {{ $title }}
                </h1>

                @if($subtitle)
                    <p class="text-lg md:text-xl text-gray-600 leading-relaxed mb-10 max-w-lg">
                        {{ $subtitle }}
                    </p>
                @endif

                <div class="flex flex-wrap gap-4">
                    @if($ctaText)
                        <a href="{{ $ctaLink }}" class="btn-primary shadow-elevated hover:-translate-y-0.5 transition-transform duration-200 no-underline">
                            {{ $ctaText }}
                            <svg class="ml-2 w-4 h-4 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                            </svg>
                        </a>
                    @endif
                    @if($secondaryCtaText)
                        <a href="{{ $secondaryCtaLink }}" class="btn-secondary hover:-translate-y-0.5 transition-transform duration-200 no-underline">
                            {{ $secondaryCtaText }}
                        </a>
                    @endif
                </div>
            </div>
        </div>

        {{-- ---- RIGHT PANEL — Premium CSS graphic, no external images ---- --}}
        <div class="relative flex-1 overflow-hidden" style="min-height:320px;">
            {{-- Deep green gradient base --}}
            <div class="absolute inset-0" style="background:linear-gradient(135deg,#0D6B4D 0%,#063B2A 50%,#0A5040 100%);"></div>

            {{-- Decorative glowing blobs --}}
            <div class="absolute pointer-events-none"
                 style="top:0;right:0;width:400px;height:400px;border-radius:50%;background:#D4AF37;opacity:0.12;filter:blur(80px);transform:translate(35%,-35%);"></div>
            <div class="absolute pointer-events-none"
                 style="bottom:0;left:0;width:320px;height:320px;border-radius:50%;background:#ffffff;opacity:0.06;filter:blur(70px);transform:translate(-35%,35%);"></div>
            <div class="absolute pointer-events-none"
                 style="top:50%;left:50%;width:240px;height:240px;border-radius:50%;background:#1A8A62;opacity:0.15;filter:blur(50px);transform:translate(-50%,-50%);"></div>

            {{-- Subtle grid lines --}}
            <div class="absolute inset-0 pointer-events-none"
                 style="background-image:repeating-linear-gradient(0deg,rgba(255,255,255,0.04) 0px,rgba(255,255,255,0.04) 1px,transparent 1px,transparent 50px),repeating-linear-gradient(90deg,rgba(255,255,255,0.04) 0px,rgba(255,255,255,0.04) 1px,transparent 1px,transparent 50px);"></div>

            {{-- Central content --}}
            <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-10" style="z-index:10;">
                {{-- Concentric ring emblem --}}
                <div class="relative flex items-center justify-center mb-8" style="width:160px;height:160px;">
                    <div class="absolute inset-0 rounded-full" style="border:2px solid rgba(255,255,255,0.15);"></div>
                    <div class="absolute rounded-full" style="inset:16px;border:1px solid rgba(212,175,55,0.35);"></div>
                    <div class="rounded-full flex items-center justify-center" style="width:72px;height:72px;background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.2);">
                        <svg style="width:36px;height:36px;color:rgba(255,255,255,0.85);" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z"/>
                            <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z"/>
                        </svg>
                    </div>
                    {{-- Cardinal dots on ring --}}
                    <div class="absolute rounded-full" style="width:8px;height:8px;background:#D4AF37;opacity:0.7;top:8px;left:50%;transform:translateX(-50%);"></div>
                    <div class="absolute rounded-full" style="width:8px;height:8px;background:#D4AF37;opacity:0.7;bottom:8px;left:50%;transform:translateX(-50%);"></div>
                    <div class="absolute rounded-full" style="width:8px;height:8px;background:#D4AF37;opacity:0.7;left:8px;top:50%;transform:translateY(-50%);"></div>
                    <div class="absolute rounded-full" style="width:8px;height:8px;background:#D4AF37;opacity:0.7;right:8px;top:50%;transform:translateY(-50%);"></div>
                </div>

                <p class="font-heading font-extrabold text-xl tracking-wide mb-1" style="color:rgba(255,255,255,0.92);">Langtang South</p>
                <p class="text-xs tracking-widest uppercase font-medium mb-6" style="color:rgba(255,255,255,0.5);">Local Government Council</p>

                <div class="flex items-center gap-3 mb-8">
                    <span style="width:40px;height:1px;background:rgba(212,175,55,0.45);display:block;"></span>
                    <span class="text-xs tracking-widest uppercase font-bold" style="color:rgba(212,175,55,0.7);">Plateau State</span>
                    <span style="width:40px;height:1px;background:rgba(212,175,55,0.45);display:block;"></span>
                </div>

                {{-- Stats --}}
                <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:0;width:260px;border:1px solid rgba(255,255,255,0.1);border-radius:12px;overflow:hidden;">
                    <div style="text-align:center;padding:14px 8px;border-right:1px solid rgba(255,255,255,0.1);">
                        <p class="font-heading font-extrabold text-2xl" style="color:white;">11</p>
                        <p class="text-xs uppercase tracking-wider mt-1" style="color:rgba(255,255,255,0.45);">Wards</p>
                    </div>
                    <div style="text-align:center;padding:14px 8px;border-right:1px solid rgba(255,255,255,0.1);">
                        <p class="font-heading font-extrabold text-2xl" style="color:white;">9</p>
                        <p class="text-xs uppercase tracking-wider mt-1" style="color:rgba(255,255,255,0.45);">Depts</p>
                    </div>
                    <div style="text-align:center;padding:14px 8px;">
                        <p class="font-heading font-extrabold text-2xl" style="color:#D4AF37;">2026</p>
                        <p class="text-xs uppercase tracking-wider mt-1" style="color:rgba(255,255,255,0.45);">Term</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endif
