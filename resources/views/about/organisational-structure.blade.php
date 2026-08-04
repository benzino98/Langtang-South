<x-public-layout>
    {{-- Page Header --}}
    <x-hero-banner
        title="Organisational Structure"
        subtitle="Understand the administrative hierarchy and functional departments of the Langtang Council."
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
                <div class="lg:col-span-3">
                    <div class="bg-white rounded-xl shadow-sm p-6 sm:p-10">
                        <h2 class="font-heading text-2xl font-bold text-gray-900 mb-6 border-b pb-4">Administration Hierarchy</h2>
                        
                        <div class="space-y-8">
                            <p class="text-gray-600">
                                The Langtang Local Government Council is organized into clear policy-making, legislative, and execution branches. This ensures proper checks and balances, efficient project execution, and transparent fund management.
                            </p>

                            {{-- Hierarchy Map --}}
                            <div class="flex flex-col items-center space-y-4">
                                {{-- Chairman --}}
                                <div class="bg-primary-green text-white p-4 rounded-xl shadow-sm text-center w-64 border border-green-700">
                                    <h3 class="font-heading font-bold text-sm">Executive Chairman</h3>
                                    <p class="text-xs text-green-100">Chief Executive / Accounting Officer</p>
                                </div>

                                {{-- Connector --}}
                                <div class="w-0.5 h-6 bg-gray-300"></div>

                                {{-- Vice & Secretary Row --}}
                                <div class="flex flex-col sm:flex-row gap-4">
                                    <div class="bg-white border-2 border-primary-green p-4 rounded-xl text-center w-60">
                                        <h4 class="font-heading font-bold text-sm text-gray-900">Vice Chairman</h4>
                                        <p class="text-xs text-gray-500">Deputy Chief Executive</p>
                                    </div>
                                    <div class="bg-white border-2 border-primary-green p-4 rounded-xl text-center w-60">
                                        <h4 class="font-heading font-bold text-sm text-gray-900">Council Secretary</h4>
                                        <p class="text-xs text-gray-500">Head of Secretariat / Administration</p>
                                    </div>
                                </div>

                                {{-- Connector --}}
                                <div class="w-0.5 h-6 bg-gray-300"></div>

                                {{-- Supervisory Councillors --}}
                                <div class="bg-gold-accent text-white p-4 rounded-xl shadow-sm text-center w-80">
                                    <h3 class="font-heading font-bold text-sm">Supervisory Councillors</h3>
                                    <p class="text-xs text-yellow-100">Policy formulation & departmental oversight</p>
                                </div>

                                {{-- Connector --}}
                                <div class="w-0.5 h-6 bg-gray-300"></div>

                                {{-- Departments Box --}}
                                <div class="bg-light-gray p-6 rounded-xl border border-gray-200 w-full">
                                    <h3 class="font-heading font-bold text-gray-900 text-center mb-4">Core Operating Departments</h3>
                                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 text-center text-xs font-semibold text-gray-700">
                                        <div class="bg-white p-3 rounded-lg border border-gray-100">Administration</div>
                                        <div class="bg-white p-3 rounded-lg border border-gray-100">Finance</div>
                                        <div class="bg-white p-3 rounded-lg border border-gray-100">Works & Housing</div>
                                        <div class="bg-white p-3 rounded-lg border border-gray-100">Agriculture</div>
                                        <div class="bg-white p-3 rounded-lg border border-gray-100">Health</div>
                                        <div class="bg-white p-3 rounded-lg border border-gray-100">Education</div>
                                        <div class="bg-white p-3 rounded-lg border border-gray-100">Environment</div>
                                        <div class="bg-white p-3 rounded-lg border border-gray-100">Information</div>
                                        <div class="bg-white p-3 rounded-lg border border-gray-100">Planning & Stats</div>
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
