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
                            
                            <h2 class="font-heading text-xs font-bold text-primary-green uppercase tracking-widest mb-8 relative z-10 border-b-2 border-primary-green/20 pb-2 inline-block">Executive Chairman</h2>
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
                                    <p class="text-sm font-bold text-gold-accent-dark mb-6 uppercase tracking-wider">Executive Chairman, Langtang South Local Government Council</p>
                                    @if($chairman->welcome_message)
                                        <div class="bg-green-50 p-6 rounded-xl border-l-4 border-primary-green mb-6 shadow-xs">
                                            <h4 class="font-heading font-bold text-primary-green text-xs uppercase tracking-wider mb-2">Official Welcome Message</h4>
                                            <p class="text-sm text-gray-700 italic leading-relaxed">"{{ $chairman->welcome_message }}"</p>
                                        </div>
                                    @endif
                                    <div class="prose text-gray-600 leading-relaxed text-sm space-y-3">
                                        <p>{{ $chairman->biography }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Vice Chairman & Council Secretary --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        {{-- Deputy Chairman --}}
                        @if($viceChairman)
                            <div class="card p-8 group flex flex-col justify-between">
                                <div>
                                    <h2 class="font-heading text-xs font-bold text-gray-400 uppercase tracking-widest mb-6">Deputy Chairman</h2>
                                    <div class="space-y-4">
                                        <h3 class="font-heading font-extrabold text-gray-900 text-xl">{{ $viceChairman->full_name }}</h3>
                                        <p class="text-xs text-gold-accent-dark font-bold uppercase tracking-wider">Deputy Chairman, Langtang South LGA</p>
                                        <p class="text-sm text-gray-600 leading-relaxed">{{ $viceChairman->biography }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- Secretary --}}
                        @if($secretary)
                            <div class="card p-8 group flex flex-col justify-between">
                                <div>
                                    <h2 class="font-heading text-xs font-bold text-gray-400 uppercase tracking-widest mb-6">Council Secretary</h2>
                                    <div class="space-y-4">
                                        <h3 class="font-heading font-extrabold text-gray-900 text-xl">{{ $secretary->full_name }}</h3>
                                        <p class="text-xs text-gold-accent-dark font-bold uppercase tracking-wider">Secretary to the Council</p>
                                        <p class="text-sm text-gray-600 leading-relaxed">{{ $secretary->biography }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    {{-- Supervisory Councillors --}}
                    @if($councillors->isNotEmpty())
                        <div class="card p-8 sm:p-10">
                            <div class="flex items-center mb-8 pb-4 border-b border-gray-100">
                                <h2 class="font-heading text-lg font-bold text-primary-green uppercase tracking-wider">Supervisory Councillors</h2>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                                @foreach($councillors as $councillor)
                                    <div class="bg-gray-50/70 p-5 rounded-2xl border border-gray-100 hover:border-primary-green/30 hover:bg-green-50/50 transition-colors duration-200">
                                        <h3 class="font-heading font-bold text-gray-900 text-base mb-1">{{ $councillor->full_name }}</h3>
                                        <p class="text-xs text-primary-green font-bold uppercase tracking-wider">{{ $councillor->portfolio }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Elected Legislative Councillors --}}
                    <div class="card p-8 sm:p-10">
                        <div class="flex items-center mb-8 pb-4 border-b border-gray-100">
                            <h2 class="font-heading text-lg font-bold text-primary-green uppercase tracking-wider">Elected Legislative Councillors</h2>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            @php
                                $legislators = [
                                    ['name' => 'Rt. Hon. Danjuma Lohsel', 'ward' => 'Dadin-Kowa', 'role' => 'Leader'],
                                    ['name' => 'Rt. Hon Timfa Ntyem Mullak', 'ward' => 'Talgwang', 'role' => 'Deputy Leader'],
                                    ['name' => 'Hon. Jimam Paul Lar', 'ward' => 'Sabon Gida', 'role' => 'Member'],
                                    ['name' => 'Hon. Nansak Waidu', 'ward' => 'Magama', 'role' => 'Member'],
                                    ['name' => 'Hon. Dashe Nandul', 'ward' => 'Mabudi-North', 'role' => 'Member'],
                                    ['name' => 'Hon. Binbol Nimmyel', 'ward' => 'Mabudi-South', 'role' => 'Member'],
                                    ['name' => 'Hon. Butnap Justina', 'ward' => 'Turaki', 'role' => 'Member'],
                                    ['name' => 'Hon. Samson Nandok Danjuma', 'ward' => 'Nassarawa', 'role' => 'Member'],
                                    ['name' => 'Hon Sabut Shetur', 'ward' => 'Takbol', 'role' => 'Member'],
                                    ['name' => 'Hon. Amos Vongjen Stephen', 'ward' => 'Jemkur', 'role' => 'Member'],
                                    ['name' => 'Hon. Timloh Makwam', 'ward' => 'Timbol', 'role' => 'Member'],
                                    ['name' => 'Hon. Napdam Chirtip', 'ward' => 'Lashel', 'role' => 'Member'],
                                    ['name' => 'Hon. Sunday Timkap Tyem', 'ward' => 'Gamakai', 'role' => 'Member'],
                                    ['name' => 'Hon Timnan Bunu Jonah', 'ward' => 'Fajul', 'role' => 'Member'],
                                    ['name' => 'Hon. Laven Dashe Chakven', 'ward' => 'Faya', 'role' => 'Member'],
                                ];
                            @endphp
                            @foreach($legislators as $leg)
                                <div class="p-4 rounded-xl bg-white border border-gray-100 shadow-xs hover:border-gold-accent/40 transition-colors duration-200">
                                    <div class="text-xs font-bold uppercase tracking-wider text-gold-accent-dark mb-1">
                                        {{ $leg['ward'] }} @if($leg['role'] !== 'Member') · <span class="text-primary-green">{{ $leg['role'] }}</span> @endif
                                    </div>
                                    <div class="font-heading font-extrabold text-gray-900 text-sm">
                                        {{ $leg['name'] }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
