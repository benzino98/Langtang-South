<x-public-layout>
    {{-- Hero Section --}}
    <x-hero-banner
        eyebrow="LANGTANG SOUTH LOCAL GOVERNMENT COUNCIL"
        title="Welcome to Langtang South"
        subtitle="Serving the people of Langtang South with transparency, integrity, and dedication. Explore our departments, projects, news, and services."
        ctaText="Learn More About Us"
        :ctaLink="url('/about')"
        secondaryCtaText="Contact Us"
        :secondaryCtaLink="url('/contact')"
    />

    {{-- Announcements / Notice Bar --}}
    @if($announcements->isNotEmpty())
        <x-notice-bar
            title="{{ $announcements->first()->title }}"
            description="{{ $announcements->first()->description }}"
            link="{{ $announcements->first()->attachment_path ? asset('storage/' . $announcements->first()->attachment_path) : null }}"
            :isImportant="false"
        />
    @endif

    {{-- Quick Links Section --}}
    <section class="py-16 md:py-24 bg-light-gray relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="section-title">Quick Services</h2>
                <p class="section-subtitle">Access the most commonly used resources and information quickly.</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
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
                       class="card group flex flex-col items-center justify-center p-6 text-center border-b-4 border-b-transparent hover:border-b-primary-green transition-all duration-300">
                        <div class="w-14 h-14 bg-green-50 group-hover:bg-primary-green rounded-2xl flex items-center justify-center mb-4 transition-colors duration-300">
                            <svg class="w-7 h-7 text-primary-green group-hover:text-white transition-colors duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $link['icon'] }}" />
                            </svg>
                        </div>
                        <span class="text-sm font-bold text-gray-900 group-hover:text-primary-green transition-colors duration-300">
                            {{ $link['title'] }}
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Welcome / Introduction Section --}}
    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="font-heading text-primary-green font-bold tracking-wider text-sm uppercase mb-3">Welcome</h2>
                    <h3 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-6 leading-tight">Langtang South Local Government Council</h3>
                    <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                        Langtang South Local Government Area is dedicated to enhancing the quality of life for all its residents through effective governance, sustainable development, and community empowerment.
                    </p>
                    <div class="grid grid-cols-2 gap-6 mb-8">
                        <div>
                            <h4 class="font-bold text-gray-900 text-3xl mb-1">12</h4>
                            <p class="text-sm text-gray-500 font-semibold uppercase tracking-wider">Wards</p>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-3xl mb-1">Est. 1996</h4>
                            <p class="text-sm text-gray-500 font-semibold uppercase tracking-wider">Founded</p>
                        </div>
                    </div>
                    <a href="{{ url('/about') }}" class="btn-outline inline-flex group">
                        Read Our History
                        <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
                <div class="relative">
                    <div class="aspect-[4/3] rounded-2xl overflow-hidden shadow-elevated">
                        <img src="https://images.unsplash.com/photo-1541872703-74c5e44368f9?q=80&w=800&auto=format&fit=crop" alt="Council Headquarters" class="w-full h-full object-cover">
                    </div>
                    <div class="absolute -bottom-6 -left-6 bg-gold-accent text-white p-6 rounded-2xl shadow-lg hidden md:block">
                        <svg class="w-10 h-10 mb-2 opacity-80" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                        </svg>
                        <p class="font-bold text-xl leading-tight">Unity &<br>Progress</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Latest News Section (Editorial Layout) --}}
    <section class="py-16 md:py-24 bg-light-gray">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-end justify-between mb-12">
                <div>
                    <h2 class="section-title">Latest Updates</h2>
                    <p class="section-subtitle !ml-0">Stay informed with the newest announcements and events from the Council.</p>
                </div>
                <a href="{{ route('news.index') }}" class="hidden sm:inline-flex items-center text-primary-green font-bold hover:text-primary-green-dark transition-colors">
                    View All News
                    <svg class="ml-1.5 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>

            @if($latestNews->isNotEmpty())
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                    {{-- Featured Article (Large) --}}
                    @php $featured = $latestNews->first(); @endphp
                    <div class="lg:col-span-7">
                        <a href="{{ route('news.show', $featured->slug) }}" class="group block h-full">
                            <div class="card h-full flex flex-col">
                                <div class="aspect-[16/9] relative overflow-hidden">
                                    <img src="{{ $featured->featured_image ? asset('storage/' . $featured->featured_image) : 'https://images.unsplash.com/photo-1541872703-74c5e44368f9?q=80&w=800&auto=format&fit=crop' }}" 
                                         alt="{{ $featured->title }}" 
                                         class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                                    <div class="absolute top-4 left-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-gold-accent text-white shadow-sm">
                                            {{ $featured->category ? $featured->category->name : 'Featured' }}
                                        </span>
                                    </div>
                                </div>
                                <div class="p-8 flex-1 flex flex-col justify-center">
                                    <div class="flex items-center text-sm text-gray-500 mb-3 font-medium">
                                        <svg class="w-4 h-4 mr-1.5 text-primary-green" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        {{ $featured->published_at ? $featured->published_at->format('F d, Y') : $featured->created_at->format('F d, Y') }}
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-primary-green transition-colors">{{ $featured->title }}</h3>
                                    <p class="text-gray-600 mb-6 line-clamp-3 text-lg">{{ $featured->summary }}</p>
                                    <span class="inline-flex items-center text-primary-green font-bold mt-auto group-hover:text-primary-green-dark">
                                        Read Full Story
                                        <svg class="ml-1.5 w-4 h-4 transform group-hover:translate-x-1 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>

                    {{-- Secondary Articles (Small, Stacked) --}}
                    <div class="lg:col-span-5 flex flex-col gap-8">
                        @foreach($latestNews->skip(1)->take(2) as $article)
                            <a href="{{ route('news.show', $article->slug) }}" class="group block h-full">
                                <div class="card flex flex-col sm:flex-row h-full">
                                    <div class="sm:w-2/5 aspect-[4/3] sm:aspect-auto relative overflow-hidden shrink-0">
                                        <img src="{{ $article->featured_image ? asset('storage/' . $article->featured_image) : 'https://images.unsplash.com/photo-1541872703-74c5e44368f9?q=80&w=400&auto=format&fit=crop' }}" 
                                             alt="{{ $article->title }}" 
                                             class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="p-6 flex-1 flex flex-col">
                                        <div class="text-xs font-bold text-gold-accent uppercase tracking-wider mb-2">
                                            {{ $article->category ? $article->category->name : 'News' }}
                                        </div>
                                        <h3 class="text-lg font-bold text-gray-900 mb-3 group-hover:text-primary-green transition-colors line-clamp-2">{{ $article->title }}</h3>
                                        <div class="flex items-center text-xs text-gray-500 font-medium mt-auto">
                                            <svg class="w-3.5 h-3.5 mr-1 text-primary-green" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            {{ $article->published_at ? $article->published_at->format('M d, Y') : $article->created_at->format('M d, Y') }}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="text-center py-12 bg-white rounded-2xl shadow-sm border border-gray-100">
                    <p class="text-gray-500 text-lg">No news articles published yet. Stay tuned!</p>
                </div>
            @endif

            <div class="mt-10 sm:hidden text-center">
                <a href="{{ route('news.index') }}" class="btn-outline w-full">
                    View All News
                </a>
            </div>
        </div>
    </section>

    {{-- Upcoming Events Section --}}
    <section class="py-16 bg-white border-y border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="section-title">Upcoming Events</h2>
                <p class="section-subtitle">Mark your calendars for these important council and community events.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($upcomingEvents as $event)
                    <div class="card p-6 flex items-start gap-5">
                        <div class="flex-shrink-0 w-16 h-20 bg-green-50 rounded-xl border border-primary-green/20 flex flex-col overflow-hidden">
                            <div class="bg-primary-green text-white text-xs font-bold uppercase tracking-wider py-1 text-center">
                                {{ $event->event_date->format('M') }}
                            </div>
                            <div class="flex-1 flex items-center justify-center text-2xl font-bold text-gray-900 font-heading">
                                {{ $event->event_date->format('d') }}
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="font-bold text-gray-900 mb-2 truncate text-lg" title="{{ $event->title }}">{{ $event->title }}</h3>
                            <div class="flex items-start text-sm text-gray-600 mb-2">
                                <svg class="w-4 h-4 mr-1.5 mt-0.5 shrink-0 text-primary-green" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ $event->event_date->format('h:i A') }}</span>
                            </div>
                            <div class="flex items-start text-sm text-gray-600">
                                <svg class="w-4 h-4 mr-1.5 mt-0.5 shrink-0 text-primary-green" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span class="truncate">{{ $event->venue }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-8">
                        <p class="text-gray-500">No upcoming events scheduled at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Emergency Contacts Section --}}
    <section class="py-16 md:py-24 bg-primary-green relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <svg class="absolute h-full w-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <pattern id="grid-pattern" width="20" height="20" patternUnits="userSpaceOnUse">
                    <rect width="20" height="20" fill="none" stroke="currentColor" stroke-width="1" />
                </pattern>
                <rect width="100%" height="100%" fill="url(#grid-pattern)" />
            </svg>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="font-heading text-3xl md:text-4xl font-bold text-white mb-4">Emergency Contacts</h2>
                <p class="text-lg text-green-100 max-w-2xl mx-auto">Important contact numbers for emergencies and essential services available 24/7.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                @php
                    $emergencyContacts = [
                        ['name' => 'Police', 'phone' => '112', 'icon' => 'M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z'],
                        ['name' => 'Fire Service', 'phone' => '112', 'icon' => 'M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z'],
                        ['name' => 'Ambulance', 'phone' => '112', 'icon' => 'M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z'],
                        ['name' => 'Council HQ', 'phone' => '+234 800 000 0000', 'icon' => 'M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819'],
                    ];
                @endphp
                @foreach($emergencyContacts as $contact)
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 text-center border border-white/20 hover:bg-white/20 hover:-translate-y-1 transition-all duration-300">
                        <div class="w-16 h-16 bg-white text-primary-green rounded-full flex items-center justify-center mx-auto mb-5 shadow-lg">
                            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $contact['icon'] }}" />
                            </svg>
                        </div>
                        <h3 class="font-heading font-bold text-white mb-2 text-xl">{{ $contact['name'] }}</h3>
                        <a href="tel:{{ $contact['phone'] }}" class="text-gold-accent font-bold hover:text-white transition-colors text-lg inline-flex items-center">
                            {{ $contact['phone'] }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-public-layout>
