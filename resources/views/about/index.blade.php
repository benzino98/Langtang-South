<x-public-layout>
    {{-- Page Header --}}
    <x-hero-banner
        title="About the Council"
        subtitle="Learn about the administration, structure, and history of Langtang Local Government Council."
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
                        <h2 class="font-heading text-2xl font-bold text-gray-900 mb-6 border-b pb-4">Langtang Local Government Council</h2>
                        
                        <div class="prose max-w-none text-gray-600 space-y-6">
                            <p class="text-lg leading-relaxed text-gray-700">
                                Welcome to the official portal of Langtang Local Government Council. Langtang Local Government Council is committed to fostering economic growth, maintaining peace, and delivering essential services to our vibrant communities.
                            </p>
                            
                            <h3 class="font-heading text-xl font-bold text-gray-900 mt-8">Our Location & Geography</h3>
                            <p>
                                Located in the southern zone of Plateau State, Nigeria, Langtang boasts a rich cultural heritage, fertile agricultural lands, and industrious citizens. The council area covers a significant landmass and shares borders with neighboring local governments in the state.
                            </p>
                            
                            <h3 class="font-heading text-xl font-bold text-gray-900 mt-8">Administration</h3>
                            <p>
                                The Council operates under a democratic administrative framework led by the Executive Chairman, supported by the Vice Chairman, Secretary to the Council, and Supervisory Councillors representing various portfolios. The legislative arm consists of Councillors representing the various electoral wards.
                            </p>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                                <div class="bg-green-50 border-l-4 border-primary-green p-4 rounded-r-lg">
                                    <h4 class="font-heading font-semibold text-primary-green mb-1">Local Governance</h4>
                                    <p class="text-sm text-gray-600">Bringing government closer to the people through inclusive policy making and community participation.</p>
                                </div>
                                <div class="bg-yellow-50 border-l-4 border-gold-accent p-4 rounded-r-lg">
                                    <h4 class="font-heading font-semibold text-yellow-800 mb-1">Empowerment & Growth</h4>
                                    <p class="text-sm text-gray-600">Fostering localized agricultural, infrastructural, and small-business support programs.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
