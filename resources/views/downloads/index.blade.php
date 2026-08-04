<x-public-layout>
    {{-- Page Header --}}
    <x-hero-banner
        title="Downloads"
        subtitle="Access official documents, forms, gazettes, and publications from the Langtang Local Government Council."
    />

    <div class="py-12 bg-light-gray min-h-[60vh]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-4 lg:gap-8">
                {{-- Sidebar: Search & Categories --}}
                <div class="mb-8 lg:mb-0 lg:col-span-1">
                    <div class="sticky top-24 space-y-6">
                        {{-- Search Form --}}
                        <div class="bg-white rounded-xl shadow-sm p-4">
                            <h3 class="font-heading font-semibold text-gray-900 mb-3">Search Downloads</h3>
                            <form action="{{ route('downloads.index') }}" method="GET">
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
                                <a href="{{ route('downloads.index') }}"
                                   class="flex justify-between items-center px-3 py-2 rounded-lg text-sm font-medium {{ !request('category') ? 'bg-primary-green/10 text-primary-green' : 'text-gray-700 hover:bg-green-50 hover:text-primary-green' }}">
                                    <span>All Documents</span>
                                    <span class="text-xs font-bold">{{ $documents->total() }}</span>
                                </a>
                                @foreach($categories as $category)
                                    <a href="{{ route('downloads.index', ['category' => $category->slug]) }}"
                                       class="flex justify-between items-center px-3 py-2 rounded-lg text-sm font-medium {{ request('category') == $category->slug ? 'bg-primary-green/10 text-primary-green' : 'text-gray-700 hover:bg-green-50 hover:text-primary-green' }}">
                                        <span>{{ $category->name }}</span>
                                        <span class="text-xs font-bold">{{ $category->documents_count }}</span>
                                    </a>
                                @endforeach
                            </nav>
                        </div>
                    </div>
                </div>

                {{-- Main Content: Documents List --}}
                <div class="lg:col-span-3">
                    <div class="space-y-4">
                        @forelse($documents as $document)
                            <div class="bg-white rounded-xl shadow-sm p-4 sm:p-5 flex items-start sm:items-center justify-between gap-4 hover:shadow-md transition-shadow duration-200">
                                <div class="flex-grow">
                                    <div class="flex items-center space-x-2 mb-1.5">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-primary-green/10 text-primary-green text-xs font-bold uppercase tracking-wider">
                                            {{ $document->category->name }}
                                        </span>
                                    </div>
                                    <h2 class="font-heading font-semibold text-gray-900 mb-1">{{ $document->title }}</h2>
                                    <p class="text-xs text-gray-500 line-clamp-1">{{ $document->description }}</p>
                                </div>
                                <a href="{{ route('downloads.download', $document) }}" class="flex-shrink-0 inline-flex items-center space-x-2 px-4 py-2.5 rounded-lg bg-gold-accent text-white font-semibold text-sm hover:bg-gold-accent/90 transition-colors duration-200">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                    </svg>
                                    <span>Download ({{ \App\Helpers\NumberHelper::formatBytes($document->file_size) }})</span>
                                </a>
                            </div>
                        @empty
                            <div class="bg-white rounded-xl shadow-sm p-12 text-center">
                                <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                </svg>
                                <h3 class="font-heading font-semibold text-gray-900 text-lg mb-1">No Documents Found</h3>
                                <p class="text-gray-500">Your search or filter did not match any documents.</p>
                            </div>
                        @endforelse
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-8">
                        {{ $documents->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
