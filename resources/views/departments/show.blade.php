<x-public-layout
    :title="$department->name . ' | Langtang South Area Council'"
    :meta-description="\Illuminate\Support\Str::limit(strip_tags($department->overview), 160)"
    :og-title="$department->name"
    :og-image="$department->image_path ? asset('storage/' . $department->image_path) : null"
>
    {{-- Page Header --}}
    <x-hero-banner
        :compact="true"
        eyebrow="LANGTANG SOUTH LOCAL GOVERNMENT COUNCIL"
        :title="$department->name . ' Department'"
        subtitle="Operational overview, responsibilities, and leadership of the department."
    />

    <div class="py-12 bg-light-gray min-h-[60vh]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-3 lg:gap-8">
                {{-- Main Information --}}
                <div class="lg:col-span-2 space-y-6">
                    {{-- Overview Card --}}
                    <div class="bg-white rounded-xl shadow-sm p-6 sm:p-8">
                        <h2 class="font-heading text-xl font-bold text-gray-900 mb-4 border-b pb-2">Overview</h2>
                        <p class="text-gray-600 leading-relaxed whitespace-pre-line">{{ $department->overview }}</p>
                    </div>

                    {{-- Responsibilities Card --}}
                    @if($department->responsibilities)
                        <div class="bg-white rounded-xl shadow-sm p-6 sm:p-8">
                            <h2 class="font-heading text-xl font-bold text-gray-900 mb-4 border-b pb-2">Core Responsibilities</h2>
                            <div class="text-gray-600 leading-relaxed whitespace-pre-line prose max-w-none">
                                {{ $department->responsibilities }}
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Sidebar: Leadership & Contacts --}}
                <div class="space-y-6">
                    {{-- Leadership Card --}}
                    @if($department->head_name)
                        <div class="bg-white rounded-xl shadow-sm p-6 text-center">
                            <h2 class="font-heading text-md font-bold text-primary-green uppercase tracking-wide mb-4 border-b pb-2">Department Head</h2>
                            <div class="w-24 h-24 rounded-full overflow-hidden bg-gray-100 mx-auto mb-4 border border-gray-200">
                                <img src="{{ $department->image_path ? asset('storage/' . $department->image_path) : 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=200&auto=format&fit=crop' }}"
                                     alt="{{ $department->head_name }}" class="w-full h-full object-cover">
                            </div>
                            <h3 class="font-heading font-bold text-gray-900 text-base mb-1">{{ $department->head_name }}</h3>
                            <p class="text-xs text-gold-accent font-semibold mb-3">{{ $department->head_title ?? 'Director' }}</p>
                        </div>
                    @endif

                    {{-- Contact Info Card --}}
                    @if($department->email || $department->phone)
                        <div class="bg-white rounded-xl shadow-sm p-6">
                            <h2 class="font-heading text-md font-bold text-primary-green uppercase tracking-wide mb-4 border-b pb-2">Contact Details</h2>
                            <ul class="space-y-3 text-sm">
                                @if($department->email)
                                    <li class="flex items-center space-x-2 text-gray-600">
                                        <svg class="w-5 h-5 text-gold-accent" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                        </svg>
                                        <a href="mailto:{{ $department->email }}" class="hover:underline">{{ $department->email }}</a>
                                    </li>
                                @endif
                                @if($department->phone)
                                    <li class="flex items-center space-x-2 text-gray-600">
                                        <svg class="w-5 h-5 text-gold-accent" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                        </svg>
                                        <a href="tel:{{ $department->phone }}" class="hover:underline">{{ $department->phone }}</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    @endif

                    {{-- Back Link --}}
                    <a href="{{ route('departments.index') }}" class="inline-flex items-center text-sm font-semibold text-primary-green hover:underline">
                        <svg class="mr-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                        </svg>
                        Back to Departments
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
