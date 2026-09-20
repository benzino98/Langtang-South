<x-public-layout>
    {{-- Page Header --}}
    <x-hero-banner
        :compact="true"
        eyebrow="LANGTANG SOUTH LOCAL GOVERNMENT COUNCIL"
        title="Departments"
        subtitle="Explore the various operational arms of Langtang South Local Government Council."
    />

    <div class="py-12 bg-light-gray min-h-[60vh]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($departments as $department)
                    <x-card :title="$department->name"
                            subtitle="Langtang Council Department"
                            :href="route('departments.show', $department->slug)">
                        <p class="text-sm text-gray-500 mb-4 line-clamp-3">
                            {{ $department->overview }}
                        </p>
                        @if($department->head_name)
                            <div class="text-xs text-gray-400 mb-4 pt-3 border-t border-gray-100">
                                <span class="font-semibold text-gray-600">Head:</span> {{ $department->head_name }} ({{ $department->head_title ?? 'Director' }})
                            </div>
                        @endif
                        <a href="{{ route('departments.show', $department->slug) }}" class="inline-flex items-center text-sm font-semibold text-primary-green hover:underline">
                            Learn More
                            <svg class="ml-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    </x-card>
                @empty
                    <div class="col-span-full bg-white rounded-xl shadow-sm p-12 text-center">
                        <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3H21m-3.75 3H21" />
                        </svg>
                        <h3 class="font-heading font-semibold text-gray-900 text-lg mb-1">No Departments Registered</h3>
                        <p class="text-gray-500">Departments list is currently being updated. Please check back later.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-public-layout>
