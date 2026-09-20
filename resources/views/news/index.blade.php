<x-public-layout>
    {{-- Page Header --}}
    <x-hero-banner
        :compact="true"
        eyebrow="LANGTANG SOUTH LOCAL GOVERNMENT COUNCIL"
        title="News & Updates"
        subtitle="The latest news, stories, and developments from Langtang South Local Government Council."
    />

    <div class="py-12 bg-light-gray min-h-[60vh]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-4 lg:gap-8">
                {{-- Sidebar: Search & Categories --}}
                <div class="mb-8 lg:mb-0 lg:col-span-1">
                    <div class="sticky top-24 space-y-6">
                        {{-- Search Form --}}
                        <div class="bg-white rounded-xl shadow-sm p-4">
                            <h3 class="font-heading font-semibold text-gray-900 mb-3">Search News</h3>
                            <form action="{{ route('news.index') }}" method="GET">
                                <div class="relative">
                                    <input type="text" name="search"
                                           value="{{ request('search') }}"
                                           placeholder="Type and press enter..."
                                           class="w-full rounded-lg border-gray-300 shadow-sm pr-10 focus:border-primary-green focus:ring-primary-green text-sm transition-colors duration-200"
                                    >
                                    <button type="submit" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-primary-green">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>

                        {{-- Categories List --}}
                        <div class="bg-white rounded-xl shadow-sm p-4">
                            <h3 class="font-heading font-semibold text-gray-900 mb-3">Categories</h3>
                            <nav class="space-y-1">
                                <a href="{{ route('news.index') }}"
                                   class="flex justify-between items-center px-3 py-2 rounded-lg text-sm font-medium {{ !request('category') ? 'bg-primary-green/10 text-primary-green' : 'text-gray-700 hover:bg-green-50 hover:text-primary-green' }}">
                                    <span>All Articles</span>
                                    <span class="text-xs font-bold">{{ $articles->total() }}</span>
                                </a>
                                @foreach($categories as $category)
                                    <a href="{{ route('news.index', ['category' => $category->slug]) }}"
                                       class="flex justify-between items-center px-3 py-2 rounded-lg text-sm font-medium {{ request('category') == $category->slug ? 'bg-primary-green/10 text-primary-green' : 'text-gray-700 hover:bg-green-50 hover:text-primary-green' }}">
                                        <span>{{ $category->name }}</span>
                                        <span class="text-xs font-bold">{{ $category->articles_count }}</span>
                                    </a>
                                @endforeach
                            </nav>
                        </div>
                    </div>
                </div>

                {{-- Main Content: News Articles --}}
                <div class="lg:col-span-3">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @forelse($articles as $article)
                            <x-card :title="$article->title"
                                    :subtitle="($article->category ? $article->category->name : 'News') . ' · ' . ($article->published_at ? $article->published_at->format('M d, Y') : $article->created_at->format('M d, Y'))"
                                    :href="route('news.show', $article->slug)"
                                    :image="$article->featured_image ? asset('storage/' . $article->featured_image) : 'https://images.unsplash.com/photo-1541872703-74c5e44368f9?q=80&w=600&auto=format&fit=crop'">
                                <p class="text-sm text-gray-500 mb-4 line-clamp-3">
                                    {{ $article->summary }}
                                </p>
                                <a href="{{ route('news.show', $article->slug) }}" class="inline-flex items-center text-sm font-semibold text-primary-green hover:underline">
                                    Read More
                                    <svg class="ml-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </a>
                            </x-card>
                        @empty
                            <div class="col-span-full bg-white rounded-xl shadow-sm p-12 text-center">
                                <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                                <h3 class="font-heading font-semibold text-gray-900 text-lg mb-1">No News Articles Found</h3>
                                <p class="text-gray-500">Your search or filter did not match any articles. Try a different search term or category.</p>
                            </div>
                        @endforelse
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-8">
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
