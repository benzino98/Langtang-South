<x-public-layout>
    {{-- Page Header --}}
    <x-hero-banner
        :compact="true"
        eyebrow="LANGTANG SOUTH LOCAL GOVERNMENT COUNCIL"
        title="Departments"
        subtitle="Explore the various operational arms of Langtang South Local Government Council."
    />

    <div class="py-12 md:py-20 bg-light-gray min-h-[60vh]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($departments as $department)
                    <div class="card p-8 flex flex-col justify-between group hover:-translate-y-1 transition-all duration-300">
                        <div>
                            <div class="w-14 h-14 rounded-2xl bg-green-50 text-primary-green flex items-center justify-center mb-6 group-hover:bg-primary-green group-hover:text-white transition-colors duration-300 shadow-xs">
                                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3H21m-3.75 3H21" />
                                </svg>
                            </div>
                            <h3 class="font-heading font-extrabold text-xl text-gray-900 mb-3 group-hover:text-primary-green transition-colors duration-200">
                                {{ $department->name }}
                            </h3>
                            <p class="text-sm text-gray-600 mb-6 line-clamp-3 leading-relaxed">
                                {{ $department->overview }}
                            </p>
                        </div>
                        
                        <div class="pt-4 border-t border-gray-100 flex items-center justify-between">
                            @if($department->head_name)
                                <div class="text-xs text-gray-500">
                                    <span class="font-semibold text-gray-700">Head:</span> {{ $department->head_name }}
                                </div>
                            @else
                                <div class="text-xs text-gray-400 font-medium">Council Secretariat</div>
                            @endif
                            <a href="{{ route('departments.show', $department->slug) }}" class="inline-flex items-center text-sm font-bold text-primary-green group-hover:translate-x-1 transition-transform duration-200">
                                Details
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
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3H21m-3.75 3H21" />
                            </svg>
                        </div>
                        <h3 class="font-heading font-bold text-gray-900 text-lg mb-1">No Departments Listed</h3>
                        <p class="text-sm text-gray-500">Department directories are currently being updated by the administration.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-public-layout>
