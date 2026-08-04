<x-public-layout title="Search Results | Langtang South Area Council">
    {{-- Page Header --}}
    <section class="bg-primary-green relative overflow-hidden py-16 sm:py-20">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-gold-accent rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
        </div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="font-heading text-3xl sm:text-4xl font-bold text-white">
                Search Results
            </h1>
            <p class="mt-4 text-lg text-green-100">
                @if ($query)
                    Showing results for "{{ $query }}"
                @else
                    Search the Langtang South Area Council website
                @endif
            </p>
        </div>
    </section>

    {{-- Search Form --}}
    <section class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="{{ route('search') }}" method="GET" class="flex items-center gap-3">
                <div class="flex-1">
                    <input type="search" name="q" value="{{ $query }}" placeholder="Search news, projects, departments, documents..."
                           class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-green focus:ring-primary-green"
                           aria-label="Search">
                </div>
                <button type="submit" class="btn-primary">
                    Search
                </button>
            </form>

            {{-- Results Summary --}}
            <div class="mt-8 mb-6">
                @if ($query && strlen(trim($query)) >= 2)
                    <p class="text-sm text-gray-600">
                        Found <span class="font-semibold text-primary-green">{{ $total }}</span> result(s) for
                        <span class="font-semibold">"{{ $query }}"</span>
                    </p>
                @elseif ($query)
                    <p class="text-sm text-gray-600">
                        Please enter at least 2 characters to search.
                    </p>
                @endif
            </div>

            {{-- Results List --}}
            <div class="space-y-4">
                @forelse ($results as $result)
                    <a href="{{ $result['url'] }}" class="block bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow duration-200 overflow-hidden">
                        <div class="flex items-start p-5">
                            @if ($result['image'])
                                <img src="{{ $result['image'] }}" alt="{{ $result['title'] }}" class="w-20 h-20 rounded-lg object-cover flex-shrink-0">
                            @else
                                <div class="w-20 h-20 rounded-lg bg-green-50 flex items-center justify-center flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-primary-green">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                    </svg>
                                </div>
                            @endif
                            <div class="ml-4">
                                <div class="flex items-center space-x-2 mb-1">
                                    <span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-primary-green/10 text-primary-green uppercase tracking-wide">
                                        {{ $result['type'] }}
                                    </span>
                                    @if ($result['date'])
                                        <span class="text-xs text-gray-500">{{ $result['date'] }}</span>
                                    @endif
                                </div>
                                <h2 class="font-heading font-semibold text-gray-900 hover:text-primary-green">
                                    {{ $result['title'] }}
                                </h2>
                            </div>
                        </div>
                    </a>
                @empty
                    @if ($query && strlen(trim($query)) >= 2)
                        <div class="bg-white rounded-xl shadow-sm p-10 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 mx-auto text-gray-300">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                            <h2 class="mt-4 font-heading text-lg font-semibold text-gray-900">No results found</h2>
                            <p class="mt-2 text-sm text-gray-600">
                                Try different keywords or browse the site sections.
                            </p>
                        </div>
                    @endif
                @endforelse
            </div>
        </div>
    </section>
</x-public-layout>
