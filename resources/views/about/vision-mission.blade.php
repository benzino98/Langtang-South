<x-public-layout>
    {{-- Page Header --}}
    <x-hero-banner
        title="Vision & Mission"
        subtitle="Understand the goals and guiding values that drive the Langtang Council administration."
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
                    <div class="bg-white rounded-xl shadow-sm p-6 sm:p-10 space-y-10">
                        {{-- Vision --}}
                        <div class="border-b pb-8">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="w-10 h-10 bg-primary-green/10 rounded-lg flex items-center justify-center text-primary-green">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.43 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </div>
                                <h2 class="font-heading text-2xl font-bold text-gray-900">Our Vision</h2>
                            </div>
                            <p class="text-lg leading-relaxed text-gray-600 pl-13">
                                To build a peaceful, secure, and socio-economically prosperous local government council where every citizen has access to basic amenities, equal opportunities, and inclusive governance.
                            </p>
                        </div>
                        
                        {{-- Mission --}}
                        <div class="border-b pb-8">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="w-10 h-10 bg-gold-accent/10 rounded-lg flex items-center justify-center text-gold-accent">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                                    </svg>
                                </div>
                                <h2 class="font-heading text-2xl font-bold text-gray-900">Our Mission</h2>
                            </div>
                            <p class="text-lg leading-relaxed text-gray-600 pl-13">
                                To diligently administer services with transparency, foster community partnerships, optimize local agricultural potential, implement vital infrastructural projects, and actively listen to and serve the people of Langtang.
                            </p>
                        </div>

                        {{-- Core Values --}}
                        <div>
                            <div class="flex items-center space-x-3 mb-6">
                                <div class="w-10 h-10 bg-primary-green/10 rounded-lg flex items-center justify-center text-primary-green">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                                    </svg>
                                </div>
                                <h2 class="font-heading text-2xl font-bold text-gray-900">Core Values</h2>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pl-0 md:pl-13">
                                <div class="bg-light-gray p-5 rounded-xl text-center">
                                    <h4 class="font-heading font-bold text-gray-900 mb-2">Transparency</h4>
                                    <p class="text-sm text-gray-500">Being completely open and accountable to the citizens in all official decisions and allocations.</p>
                                </div>
                                <div class="bg-light-gray p-5 rounded-xl text-center">
                                    <h4 class="font-heading font-bold text-gray-900 mb-2">Integrity</h4>
                                    <p class="text-sm text-gray-500">Upholding strict ethical standards and dedication to public service above personal interests.</p>
                                </div>
                                <div class="bg-light-gray p-5 rounded-xl text-center">
                                    <h4 class="font-heading font-bold text-gray-900 mb-2">Equity</h4>
                                    <p class="text-sm text-gray-500">Ensuring fair distribution of development resources and opportunities across all electoral wards.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
