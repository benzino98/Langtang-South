{{--
    Public Navigation Component
    
    A responsive navigation bar for the public-facing pages.
    Includes the council logo/name, primary navigation links,
    and a mobile hamburger menu toggle using Alpine.js.
--}}
<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            {{-- Logo & Site Name --}}
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-primary-green rounded-full flex items-center justify-center">
                        <span class="text-white font-heading font-bold text-lg">L</span>
                    </div>
                    <span class="font-heading font-bold text-primary-green text-lg hidden sm:block">
                        Langtang Council
                    </span>
                </a>
            </div>

            {{-- Desktop Navigation Links --}}
            <div class="hidden md:flex md:items-center md:space-x-1">
                <a href="{{ url('/') }}"
                   class="px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200
                          {{ request()->is('/') ? 'text-primary-green bg-green-50 font-semibold' : 'text-gray-700 hover:text-primary-green hover:bg-green-50' }}">
                    Home
                </a>
                <a href="{{ url('/about') }}"
                   class="px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200
                          {{ request()->is('about*') ? 'text-primary-green bg-green-50 font-semibold' : 'text-gray-700 hover:text-primary-green hover:bg-green-50' }}">
                    About
                </a>
                <a href="{{ url('/departments') }}"
                   class="px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200
                          {{ request()->is('departments*') ? 'text-primary-green bg-green-50 font-semibold' : 'text-gray-700 hover:text-primary-green hover:bg-green-50' }}">
                    Departments
                </a>
                <a href="{{ url('/news') }}"
                   class="px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200
                          {{ request()->is('news*') ? 'text-primary-green bg-green-50 font-semibold' : 'text-gray-700 hover:text-primary-green hover:bg-green-50' }}">
                    News
                </a>
                <a href="{{ url('/projects') }}"
                   class="px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200
                          {{ request()->is('projects*') ? 'text-primary-green bg-green-50 font-semibold' : 'text-gray-700 hover:text-primary-green hover:bg-green-50' }}">
                    Projects
                </a>
                <a href="{{ url('/gallery') }}"
                   class="px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200
                          {{ request()->is('gallery*') ? 'text-primary-green bg-green-50 font-semibold' : 'text-gray-700 hover:text-primary-green hover:bg-green-50' }}">
                    Gallery
                </a>
                <a href="{{ url('/downloads') }}"
                   class="px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200
                          {{ request()->is('downloads*') ? 'text-primary-green bg-green-50 font-semibold' : 'text-gray-700 hover:text-primary-green hover:bg-green-50' }}">
                    Downloads
                </a>
                <a href="{{ url('/contact') }}"
                   class="px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200
                          {{ request()->is('contact*') ? 'text-primary-green bg-green-50 font-semibold' : 'text-gray-700 hover:text-primary-green hover:bg-green-50' }}">
                    Contact
                </a>
                <a href="{{ route('search') }}"
                   class="ml-2 inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:text-primary-green hover:bg-green-50 transition-colors duration-200"
                   aria-label="Search the website">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </a>
            </div>

            {{-- Mobile Menu Button --}}
            <div class="flex items-center md:hidden">
                <button @click="open = !open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:text-primary-green hover:bg-green-50 transition-colors duration-200"
                        aria-label="Toggle navigation">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
         x-transition:enter-start="opacity-0 -translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-1"
         x-cloak
         class="md:hidden border-t border-gray-200 bg-white">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ url('/') }}"
               class="block px-3 py-2 rounded-md text-base font-medium {{ request()->is('/') ? 'text-primary-green bg-green-50' : 'text-gray-700 hover:text-primary-green hover:bg-green-50' }}">
                Home
            </a>
            <a href="{{ url('/about') }}"
               class="block px-3 py-2 rounded-md text-base font-medium {{ request()->is('about*') ? 'text-primary-green bg-green-50' : 'text-gray-700 hover:text-primary-green hover:bg-green-50' }}">
                About
            </a>
            <a href="{{ url('/departments') }}"
               class="block px-3 py-2 rounded-md text-base font-medium {{ request()->is('departments*') ? 'text-primary-green bg-green-50' : 'text-gray-700 hover:text-primary-green hover:bg-green-50' }}">
                Departments
            </a>
            <a href="{{ url('/news') }}"
               class="block px-3 py-2 rounded-md text-base font-medium {{ request()->is('news*') ? 'text-primary-green bg-green-50' : 'text-gray-700 hover:text-primary-green hover:bg-green-50' }}">
                News
            </a>
            <a href="{{ url('/projects') }}"
               class="block px-3 py-2 rounded-md text-base font-medium {{ request()->is('projects*') ? 'text-primary-green bg-green-50' : 'text-gray-700 hover:text-primary-green hover:bg-green-50' }}">
                Projects
            </a>
            <a href="{{ url('/gallery') }}"
               class="block px-3 py-2 rounded-md text-base font-medium {{ request()->is('gallery*') ? 'text-primary-green bg-green-50' : 'text-gray-700 hover:text-primary-green hover:bg-green-50' }}">
                Gallery
            </a>
            <a href="{{ url('/downloads') }}"
               class="block px-3 py-2 rounded-md text-base font-medium {{ request()->is('downloads*') ? 'text-primary-green bg-green-50' : 'text-gray-700 hover:text-primary-green hover:bg-green-50' }}">
                Downloads
            </a>
            <a href="{{ url('/contact') }}"
               class="block px-3 py-2 rounded-md text-base font-medium {{ request()->is('contact*') ? 'text-primary-green bg-green-50' : 'text-gray-700 hover:text-primary-green hover:bg-green-50' }}">
                Contact
            </a>
            <div class="px-3 py-2">
                <form action="{{ route('search') }}" method="GET" class="flex items-center">
                    <input type="search" name="q" placeholder="Search..."
                           class="w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-green focus:ring-primary-green text-sm">
                </form>
            </div>
        </div>
    </div>
</nav>
