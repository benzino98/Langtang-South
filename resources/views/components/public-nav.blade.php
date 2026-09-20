{{--
    Public Navigation Component
    
    A responsive navigation bar for the public-facing pages.
    Includes the council logo/name, primary navigation links,
    and a mobile hamburger menu toggle using Alpine.js.
--}}
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            {{-- Logo & Site Name --}}
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="flex items-center space-x-3 group">
                    <div class="w-12 h-12 bg-primary-green rounded-full flex items-center justify-center shadow-sm group-hover:bg-primary-green-dark transition-colors duration-200">
                        <span class="text-white font-heading font-bold text-xl">LS</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-heading font-bold text-primary-green text-lg leading-tight hidden md:block">
                            Langtang South Local Government Council
                        </span>
                        <span class="font-heading font-bold text-primary-green text-lg leading-tight md:hidden">
                            Langtang South LGC
                        </span>
                    </div>
                </a>
            </div>

            {{-- Desktop Navigation Links --}}
            <div class="hidden lg:flex lg:items-center lg:space-x-1">
                <a href="{{ url('/') }}"
                   class="px-3 py-2 rounded-md text-sm font-semibold transition-all duration-200
                          {{ request()->is('/') ? 'text-primary-green bg-green-50/80 shadow-inner' : 'text-gray-600 hover:text-primary-green hover:bg-gray-50' }}">
                    Home
                </a>
                <a href="{{ url('/about') }}"
                   class="px-3 py-2 rounded-md text-sm font-semibold transition-all duration-200
                          {{ request()->is('about*') ? 'text-primary-green bg-green-50/80 shadow-inner' : 'text-gray-600 hover:text-primary-green hover:bg-gray-50' }}">
                    About
                </a>
                <a href="{{ url('/departments') }}"
                   class="px-3 py-2 rounded-md text-sm font-semibold transition-all duration-200
                          {{ request()->is('departments*') ? 'text-primary-green bg-green-50/80 shadow-inner' : 'text-gray-600 hover:text-primary-green hover:bg-gray-50' }}">
                    Departments
                </a>
                <a href="{{ url('/news') }}"
                   class="px-3 py-2 rounded-md text-sm font-semibold transition-all duration-200
                          {{ request()->is('news*') ? 'text-primary-green bg-green-50/80 shadow-inner' : 'text-gray-600 hover:text-primary-green hover:bg-gray-50' }}">
                    News
                </a>
                <a href="{{ url('/projects') }}"
                   class="px-3 py-2 rounded-md text-sm font-semibold transition-all duration-200
                          {{ request()->is('projects*') ? 'text-primary-green bg-green-50/80 shadow-inner' : 'text-gray-600 hover:text-primary-green hover:bg-gray-50' }}">
                    Projects
                </a>
                <a href="{{ url('/gallery') }}"
                   class="px-3 py-2 rounded-md text-sm font-semibold transition-all duration-200
                          {{ request()->is('gallery*') ? 'text-primary-green bg-green-50/80 shadow-inner' : 'text-gray-600 hover:text-primary-green hover:bg-gray-50' }}">
                    Gallery
                </a>
                <a href="{{ url('/downloads') }}"
                   class="px-3 py-2 rounded-md text-sm font-semibold transition-all duration-200
                          {{ request()->is('downloads*') ? 'text-primary-green bg-green-50/80 shadow-inner' : 'text-gray-600 hover:text-primary-green hover:bg-gray-50' }}">
                    Downloads
                </a>
                <a href="{{ url('/contact') }}"
                   class="px-3 py-2 rounded-md text-sm font-semibold transition-all duration-200
                          {{ request()->is('contact*') ? 'text-primary-green bg-green-50/80 shadow-inner' : 'text-gray-600 hover:text-primary-green hover:bg-gray-50' }}">
                    Contact
                </a>
                
                <div class="h-6 w-px bg-gray-200 mx-2"></div>
                
                <a href="{{ route('search') }}"
                   class="inline-flex items-center justify-center p-2 rounded-full text-gray-500 hover:text-primary-green hover:bg-green-50 transition-colors duration-200"
                   aria-label="Search the website">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </a>
            </div>

            {{-- Mobile Menu Button --}}
            <div class="flex items-center lg:hidden space-x-2">
                <a href="{{ route('search') }}"
                   class="inline-flex items-center justify-center p-2 rounded-full text-gray-500 hover:text-primary-green hover:bg-green-50 transition-colors duration-200"
                   aria-label="Search the website">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </a>
                <button @click="open = !open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:text-primary-green hover:bg-green-50 transition-colors duration-200 focus:outline-none"
                        aria-label="Toggle navigation"
                        aria-expanded="open"
                        :aria-expanded="open.toString()">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="open" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Navigation Menu --}}
    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         x-cloak
         class="lg:hidden border-t border-gray-200 bg-white absolute w-full shadow-lg">
        <div class="px-4 pt-2 pb-6 space-y-1 max-h-[calc(100vh-5rem)] overflow-y-auto">
            <a href="{{ url('/') }}"
               class="block px-3 py-3 rounded-lg text-base font-semibold {{ request()->is('/') ? 'text-primary-green bg-green-50/80 shadow-sm' : 'text-gray-700 hover:text-primary-green hover:bg-gray-50' }}">
                Home
            </a>
            <a href="{{ url('/about') }}"
               class="block px-3 py-3 rounded-lg text-base font-semibold {{ request()->is('about*') ? 'text-primary-green bg-green-50/80 shadow-sm' : 'text-gray-700 hover:text-primary-green hover:bg-gray-50' }}">
                About
            </a>
            <a href="{{ url('/departments') }}"
               class="block px-3 py-3 rounded-lg text-base font-semibold {{ request()->is('departments*') ? 'text-primary-green bg-green-50/80 shadow-sm' : 'text-gray-700 hover:text-primary-green hover:bg-gray-50' }}">
                Departments
            </a>
            <a href="{{ url('/news') }}"
               class="block px-3 py-3 rounded-lg text-base font-semibold {{ request()->is('news*') ? 'text-primary-green bg-green-50/80 shadow-sm' : 'text-gray-700 hover:text-primary-green hover:bg-gray-50' }}">
                News
            </a>
            <a href="{{ url('/projects') }}"
               class="block px-3 py-3 rounded-lg text-base font-semibold {{ request()->is('projects*') ? 'text-primary-green bg-green-50/80 shadow-sm' : 'text-gray-700 hover:text-primary-green hover:bg-gray-50' }}">
                Projects
            </a>
            <a href="{{ url('/gallery') }}"
               class="block px-3 py-3 rounded-lg text-base font-semibold {{ request()->is('gallery*') ? 'text-primary-green bg-green-50/80 shadow-sm' : 'text-gray-700 hover:text-primary-green hover:bg-gray-50' }}">
                Gallery
            </a>
            <a href="{{ url('/downloads') }}"
               class="block px-3 py-3 rounded-lg text-base font-semibold {{ request()->is('downloads*') ? 'text-primary-green bg-green-50/80 shadow-sm' : 'text-gray-700 hover:text-primary-green hover:bg-gray-50' }}">
                Downloads
            </a>
            <a href="{{ url('/contact') }}"
               class="block px-3 py-3 rounded-lg text-base font-semibold {{ request()->is('contact*') ? 'text-primary-green bg-green-50/80 shadow-sm' : 'text-gray-700 hover:text-primary-green hover:bg-gray-50' }}">
                Contact
            </a>
        </div>
    </div>
</nav>
