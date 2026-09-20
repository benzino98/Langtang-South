<x-public-layout>
    {{-- Page Header --}}
    <x-hero-banner
        :compact="true"
        eyebrow="LANGTANG SOUTH LOCAL GOVERNMENT COUNCIL"
        title="History of Langtang South"
        subtitle="Discover the heritage, origins, and administrative evolution of Langtang South."
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
                        
                        <h2 class="font-heading text-3xl font-extrabold text-gray-900 mb-8 border-b-2 border-primary-green/20 pb-4 relative z-10 inline-block">Our History & Heritage</h2>
                        
                        <div class="prose max-w-none text-gray-600 space-y-8 relative z-10">
                            <p class="text-xl leading-relaxed text-gray-700 font-medium">
                                Langtang South Local Government Area is located in the southern part of Plateau State and has a rich history rooted in the communities of the former Resettlement Area and the wider Tarok homeland.
                            </p>
                            
                            <div>
                                <h3 class="font-heading text-2xl font-bold text-gray-900 mb-4">Origins & Administrative Evolution</h3>
                                <p class="text-lg leading-relaxed mb-4">
                                    Its administrative history dates back to the colonial period, when the area formed part of the Resettlement Scheme under the Shendam Native Authority. Following several administrative reforms, the area became part of Langtang Local Government in 1976.
                                </p>
                                <p class="text-lg leading-relaxed">
                                    Langtang South Local Government Area was formally created in 1991 during the nationwide local government reforms under the administration of General Ibrahim Babangida. The headquarters is situated in Mabudi, and the Local Government comprises 10 wards.
                                </p>
                            </div>
                            
                            <div>
                                <h3 class="font-heading text-2xl font-bold text-gray-900 mb-4">Geography & Demographic Growth</h3>
                                <p class="text-lg leading-relaxed mb-4">
                                    Covering approximately 838 square kilometres, Langtang South shares boundaries with Langtang North, Wase and Shendam Local Government Areas of Plateau State, as well as communities towards Wukari in Taraba State. The area is characterised by fertile plains and hills, with agriculture serving as a major source of livelihood for its people.
                                </p>
                                <p class="text-lg leading-relaxed mb-6">
                                    According to the 2006 National Population Census, Langtang South had a population of 105,173 people. Over the years, the Local Government has grown through the contributions of its traditional institutions, community leaders, public servants and citizens. Today, Langtang South remains a vibrant and culturally rich community, committed to sustainable development, effective grassroots governance and the wellbeing of its people.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
