{{--
    Notice Bar Component

    A modern civic announcement component for displaying important notices.
    Designed to sit below the hero section or header.

    @props
        - title (string): The title of the notice.
        - description (string): The notice content.
        - link (string, optional): URL for a "View Notice / Download Attachment" link.
        - isImportant (boolean, optional): Whether this is a high-priority alert.
--}}
@props([
    'title',
    'description',
    'link' => null,
    'isImportant' => false,
])

@php
    $bgClass = $isImportant ? 'bg-red-50 border-red-200' : 'bg-gold-accent-light/20 border-gold-accent/30';
    $iconClass = $isImportant ? 'text-red-600 bg-red-100' : 'text-gold-accent-dark bg-white';
    $titleClass = $isImportant ? 'text-red-800' : 'text-gray-900';
    $descClass = $isImportant ? 'text-red-700' : 'text-gray-700';
    $badgeText = $isImportant ? 'Important Alert' : 'Notice';
@endphp

<section class="border-y {{ $bgClass }} transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex flex-col sm:flex-row items-center sm:items-start gap-4 text-sm sm:text-base">
            <div class="flex-shrink-0 flex items-center justify-center p-2 rounded-full {{ $iconClass }} shadow-sm">
                @if($isImportant)
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                @else
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                    </svg>
                @endif
            </div>
            <div class="flex-1 text-center sm:text-left flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-2">
                <span class="font-bold uppercase tracking-wider text-xs px-2 py-0.5 rounded {{ $isImportant ? 'bg-red-600 text-white' : 'bg-primary-green text-white' }} shrink-0 w-fit mx-auto sm:mx-0">
                    {{ $badgeText }}
                </span>
                <p class="font-medium {{ $titleClass }} leading-relaxed">
                    <span class="font-bold">{{ $title }}:</span>
                    <span class="{{ $descClass }} ml-1">{{ Str::limit($description, 120) }}</span>
                </p>
                @if($link)
                    <a href="{{ $link }}" class="font-bold underline hover:text-primary-green transition-colors whitespace-nowrap sm:ml-auto mt-2 sm:mt-0 text-primary-green-dark inline-flex items-center">
                        View Details
                        <svg class="ml-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                @endif
            </div>
        </div>
    </div>
</section>
