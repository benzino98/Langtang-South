<x-public-layout>
    {{-- Article Header --}}
    <section class="bg-primary-green relative overflow-hidden py-16 sm:py-20">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-gold-accent rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
        </div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="flex items-center justify-center space-x-2 mb-4 text-sm">
                @if($article->category)
                    <a href="{{ route('news.index', ['category' => $article->category->slug]) }}" class="text-gold-accent font-semibold hover:underline">
                        {{ $article->category->name }}
                    </a>
                    <span class="text-green-300">•</span>
                @endif
                <span class="text-green-100">{{ $article->published_at ? $article->published_at->format('F d, Y') : $article->created_at->format('F d, Y') }}</span>
            </div>
            <h1 class="font-heading text-3xl md:text-5xl font-bold text-white leading-tight">
                {{ $article->title }}
            </h1>
        </div>
    </section>

    {{-- Article Content --}}
    <div class="py-12 bg-light-gray min-h-[60vh]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <article class="bg-white rounded-xl shadow-sm overflow-hidden">
                {{-- Featured Image --}}
                @if($article->featured_image)
                    <div class="aspect-video w-full">
                        <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                    </div>
                @endif

                <div class="p-6 sm:p-10">
                    {{-- Summary --}}
                    <div class="text-lg font-medium leading-relaxed text-gray-700 border-l-4 border-gold-accent pl-4 mb-8 italic">
                        {{ $article->summary }}
                    </div>

                    {{-- Article Body --}}
                    <div class="prose prose-green max-w-none text-gray-600 leading-relaxed">
                        {!! nl2br(e($article->body)) !!}
                    </div>

                    {{-- Author / Social Actions --}}
                    <div class="mt-10 pt-6 border-t border-gray-200 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold mb-1">Published By</p>
                            <p class="text-sm font-bold text-gray-900">{{ $article->author ? $article->author->name : 'Langtang Council Information Unit' }}</p>
                        </div>
                        <a href="{{ route('news.index') }}" class="inline-flex items-center text-sm font-semibold text-primary-green hover:underline">
                            <svg class="mr-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                            </svg>
                            Back to News
                        </a>
                    </div>
                </div>
            </article>

            {{-- Related Articles --}}
            @if($relatedArticles->isNotEmpty())
                <section class="mt-12">
                    <h2 class="font-heading text-2xl font-bold text-gray-900 mb-6">Related Articles</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                        @foreach($relatedArticles as $related)
                            <x-card :title="$related->title"
                                    :subtitle="$related->published_at ? $related->published_at->format('M d, Y') : $related->created_at->format('M d, Y')"
                                    :href="route('news.show', $related->slug)">
                                <a href="{{ route('news.show', $related->slug) }}" class="text-sm font-semibold text-primary-green hover:underline">Read More →</a>
                            </x-card>
                        @endforeach
                    </div>
                </section>
            @endif
        </div>
    </div>
</x-public-layout>
