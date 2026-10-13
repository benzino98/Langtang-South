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
                <div class="lg:col-span-3 space-y-8">
                    @if($articles->currentPage() == 1 && !request('search') && !request('category') && $articles->isNotEmpty())
                        @php $featured = $articles->first(); @endphp
                        {{-- Editorial Featured Story --}}
                        <div class="card overflow-hidden group">
                            <div class="md:grid md:grid-cols-12 gap-0">
                                <div class="md:col-span-7 aspect-[16/10] md:aspect-auto overflow-hidden bg-gray-100 relative">
                                    <img src="{{ $featured->featured_image ? asset('storage/' . $featured->featured_image) : 'https://images.unsplash.com/photo-1541872703-74c5e44368f9?q=80&w=800&auto=format&fit=crop' }}"
                                         alt="{{ $featured->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                    <div class="absolute top-4 left-4 bg-gold-accent text-gray-900 text-xs font-bold px-3 py-1.5 rounded-full uppercase tracking-wider shadow-sm">
                                        Featured Story
                                    </div>
                                </div>
                                <div class="md:col-span-5 p-6 sm:p-8 flex flex-col justify-between">
                                    <div>
                                        <div class="flex items-center space-x-2 text-xs text-gray-500 mb-3">
                                            @if($featured->category)
                                                <span class="font-bold text-primary-green uppercase tracking-wider">{{ $featured->category->name }}</span>
                                                <span>•</span>
                                            @endif
                                            <span>{{ $featured->published_at ? $featured->published_at->format('M d, Y') : $featured->created_at->format('M d, Y') }}</span>
                                        </div>
                                        <h2 class="font-heading text-2xl font-extrabold text-gray-900 group-hover:text-primary-green transition-colors duration-200 mb-4 line-clamp-3">
                                            <a href="{{ route('news.show', $featured->slug) }}">
                                                {{ $featured->title }}
                                            </a>
                                        </h2>
                                        <p class="text-sm text-gray-600 line-clamp-4 leading-relaxed mb-6">
                                            {{ $featured->summary }}
                                        </p>
                                    </div>
                                    <a href="{{ route('news.show', $featured->slug) }}" class="btn-primary self-start inline-flex items-center text-xs uppercase tracking-wider font-bold">
                                        Read Full Story
                                        <svg class="ml-2 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- Remaining articles grid --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach($articles->skip(1) as $article)
                                <div class="card p-6 flex flex-col justify-between group">
                                    <div>
                                        <div class="aspect-[16/9] rounded-xl overflow-hidden mb-5 bg-gray-100 relative">
                                            <img src="{{ $article->featured_image ? asset('storage/' . $article->featured_image) : 'https://images.unsplash.com/photo-1541872703-74c5e44368f9?q=80&w=600&auto=format&fit=crop' }}"
                                                 alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                            @if($article->category)
                                                <span class="absolute top-3 left-3 bg-white/90 backdrop-blur-md text-primary-green text-xs font-bold px-2.5 py-1 rounded-md uppercase tracking-wider shadow-xs">
                                                    {{ $article->category->name }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="text-xs text-gray-400 mb-2 font-medium">
                                            {{ $article->published_at ? $article->published_at->format('M d, Y') : $article->created_at->format('M d, Y') }}
                                        </div>
                                        <h3 class="font-heading font-extrabold text-lg text-gray-900 mb-3 group-hover:text-primary-green transition-colors duration-200 line-clamp-2">
                                            <a href="{{ route('news.show', $article->slug) }}">
                                                {{ $article->title }}
                                            </a>
                                        </h3>
                                        <p class="text-sm text-gray-600 mb-6 line-clamp-3 leading-relaxed">
                                            {{ $article->summary }}
                                        </p>
                                    </div>
                                    <a href="{{ route('news.show', $article->slug) }}" class="inline-flex items-center text-sm font-bold text-primary-green group-hover:translate-x-1 transition-transform duration-200">
                                        Read Article
                                        <svg class="ml-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                        </svg>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @forelse($articles as $article)
                                <div class="card p-6 flex flex-col justify-between group">
                                    <div>
                                        <div class="aspect-[16/9] rounded-xl overflow-hidden mb-5 bg-gray-100 relative">
                                            <img src="{{ $article->featured_image ? asset('storage/' . $article->featured_image) : 'https://images.unsplash.com/photo-1541872703-74c5e44368f9?q=80&w=600&auto=format&fit=crop' }}"
                                                 alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                            @if($article->category)
                                                <span class="absolute top-3 left-3 bg-white/90 backdrop-blur-md text-primary-green text-xs font-bold px-2.5 py-1 rounded-md uppercase tracking-wider shadow-xs">
                                                    {{ $article->category->name }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="text-xs text-gray-400 mb-2 font-medium">
                                            {{ $article->published_at ? $article->published_at->format('M d, Y') : $article->created_at->format('M d, Y') }}
                                        </div>
                                        <h3 class="font-heading font-extrabold text-lg text-gray-900 mb-3 group-hover:text-primary-green transition-colors duration-200 line-clamp-2">
                                            <a href="{{ route('news.show', $article->slug) }}">
                                                {{ $article->title }}
                                            </a>
                                        </h3>
                                        <p class="text-sm text-gray-600 mb-6 line-clamp-3 leading-relaxed">
                                            {{ $article->summary }}
                                        </p>
                                    </div>
                                    <a href="{{ route('news.show', $article->slug) }}" class="inline-flex items-center text-sm font-bold text-primary-green group-hover:translate-x-1 transition-transform duration-200">
                                        Read Article
                                        <svg class="ml-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                        </svg>
                                    </a>
                                </div>
                            @empty
                                <div class="col-span-full card p-12 text-center">
                                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-400">
                                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                        </svg>
                                    </div>
                                    <h3 class="font-heading font-bold text-gray-900 text-lg mb-1">No News Articles Found</h3>
                                    <p class="text-sm text-gray-500">Your search or filter did not match any articles. Try a different search term or category.</p>
                                </div>
                            @endforelse
                        </div>
                    @endif

                    {{-- Pagination --}}
                    <div class="mt-8">
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
