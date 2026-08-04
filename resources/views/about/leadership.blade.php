<x-public-layout>
    {{-- Page Header --}}
    <x-hero-banner
        title="Council Leadership"
        subtitle="Meet the executive administrators driving development and policy in Langtang Council."
    />

    <div class="py-12 bg-light-gray">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-4 lg:gap-8">
                {{-- Sidebar Navigation --}}
                <div class="mb-8 lg:mb-0 lg:col-span-1">
                    <nav class="space-y-1 bg-white p-4 rounded-xl shadow-sm sticky top-24">
                        <a href="{{ route('about') }}"
                           class="block px-3 py-2.5 rounded-lg text-sm font-semibold {{ request()->routeIs('about') ? 'bg-primary-green text-white' : 'text-gray-700 hover:bg-green-50 hover:text-primary-green' }}">
                            Overview
                        </a>
                        <a href="{{ route('about.history') }}"
                           class="block px-3 py-2.5 rounded-lg text-sm font-semibold {{ request()->routeIs('about.history') ? 'bg-primary-green text-white' : 'text-gray-700 hover:bg-green-50 hover:text-primary-green' }}">
                            History
                        </a>
                        <a href="{{ route('about.vision-mission') }}"
                           class="block px-3 py-2.5 rounded-lg text-sm font-semibold {{ request()->routeIs('about.vision-mission') ? 'bg-primary-green text-white' : 'text-gray-700 hover:bg-green-50 hover:text-primary-green' }}">
                            Vision & Mission
                        </a>
                        <a href="{{ route('about.leadership') }}"
                           class="block px-3 py-2.5 rounded-lg text-sm font-semibold {{ request()->routeIs('about.leadership') ? 'bg-primary-green text-white' : 'text-gray-700 hover:bg-green-50 hover:text-primary-green' }}">
                            Council Leadership
                        </a>
                        <a href="{{ route('about.organisational-structure') }}"
                           class="block px-3 py-2.5 rounded-lg text-sm font-semibold {{ request()->routeIs('about.organisational-structure') ? 'bg-primary-green text-white' : 'text-gray-700 hover:bg-green-50 hover:text-primary-green' }}">
                            Organisational Structure
                        </a>
                    </nav>
                </div>

                {{-- Main Content --}}
                <div class="lg:col-span-3 space-y-8">
                    {{-- Executive Chairman --}}
                    @if($chairman)
                        <div class="bg-white rounded-xl shadow-sm p-6 sm:p-10">
                            <h2 class="font-heading text-xl font-bold text-primary-green uppercase tracking-wide mb-6">Executive Chairman</h2>
                            <div class="md:flex md:items-start md:space-x-8">
                                <div class="md:w-1/3 mb-6 md:mb-0">
                                    <div class="aspect-square rounded-xl overflow-hidden bg-gray-100 shadow-sm border border-gray-200">
                                        <img src="{{ $chairman->image_path ? asset('storage/' . $chairman->image_path) : 'https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=400&auto=format&fit=crop' }}"
                                             alt="{{ $chairman->full_name }}" class="w-full h-full object-cover">
                                    </div>
                                </div>
                                <div class="md:w-2/3">
                                    <h3 class="font-heading text-2xl font-bold text-gray-900 mb-1">{{ $chairman->full_name }}</h3>
                                    <p class="text-sm font-semibold text-gold-accent mb-4">Executive Chairman, Langtang Council</p>
                                    @if($chairman->welcome_message)
                                        <div class="bg-green-50/50 p-4 rounded-lg border-l-4 border-primary-green mb-4">
                                            <h4 class="font-heading font-semibold text-primary-green text-sm mb-1">Welcome Message</h4>
                                            <p class="text-sm text-gray-600 italic">"{{ $chairman->welcome_message }}"</p>
                                        </div>
                                    @endif
                                    <div class="text-sm text-gray-600 space-y-3">
                                        <p>{{ $chairman->biography }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Vice Chairman & Council Secretary --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Vice Chairman --}}
                        @if($viceChairman)
                            <div class="bg-white rounded-xl shadow-sm p-6">
                                <h2 class="font-heading text-lg font-bold text-primary-green uppercase tracking-wide mb-4">Vice Chairman</h2>
                                <div class="flex items-start space-x-4">
                                    <div class="w-24 h-24 rounded-lg overflow-hidden bg-gray-100 flex-shrink-0 border border-gray-200">
                                        <img src="{{ $viceChairman->image_path ? asset('storage/' . $viceChairman->image_path) : 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=200&auto=format&fit=crop' }}"
                                             alt="{{ $viceChairman->full_name }}" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <h3 class="font-heading font-bold text-gray-900 text-lg">{{ $viceChairman->full_name }}</h3>
                                        <p class="text-xs text-gold-accent font-semibold mb-2">Vice Chairman</p>
                                        <p class="text-xs text-gray-500 line-clamp-3">{{ $viceChairman->biography }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- Secretary --}}
                        @if($secretary)
                            <div class="bg-white rounded-xl shadow-sm p-6">
                                <h2 class="font-heading text-lg font-bold text-primary-green uppercase tracking-wide mb-4">Council Secretary</h2>
                                <div class="flex items-start space-x-4">
                                    <div class="w-24 h-24 rounded-lg overflow-hidden bg-gray-100 flex-shrink-0 border border-gray-200">
                                        <img src="{{ $secretary->image_path ? asset('storage/' . $secretary->image_path) : 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?q=80&w=200&auto=format&fit=crop' }}"
                                             alt="{{ $secretary->full_name }}" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <h3 class="font-heading font-bold text-gray-900 text-lg">{{ $secretary->full_name }}</h3>
                                        <p class="text-xs text-gold-accent font-semibold mb-2">Secretary to the Council</p>
                                        <p class="text-xs text-gray-500 line-clamp-3">{{ $secretary->biography }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    {{-- Supervisory Councillors --}}
                    @if($councillors->isNotEmpty())
                        <div class="bg-white rounded-xl shadow-sm p-6 sm:p-10">
                            <h2 class="font-heading text-xl font-bold text-primary-green uppercase tracking-wide mb-6">Supervisory Councillors</h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                                @foreach($councillors as $councillor)
                                    <div class="text-center bg-light-gray p-5 rounded-xl border border-gray-100 hover:shadow-sm transition-shadow duration-200">
                                        <div class="w-24 h-24 rounded-full overflow-hidden bg-gray-100 mx-auto mb-4 border border-gray-200">
                                            <img src="{{ $councillor->image_path ? asset('storage/' . $councillor->image_path) : 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=200&auto=format&fit=crop' }}"
                                                 alt="{{ $councillor->full_name }}" class="w-full h-full object-cover">
                                        </div>
                                        <h3 class="font-heading font-bold text-gray-900 text-sm mb-0.5">{{ $councillor->full_name }}</h3>
                                        <p class="text-xs text-primary-green font-semibold mb-2">{{ $councillor->portfolio }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
