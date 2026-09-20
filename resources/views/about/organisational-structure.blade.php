<x-public-layout>
    {{-- Page Header --}}
    <x-hero-banner
        :compact="true"
        eyebrow="LANGTANG SOUTH LOCAL GOVERNMENT COUNCIL"
        title="Organisational Structure"
        subtitle="Understand the administrative hierarchy and functional departments of the Langtang South Council."
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
                <div class="lg:col-span-3">
                    <div class="card p-8 sm:p-12 relative overflow-hidden group">
                        {{-- Decorative Background --}}
                        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-green-50 rounded-full opacity-50 transform group-hover:scale-110 transition-transform duration-700 pointer-events-none"></div>
                        
                        <h2 class="font-heading text-3xl font-extrabold text-gray-900 mb-8 border-b-2 border-primary-green/20 pb-4 relative z-10 inline-block">Administration Hierarchy</h2>
                        
                        <div class="space-y-10 relative z-10">
                            <p class="text-xl leading-relaxed text-gray-700 font-medium">
                                The Langtang South Local Government Council is organized into clear policy-making, legislative, and execution branches. This ensures proper checks and balances, efficient project execution, and transparent fund management.
                            </p>

                            {{-- Hierarchy Map --}}
                            <div class="flex flex-col items-center space-y-6 bg-gray-50/50 p-8 rounded-2xl border border-gray-100">
                                {{-- Chairman --}}
                                <div class="bg-primary-green text-white p-5 rounded-2xl shadow-elevated text-center w-72 border-2 border-green-800/50 transform hover:scale-105 transition-transform duration-300">
                                    <h3 class="font-heading font-extrabold text-base tracking-wider uppercase mb-1">Executive Chairman</h3>
                                    <p class="text-xs text-green-100 font-medium">Chief Executive / Accounting Officer</p>
                                </div>

                                {{-- Connector --}}
                                <div class="w-1 h-8 bg-gradient-to-b from-primary-green to-primary-green/50 rounded-full"></div>

                                {{-- Vice & Secretary Row --}}
                                <div class="flex flex-col sm:flex-row gap-6 w-full max-w-2xl justify-center relative">
                                    {{-- Horizontal connector for desktop --}}
                                    <div class="hidden sm:block absolute top-0 left-1/4 right-1/4 h-1 bg-primary-green/50 rounded-full -mt-4"></div>
                                    <div class="hidden sm:block absolute top-0 left-1/4 w-1 h-4 bg-primary-green/50 rounded-full -mt-4"></div>
                                    <div class="hidden sm:block absolute top-0 right-1/4 w-1 h-4 bg-primary-green/50 rounded-full -mt-4"></div>
                                    
                                    <div class="bg-white border-2 border-primary-green/20 p-5 rounded-2xl text-center w-full sm:w-64 shadow-md hover:shadow-lg hover:border-primary-green transition-all duration-300">
                                        <h4 class="font-heading font-bold text-sm text-gray-900 tracking-wider uppercase mb-1">Vice Chairman</h4>
                                        <p class="text-xs text-gray-500 font-medium">Deputy Chief Executive</p>
                                    </div>
                                    <div class="bg-white border-2 border-primary-green/20 p-5 rounded-2xl text-center w-full sm:w-64 shadow-md hover:shadow-lg hover:border-primary-green transition-all duration-300">
                                        <h4 class="font-heading font-bold text-sm text-gray-900 tracking-wider uppercase mb-1">Council Secretary</h4>
                                        <p class="text-xs text-gray-500 font-medium">Head of Secretariat / Administration</p>
                                    </div>
                                </div>

                                {{-- Connector --}}
                                <div class="w-1 h-8 bg-gradient-to-b from-primary-green/50 to-gold-accent rounded-full"></div>

                                {{-- Supervisory Councillors --}}
                                <div class="bg-gold-accent text-white p-5 rounded-2xl shadow-elevated text-center w-80 border-2 border-yellow-600/50 transform hover:scale-105 transition-transform duration-300">
                                    <h3 class="font-heading font-extrabold text-base tracking-wider uppercase mb-1">Supervisory Councillors</h3>
                                    <p class="text-xs text-yellow-100 font-medium">Policy formulation & departmental oversight</p>
                                </div>

                                {{-- Connector --}}
                                <div class="w-1 h-8 bg-gradient-to-b from-gold-accent to-gray-300 rounded-full"></div>

                                {{-- Departments Box --}}
                                <div class="bg-white p-8 rounded-2xl shadow-md border border-gray-100 w-full hover:shadow-elevated transition-shadow duration-300">
                                    <h3 class="font-heading font-bold text-gray-900 text-center mb-6 text-xl">Core Operating Departments</h3>
                                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 text-center text-sm font-bold text-gray-700">
                                        <div class="bg-light-gray p-4 rounded-xl border border-gray-100 hover:bg-green-50 hover:text-primary-green hover:border-green-200 transition-colors duration-200">Administration</div>
                                        <div class="bg-light-gray p-4 rounded-xl border border-gray-100 hover:bg-green-50 hover:text-primary-green hover:border-green-200 transition-colors duration-200">Finance</div>
                                        <div class="bg-light-gray p-4 rounded-xl border border-gray-100 hover:bg-green-50 hover:text-primary-green hover:border-green-200 transition-colors duration-200">Works & Housing</div>
                                        <div class="bg-light-gray p-4 rounded-xl border border-gray-100 hover:bg-green-50 hover:text-primary-green hover:border-green-200 transition-colors duration-200">Agriculture</div>
                                        <div class="bg-light-gray p-4 rounded-xl border border-gray-100 hover:bg-green-50 hover:text-primary-green hover:border-green-200 transition-colors duration-200">Health</div>
                                        <div class="bg-light-gray p-4 rounded-xl border border-gray-100 hover:bg-green-50 hover:text-primary-green hover:border-green-200 transition-colors duration-200">Education</div>
                                        <div class="bg-light-gray p-4 rounded-xl border border-gray-100 hover:bg-green-50 hover:text-primary-green hover:border-green-200 transition-colors duration-200">Environment</div>
                                        <div class="bg-light-gray p-4 rounded-xl border border-gray-100 hover:bg-green-50 hover:text-primary-green hover:border-green-200 transition-colors duration-200">Information</div>
                                        <div class="bg-light-gray p-4 rounded-xl border border-gray-100 hover:bg-green-50 hover:text-primary-green hover:border-green-200 transition-colors duration-200">Planning & Stats</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
