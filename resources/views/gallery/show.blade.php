<x-public-layout
    :title="$album->title . ' | Gallery | Langtang South Area Council'"
    :meta-description="\Illuminate\Support\Str::limit(strip_tags($album->description ?? ''), 160)"
    :og-title="$album->title"
    :og-image="$album->cover_image ? asset('storage/' . $album->cover_image) : null"
>
    {{-- Album Header --}}
    <section class="bg-primary-green relative overflow-hidden py-16 sm:py-20">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-gold-accent rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
        </div>
        <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="flex items-center justify-center space-x-2 mb-4 text-sm text-green-100">
                <span class="text-gold-accent font-semibold">Photo Gallery</span>
                <span class="text-green-300">•</span>
                <span>{{ $album->images_count }} photos</span>
            </div>
            <h1 class="font-heading text-3xl md:text-5xl font-bold text-white leading-tight">
                {{ $album->title }}
            </h1>
            @if($album->description)
                <p class="mt-4 text-green-100 max-w-2xl mx-auto">{{ $album->description }}</p>
            @endif
        </div>
    </section>

    {{-- Gallery Grid --}}
    <div class="py-12 bg-light-gray min-h-[60vh]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @forelse($album->images as $image)
                    <a href="{{ asset('storage/' . $image->image_path) }}"
                       target="_blank"
                       class="group relative aspect-square overflow-hidden rounded-lg bg-gray-100">
                        <img src="{{ asset('storage/' . $image->image_path) }}"
                             alt="{{ $image->caption ?? $album->title }}"
                             loading="lazy"
                             width="400"
                             height="400"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @if($image->caption)
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                                <p class="p-3 text-xs text-white font-medium">{{ $image->caption }}</p>
                            </div>
                        @endif
                    </a>
                @empty
                    <div class="col-span-full bg-white rounded-xl shadow-sm p-12 text-center">
                        <p class="text-gray-500">No photos have been added to this album yet.</p>
                    </div>
                @endforelse
            </div>

            {{-- Back Link --}}
            <div class="mt-10">
                <a href="{{ route('gallery.index') }}" class="inline-flex items-center text-sm font-semibold text-primary-green hover:underline">
                    <svg class="mr-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>
                    Back to Gallery
                </a>
            </div>
        </div>
    </div>
</x-public-layout>
