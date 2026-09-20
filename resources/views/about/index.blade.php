<x-public-layout>
    {{-- Page Header --}}
    <x-hero-banner
        :compact="true"
        eyebrow="LANGTANG SOUTH LOCAL GOVERNMENT COUNCIL"
        title="About the Council"
        subtitle="Learn about the administration, structure, and history of Langtang South Local Government Council."
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
                    <div class="card p-8 sm:p-12 relative overflow-hidden group">
                        {{-- Decorative Background --}}
                        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-green-50 rounded-full opacity-50 transform group-hover:scale-110 transition-transform duration-700 pointer-events-none"></div>
                        
                        <h2 class="font-heading text-3xl font-extrabold text-gray-900 mb-8 border-b-2 border-primary-green/20 pb-4 relative z-10 inline-block">Council Overview</h2>
                        
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 relative z-10">
                            {{-- Main Narrative --}}
                            <div class="lg:col-span-2 space-y-6 text-gray-600">
                                <p class="text-xl leading-relaxed text-gray-700 font-medium">
                                    Langtang South Local Government Council is one of the Local Government Areas in Plateau State, Nigeria. Located in the southern part of the state, it is home to diverse communities and people whose livelihoods are largely driven by agriculture, trade, and small scale businesses.
                                </p>
                                
                                <div>
                                    <h3 class="font-heading text-xl font-bold text-gray-900 mb-3">Our Core Commitment</h3>
                                    <p class="text-base leading-relaxed">
                                        The Council is committed to promoting grassroots development, improving basic infrastructure and public services, strengthening peace and unity, and creating opportunities that enhance the wellbeing of its people.
                                    </p>
                                </div>
                                
                                <div>
                                    <h3 class="font-heading text-xl font-bold text-gray-900 mb-3">Governance & Administration</h3>
                                    <p class="text-base leading-relaxed">
                                        Headquartered in Mabudi, the Council operates under a democratic administrative framework led by the Executive Chairman, Hon. Nanfa Alhassan Nbin, supported by Deputy Chairman Hon. Julcit Musa, Council Secretary Hon. Nanman Luka Domtau, Supervisory Councillors across 9 portfolios, and 15 elected Ward Councillors forming the legislative council.
                                    </p>
                                </div>
                            </div>
                            
                            {{-- Key Facts & Statistics --}}
                            <div class="lg:col-span-1 bg-green-50/70 rounded-2xl p-6 border border-primary-green/10 space-y-6">
                                <h3 class="font-heading text-lg font-bold text-primary-green border-b border-primary-green/20 pb-3 uppercase tracking-wider text-xs">Council Snapshot</h3>
                                
                                <div class="space-y-4">
                                    <div class="bg-white p-4 rounded-xl shadow-xs border border-gray-100">
                                        <div class="text-xs font-semibold uppercase text-gray-400">Headquarters</div>
                                        <div class="font-heading font-extrabold text-gray-900 text-lg">Mabudi</div>
                                    </div>
                                    <div class="bg-white p-4 rounded-xl shadow-xs border border-gray-100">
                                        <div class="text-xs font-semibold uppercase text-gray-400">Electoral Wards</div>
                                        <div class="font-heading font-extrabold text-gray-900 text-lg">10 Wards</div>
                                    </div>
                                    <div class="bg-white p-4 rounded-xl shadow-xs border border-gray-100">
                                        <div class="text-xs font-semibold uppercase text-gray-400">Landmass Area</div>
                                        <div class="font-heading font-extrabold text-gray-900 text-lg">~838 sq. km</div>
                                    </div>
                                    <div class="bg-white p-4 rounded-xl shadow-xs border border-gray-100">
                                        <div class="text-xs font-semibold uppercase text-gray-400">Population (2006 Census)</div>
                                        <div class="font-heading font-extrabold text-gray-900 text-lg">105,173</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-10 relative z-10">
                            <div class="bg-green-50 border-l-4 border-primary-green p-6 rounded-r-xl shadow-xs hover:shadow-md transition-shadow duration-300">
                                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center mb-4 text-primary-green shadow-xs">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                                    </svg>
                                </div>
                                <h4 class="font-heading font-bold text-primary-green mb-2 text-lg">Local Governance</h4>
                                <p class="text-sm text-gray-700 leading-relaxed">Bringing government closer to the people through inclusive policy making and community participation.</p>
                            </div>
                            <div class="bg-amber-50/80 border-l-4 border-gold-accent p-6 rounded-r-xl shadow-xs hover:shadow-md transition-shadow duration-300">
                                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center mb-4 text-gold-accent-dark shadow-xs">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                                    </svg>
                                </div>
                                <h4 class="font-heading font-bold text-amber-900 mb-2 text-lg">Empowerment & Growth</h4>
                                <p class="text-sm text-gray-700 leading-relaxed">Fostering localized agricultural, infrastructural, and small-business support programs.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
