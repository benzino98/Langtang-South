<x-public-layout>
    {{-- Page Header --}}
    <x-hero-banner
        :compact="true"
        eyebrow="LANGTANG SOUTH LOCAL GOVERNMENT COUNCIL"
        title="Council Leadership"
        subtitle="Meet the executive administrators driving development and policy in Langtang South Local Government Council."
    />

    <div class="py-12 md:py-20 bg-light-gray">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-4 lg:gap-8">
                {{-- Sidebar Navigation --}}
                <div class="mb-8 lg:mb-0 lg:col-span-1">
                    <nav class="space-y-2 bg-white p-6 rounded-2xl shadow-elevated sticky top-28 border border-gray-100">
                        <h3 class="font-heading font-bold text-gray-900 mb-4 px-3 text-lg">About Council</h3>
                        <a href="{{ route('about') }}"
                           class="block px-4 py-3 rounded-xl text-sm font-semibold transition-colors duration-200 {{ request()->routeIs('about') ? 'bg-primary-green text-white shadow-md' : 'text-gray-700 hover:bg-green-50 hover:text-primary-green' }}">
                            Overview
                        </a>
                        <a href="{{ route('about.history') }}"
                           class="block px-4 py-3 rounded-xl text-sm font-semibold transition-colors duration-200 {{ request()->routeIs('about.history') ? 'bg-primary-green text-white shadow-md' : 'text-gray-700 hover:bg-green-50 hover:text-primary-green' }}">
                            History
                        </a>
                        <a href="{{ route('about.vision-mission') }}"
                           class="block px-4 py-3 rounded-xl text-sm font-semibold transition-colors duration-200 {{ request()->routeIs('about.vision-mission') ? 'bg-primary-green text-white shadow-md' : 'text-gray-700 hover:bg-green-50 hover:text-primary-green' }}">
                            Vision & Mission
                        </a>
                        <a href="{{ route('about.leadership') }}"
                           class="block px-4 py-3 rounded-xl text-sm font-semibold transition-colors duration-200 {{ request()->routeIs('about.leadership') ? 'bg-primary-green text-white shadow-md' : 'text-gray-700 hover:bg-green-50 hover:text-primary-green' }}">
                            Council Leadership
                        </a>
                        <a href="{{ route('about.organisational-structure') }}"
                           class="block px-4 py-3 rounded-xl text-sm font-semibold transition-colors duration-200 {{ request()->routeIs('about.organisational-structure') ? 'bg-primary-green text-white shadow-md' : 'text-gray-700 hover:bg-green-50 hover:text-primary-green' }}">
                            Organisational Structure
                        </a>
                    </nav>
                </div>

                {{-- Main Content --}}
                <div class="lg:col-span-3 space-y-8">
                    {{-- Executive Chairman --}}
                    @if($chairman)
                        <div class="card p-8 sm:p-12 relative overflow-hidden group">
                            {{-- Decorative Background --}}
                            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-green-50 rounded-full opacity-50 transform group-hover:scale-110 transition-transform duration-700"></div>
                            
                            <h2 class="font-heading text-xl font-bold text-primary-green uppercase tracking-wider mb-8 relative z-10 border-b-2 border-primary-green/20 pb-2 inline-block">Executive Chairman</h2>
                            <div class="md:flex md:items-start md:space-x-10 relative z-10">
                                <div class="md:w-1/3 mb-8 md:mb-0 shrink-0">
                                    <div class="aspect-[4/5] rounded-2xl overflow-hidden shadow-elevated border-4 border-white relative group-hover:shadow-xl transition-shadow duration-300">
                                        <img src="{{ asset('EXECUTIVE CHAIRMAN.jpg') }}"
                                             alt="{{ $chairman->full_name }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                                        <div class="absolute inset-0 border border-black/5 rounded-2xl pointer-events-none"></div>
                                    </div>
                                </div>
                                <div class="md:w-2/3">
                                    <h3 class="font-heading text-3xl font-extrabold text-gray-900 mb-2">{{ $chairman->full_name }}</h3>
                                    <p class="text-base font-bold text-gold-accent mb-6 uppercase tracking-wider">Executive Chairman, Langtang South Local Government Council</p>
                                    @if($chairman->welcome_message)
                                        <div class="bg-green-50 p-6 rounded-xl border-l-4 border-primary-green mb-6 shadow-sm">
                                            <h4 class="font-heading font-bold text-primary-green text-sm uppercase tracking-wider mb-2">Welcome Message</h4>
                                            <p class="text-base text-gray-700 italic leading-relaxed">"{{ $chairman->welcome_message }}"</p>
                                        </div>
                                    @endif
                                    <div class="prose text-gray-600 leading-relaxed">
                                        <p>{{ $chairman->biography }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Vice Chairman & Council Secretary --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        {{-- Vice Chairman --}}
                        @if($viceChairman)
                            <div class="card p-8 group">
                                <h2 class="font-heading text-sm font-bold text-gray-400 uppercase tracking-widest mb-6">Vice Chairman</h2>
                                <div class="flex flex-col sm:flex-row items-center sm:items-start space-y-4 sm:space-y-0 sm:space-x-6">
                                    <div class="w-32 h-32 rounded-full overflow-hidden bg-gray-100 flex-shrink-0 shadow-md border-4 border-white">
                                        <img src="{{ $viceChairman->image_path ? asset('storage/' . $viceChairman->image_path) : 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=400&auto=format&fit=crop' }}"
                                             alt="{{ $viceChairman->full_name }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="text-center sm:text-left">
                                        <h3 class="font-heading font-extrabold text-gray-900 text-xl mb-1">{{ $viceChairman->full_name }}</h3>
                                        <p class="text-sm text-gold-accent font-bold uppercase tracking-wider mb-3">Vice Chairman</p>
                                        <p class="text-sm text-gray-600 line-clamp-3 leading-relaxed">{{ $viceChairman->biography }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- Secretary --}}
                        @if($secretary)
                            <div class="card p-8 group">
                                <h2 class="font-heading text-sm font-bold text-gray-400 uppercase tracking-widest mb-6">Council Secretary</h2>
                                <div class="flex flex-col sm:flex-row items-center sm:items-start space-y-4 sm:space-y-0 sm:space-x-6">
                                    <div class="w-32 h-32 rounded-full overflow-hidden bg-gray-100 flex-shrink-0 shadow-md border-4 border-white">
                                        <img src="{{ $secretary->image_path ? asset('storage/' . $secretary->image_path) : 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?q=80&w=400&auto=format&fit=crop' }}"
                                             alt="{{ $secretary->full_name }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="text-center sm:text-left">
                                        <h3 class="font-heading font-extrabold text-gray-900 text-xl mb-1">{{ $secretary->full_name }}</h3>
                                        <p class="text-sm text-gold-accent font-bold uppercase tracking-wider mb-3">Secretary to the Council</p>
                                        <p class="text-sm text-gray-600 line-clamp-3 leading-relaxed">{{ $secretary->biography }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    {{-- Supervisory Councillors --}}
                    @if($councillors->isNotEmpty())
                        <div class="card p-8 sm:p-10">
                            <div class="flex items-center mb-8 pb-4 border-b border-gray-100">
                                <h2 class="font-heading text-xl font-bold text-primary-green uppercase tracking-wider">Supervisory Councillors</h2>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                                @foreach($councillors as $councillor)
                                    <div class="text-center group">
                                        <div class="w-32 h-32 rounded-full overflow-hidden bg-light-gray mx-auto mb-5 shadow-sm border-2 border-white group-hover:border-primary-green/30 transition-colors duration-300 relative">
                                            <img src="{{ $councillor->image_path ? asset('storage/' . $councillor->image_path) : 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=400&auto=format&fit=crop' }}"
                                                 alt="{{ $councillor->full_name }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                                        </div>
                                        <h3 class="font-heading font-bold text-gray-900 text-lg mb-1">{{ $councillor->full_name }}</h3>
                                        <p class="text-sm text-primary-green font-semibold uppercase tracking-wider">{{ $councillor->portfolio }}</p>
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
