{{--
    Gallery Grid Component

    A responsive image grid for displaying gallery images.
    Supports lightbox-style viewing with Alpine.js.

    @props
        - images (array): Array of objects with 'src', 'alt', and optionally 'caption'.
        - columns (int): Number of columns on desktop. Default: 3.
--}}
@props([
    'images' => [],
    'columns' => 3,
])

@php
    $gridCols = match((int)$columns) {
        2 => 'md:grid-cols-2',
        3 => 'md:grid-cols-3',
        4 => 'md:grid-cols-4',
        default => 'md:grid-cols-3',
    };
@endphp

<div x-data="{ lightbox: false, currentImage: '', currentCaption: '' }" class="relative">
    {{-- Image Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 {{ $gridCols }} gap-4">
        @foreach($images as $image)
            <div class="relative group cursor-pointer overflow-hidden rounded-lg aspect-square"
                 @click="lightbox = true; currentImage = '{{ $image['src'] }}'; currentCaption = '{{ $image['caption'] ?? '' }}'">
                <img src="{{ $image['src'] }}"
                     alt="{{ $image['alt'] ?? '' }}"
                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                     loading="lazy">
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/30 transition-all duration-300 flex items-center justify-center">
                    <svg class="w-8 h-8 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607ZM10.5 7.5v6m3-3h-6" />
                    </svg>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Lightbox Overlay --}}
    <div x-show="lightbox"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         x-cloak
         @click.self="lightbox = false"
         @keydown.escape.window="lightbox = false"
         class="fixed inset-0 z-[60] bg-black/90 flex items-center justify-center p-4">
        <button @click="lightbox = false" class="absolute top-4 right-4 text-white hover:text-gold-accent transition-colors">
            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
        <div class="max-w-4xl max-h-[85vh]">
            <img :src="currentImage" :alt="currentCaption" class="max-w-full max-h-[80vh] object-contain rounded-lg">
            <p x-show="currentCaption" x-text="currentCaption" class="text-white text-center mt-3 text-sm"></p>
        </div>
    </div>
</div>
