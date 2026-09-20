<x-public-layout>
    {{-- Page Header --}}
    <x-hero-banner
        :compact="true"
        eyebrow="LANGTANG SOUTH LOCAL GOVERNMENT COUNCIL"
        title="Council Projects"
        subtitle="Explore our ongoing, completed, and planned projects across all communities in Langtang South."
    />

    <div class="py-12 bg-light-gray min-h-[60vh]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Filter Bar --}}
            <div class="bg-white rounded-xl shadow-sm p-4 mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
                {{-- Status Filter Tabs --}}
                <div class="flex items-center space-x-2 overflow-x-auto pb-2 md:pb-0">
                    @php
                        $currentStatus = request('status');
                    @endphp
                    <a href="{{ route('projects.index', request()->except('status')) }}"
                       class="px-4 py-2 rounded-lg text-sm font-semibold whitespace-nowrap transition-colors duration-200
                              {{ !$currentStatus ? 'bg-primary-green text-white' : 'text-gray-600 bg-gray-100 hover:bg-gray-200' }}">
                        All Projects
                    </a>
                    <a href="{{ route('projects.index', array_merge(request()->query(), ['status' => 'completed'])) }}"
                       class="px-4 py-2 rounded-lg text-sm font-semibold whitespace-nowrap transition-colors duration-200
                              {{ $currentStatus == 'completed' ? 'bg-primary-green text-white' : 'text-gray-600 bg-gray-100 hover:bg-gray-200' }}">
                        Completed
                    </a>
                    <a href="{{ route('projects.index', array_merge(request()->query(), ['status' => 'ongoing'])) }}"
                       class="px-4 py-2 rounded-lg text-sm font-semibold whitespace-nowrap transition-colors duration-200
                              {{ $currentStatus == 'ongoing' ? 'bg-primary-green text-white' : 'text-gray-600 bg-gray-100 hover:bg-gray-200' }}">
                        Ongoing
                    </a>
                    <a href="{{ route('projects.index', array_merge(request()->query(), ['status' => 'planned'])) }}"
                       class="px-4 py-2 rounded-lg text-sm font-semibold whitespace-nowrap transition-colors duration-200
                              {{ $currentStatus == 'planned' ? 'bg-primary-green text-white' : 'text-gray-600 bg-gray-100 hover:bg-gray-200' }}">
                        Planned
                    </a>
                </div>

                {{-- Search Form --}}
                <form action="{{ route('projects.index') }}" method="GET" class="w-full md:w-80">
                    @if(request('status'))
                        <input type="hidden" name="status" value="{{ request('status') }}">
                    @endif
                    <div class="relative">
                        <input type="text" name="search"
                               value="{{ request('search') }}"
                               placeholder="Search projects..."
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

            {{-- Projects Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($projects as $project)
                    @php
                        $badgeClasses = [
                            'completed' => 'bg-emerald-100 text-emerald-800 border-emerald-200',
                            'ongoing'   => 'bg-amber-100 text-amber-800 border-amber-200',
                            'planned'   => 'bg-blue-100 text-blue-800 border-blue-200',
                        ];
                        $badgeClass = $badgeClasses[$project->status] ?? 'bg-gray-100 text-gray-800 border-gray-200';
                    @endphp
                    <div class="card overflow-hidden flex flex-col justify-between group">
                        <div>
                            {{-- Image Container (16:9 Aspect Ratio) --}}
                            <div class="aspect-[16/9] w-full overflow-hidden bg-gray-100 relative">
                                <img src="{{ $project->featured_image ? asset('storage/' . $project->featured_image) : 'https://images.unsplash.com/photo-1541882703-74c5e44368f9?q=80&w=600&auto=format&fit=crop' }}"
                                     alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute top-3 right-3">
                                    <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider border backdrop-blur-md shadow-xs {{ $badgeClass }}">
                                        {{ ucfirst($project->status) }}
                                    </span>
                                </div>
                            </div>

                            <div class="p-6">
                                @if($project->community_ward)
                                    <div class="text-xs font-semibold text-gold-accent-dark uppercase tracking-wider mb-2 flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                        </svg>
                                        {{ $project->community_ward }}
                                    </div>
                                @endif
                                <h3 class="font-heading font-extrabold text-lg text-gray-900 mb-3 group-hover:text-primary-green transition-colors duration-200 line-clamp-2">
                                    <a href="{{ route('projects.show', $project->slug) }}">
                                        {{ $project->title }}
                                    </a>
                                </h3>
                                <p class="text-sm text-gray-600 line-clamp-3 leading-relaxed mb-4">
                                    {{ $project->description }}
                                </p>
                            </div>
                        </div>

                        <div class="px-6 pb-6 pt-0 border-t border-gray-100/50 flex items-center justify-between">
                            <a href="{{ route('projects.show', $project->slug) }}" class="inline-flex items-center text-sm font-bold text-primary-green group-hover:translate-x-1 transition-transform duration-200">
                                View Details
                                <svg class="ml-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full card p-12 text-center">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-400">
                            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 0 1 2.008 1.24l.885 1.77a2.25 2.25 0 0 0 2.007 1.24h1.98a2.25 2.25 0 0 0 2.007-1.24l.885-1.77a2.25 2.25 0 0 1 2.007-1.24h3.86m-18 0h18" />
                            </svg>
                        </div>
                        <h3 class="font-heading font-bold text-gray-900 text-lg mb-1">No Projects Found</h3>
                        <p class="text-sm text-gray-500">There are no projects matching your search filter.</p>
                    </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div class="mt-8">
                {{ $projects->links() }}
            </div>
        </div>
    </div>
</x-public-layout>
