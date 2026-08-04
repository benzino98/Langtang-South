{{--
    Hero Banner Component

    A full-width hero section with background image overlay,
    title, subtitle, and optional call-to-action button.

    @props
        - title (string): The main heading text.
        - subtitle (string): A brief description or welcome message.
        - backgroundImage (string, optional): URL for the background image.
        - ctaText (string, optional): Text for the call-to-action button.
        - ctaLink (string, optional): URL for the call-to-action button.
--}}
@props([
    'title' => 'Welcome to Langtang Council',
    'subtitle' => '',
    'backgroundImage' => '',
    'ctaText' => '',
    'ctaLink' => '#',
])

<section class="relative bg-primary-green overflow-hidden">
    {{-- Background Image Overlay --}}
    @if($backgroundImage)
        <div class="absolute inset-0">
            <img src="{{ $backgroundImage }}" alt="" class="w-full h-full object-cover opacity-20">
        </div>
    @else
        {{-- Decorative pattern when no background image --}}
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-gold-accent rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-72 h-72 bg-white rounded-full translate-y-1/2 -translate-x-1/2 blur-3xl"></div>
        </div>
    @endif

    {{-- Content --}}
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-32">
        <div class="max-w-3xl">
            <h1 class="font-heading text-3xl md:text-5xl font-bold text-white leading-tight mb-4">
                {{ $title }}
            </h1>
            @if($subtitle)
                <p class="text-lg md:text-xl text-green-100 leading-relaxed mb-8">
                    {{ $subtitle }}
                </p>
            @endif
            @if($ctaText)
                <a href="{{ $ctaLink }}"
                   class="inline-flex items-center px-6 py-3 bg-gold-accent text-white font-semibold rounded-lg
                          hover:bg-yellow-600 transition-all duration-300 shadow-lg hover:shadow-xl
                          transform hover:-translate-y-0.5">
                    {{ $ctaText }}
                    <svg class="ml-2 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            @endif
        </div>
    </div>
</section>
