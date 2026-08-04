<x-public-layout>
    {{-- Page Header --}}
    <x-hero-banner
        title="History of Langtang"
        subtitle="Discover the heritage, origins, and administrative evolution of Langtang."
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
                        <h2 class="font-heading text-2xl font-bold text-gray-900 mb-6 border-b pb-4">Our History & Heritage</h2>
                        
                        <div class="prose max-w-none text-gray-600 space-y-6">
                            <p class="text-lg leading-relaxed text-gray-700">
                                Langtang has a rich history that dates back several generations. The people of Langtang (predominantly the Tarok nation) are known for their resilience, agricultural skill, bravery, and significant contribution to national peace and security.
                            </p>
                            
                            <h3 class="font-heading text-xl font-bold text-gray-900 mt-8">Administrative Evolution</h3>
                            <p>
                                Originally part of the larger administrative zones in the colonial and post-colonial eras, Langtang Local Government Council was established to bring governance closer to the local population. Over the decades, it has evolved into a hub of cultural preservation and socio-economic development in the southern zone of Plateau State.
                            </p>
                            
                            <h3 class="font-heading text-xl font-bold text-gray-900 mt-8">Cultural Legacy</h3>
                            <p>
                                The Tarok people celebrate a variety of traditional festivals that highlight their unity, history, and agricultural prowess. These festivals serve as a gathering point for citizens from across the country and visitors globally, showcasing the unique traditional dances, attire, and oral history of the region.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
