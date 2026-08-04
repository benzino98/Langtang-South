<x-public-layout>
    {{-- Hero Section --}}
    <x-hero-banner
        title="Welcome to Langtang Local Government Council"
        subtitle="Serving the people of Langtang with transparency, integrity, and dedication. Explore our departments, projects, news, and services."
        ctaText="Learn More About Us"
        ctaLink="{{ url('/about') }}"
    />

    {{-- Quick Links Section --}}
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="font-heading text-3xl font-bold text-gray-900 mb-3">Quick Links</h2>
                <p class="text-gray-500 max-w-2xl mx-auto">Access the most commonly used resources and information quickly.</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                @php
                    $quickLinks = [
                        ['title' => 'About Council', 'icon' => 'M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z'],
                        ['title' => 'Departments', 'icon' => 'M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3H21m-3.75 3H21'],
                        ['title' => 'News', 'icon' => 'M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z'],
                        ['title' => 'Projects', 'icon' => 'M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0'],
                        ['title' => 'Downloads', 'icon' => 'M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3'],
                        ['title' => 'Contact', 'icon' => 'M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z'],
                    ];
                @endphp

                @foreach($quickLinks as $link)
                    <a href="{{ url('/' . Str::slug($link['title'])) }}"
                       class="group flex flex-col items-center justify-center p-6 bg-light-gray rounded-xl hover:bg-primary-green transition-all duration-300 text-center">
                        <div class="w-12 h-12 bg-primary-green/10 group-hover:bg-white/20 rounded-full flex items-center justify-center mb-3 transition-colors duration-300">
                            <svg class="w-6 h-6 text-primary-green group-hover:text-white transition-colors duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $link['icon'] }}" />
                            </svg>
                        </div>
                        <span class="text-sm font-semibold text-gray-700 group-hover:text-white transition-colors duration-300">
                            {{ $link['title'] }}
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Announcements / Notice Bar --}}
    <section class="bg-gold-accent">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <div class="flex flex-col sm:flex-row items-center justify-center gap-2 text-sm">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full bg-primary-green text-white text-xs font-bold uppercase tracking-wider">
                    Notice
                </span>
                <p class="text-gray-900 font-medium text-center sm:text-left">
                    Public holiday declared on Friday, 15 August 2026. All council offices will be closed.
                </p>
            </div>
        </div>
    </section>

    {{-- Latest News Section --}}
    <section class="py-16 bg-light-gray">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-end justify-between mb-10">
                <div>
                    <h2 class="font-heading text-3xl font-bold text-gray-900 mb-2">Latest News</h2>
                    <p class="text-gray-500">Stay updated with the latest developments from the Council.</p>
                </div>
                <a href="{{ url('/news') }}" class="hidden sm:inline-flex items-center text-primary-green font-semibold hover:underline text-sm">
                    View All News
                    <svg class="ml-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                {{-- News cards will be populated from the database in Phase 3 --}}
                @for($i = 0; $i < 3; $i++)
                    <x-card title="Council Approves New Community Development Plan"
                            subtitle="Council News · Aug 1, 2026"
                            href="{{ url('/news') }}"
                            badge="New"
                            badgeColor="bg-gold-accent">
                        <p class="text-sm text-gray-500 mb-4">
                            The Council has approved a comprehensive development plan aimed at improving
                            infrastructure across all wards in the Langtang local government area.
                        </p>
                        <a href="{{ url('/news') }}" class="inline-flex items-center text-sm font-semibold text-primary-green hover:underline">
                            Read More
                            <svg class="ml-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    </x-card>
                @endfor
            </div>
            <div class="mt-8 sm:hidden text-center">
                <a href="{{ url('/news') }}" class="inline-flex items-center text-primary-green font-semibold hover:underline text-sm">
                    View All News
                    <svg class="ml-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- Upcoming Events Section --}}
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="font-heading text-3xl font-bold text-gray-900 mb-3">Upcoming Events</h2>
                <p class="text-gray-500 max-w-2xl mx-auto">Mark your calendars for these important council and community events.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @php
                    $events = [
                        ['date' => 'Aug 15', 'title' => 'Monthly Council Meeting', 'venue' => 'Council Secretariat Hall'],
                        ['date' => 'Aug 22', 'title' => 'Community Health Outreach', 'venue' => 'Langtang General Hospital'],
                        ['date' => 'Sep 05', 'title' => 'Farmers Empowerment Forum', 'venue' => 'Langtang Town Hall'],
                    ];
                @endphp
                @foreach($events as $event)
                    <div class="bg-light-gray rounded-xl p-6 hover:shadow-md transition-shadow duration-300 flex items-start space-x-4">
                        <div class="flex-shrink-0 w-16 h-16 bg-primary-green rounded-lg flex flex-col items-center justify-center text-white">
                            <span class="text-lg font-heading font-bold leading-none">{{ explode(' ', $event['date'])[1] }}</span>
                            <span class="text-xs uppercase tracking-wider mt-1">{{ explode(' ', $event['date'])[0] }}</span>
                        </div>
                        <div>
                            <h3 class="font-heading font-semibold text-gray-900 mb-1">{{ $event['title'] }}</h3>
                            <p class="text-sm text-gray-500 flex items-center">
                                <svg class="w-4 h-4 mr-1 text-primary-green" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                                {{ $event['venue'] }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Emergency Contacts Section --}}
    <section class="py-16 bg-primary-green">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="font-heading text-3xl font-bold text-white mb-3">Emergency Contacts</h2>
                <p class="text-green-100 max-w-2xl mx-auto">Important contact numbers for emergencies and essential services.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $emergencyContacts = [
                        ['name' => 'Police', 'phone' => '199', 'icon' => 'M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z'],
                        ['name' => 'Fire Service', 'phone' => '112', 'icon' => 'M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z'],
                        ['name' => 'Ambulance', 'phone' => '118', 'icon' => 'M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z'],
                        ['name' => 'Council HQ', 'phone' => '+234 800 000 0000', 'icon' => 'M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819'],
                    ];
                @endphp
                @foreach($emergencyContacts as $contact)
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center hover:bg-white/20 transition-colors duration-300">
                        <div class="w-14 h-14 bg-gold-accent rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-7 h-7 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $contact['icon'] }}" />
                            </svg>
                        </div>
                        <h3 class="font-heading font-semibold text-white mb-1">{{ $contact['name'] }}</h3>
                        <a href="tel:{{ $contact['phone'] }}" class="text-gold-accent font-semibold hover:underline text-sm">
                            {{ $contact['phone'] }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-public-layout>
