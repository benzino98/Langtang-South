{{--
    Card Component

    A versatile card component for displaying content like news articles,
    projects, quick links, and department summaries.

    @props
        - image (string, optional): URL for the card's featured image.
        - title (string): The card title.
        - subtitle (string, optional): A secondary heading (e.g., date, category).
        - href (string, optional): URL to link the card to.
        - badge (string, optional): A status badge (e.g., "Ongoing", "Completed").
        - badgeColor (string, optional): Tailwind color class for the badge.
--}}
@props([
    'image' => '',
    'title' => '',
    'subtitle' => '',
    'href' => '',
    'badge' => '',
    'badgeColor' => 'bg-primary-green',
])

<div {{ $attributes->merge(['class' => 'bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 overflow-hidden group']) }}>
    {{-- Card Image --}}
    @if($image)
        <div class="relative overflow-hidden aspect-video">
            <img src="{{ $image }}" alt="{{ $title }}"
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                 loading="lazy">
            @if($badge)
                <span class="absolute top-3 right-3 {{ $badgeColor }} text-white text-xs font-semibold px-3 py-1 rounded-full">
                    {{ $badge }}
                </span>
            @endif
        </div>
    @endif

    {{-- Card Body --}}
    <div class="p-5">
        @if($subtitle)
            <p class="text-xs text-gray-500 font-medium uppercase tracking-wider mb-1">{{ $subtitle }}</p>
        @endif
        <h3 class="font-heading font-semibold text-gray-900 group-hover:text-primary-green transition-colors duration-200 mb-2">
            @if($href)
                <a href="{{ $href }}" class="hover:underline">{{ $title }}</a>
            @else
                {{ $title }}
            @endif
        </h3>

        {{-- Slot for additional content (e.g., description, read more link) --}}
        {{ $slot }}
    </div>
</div>
