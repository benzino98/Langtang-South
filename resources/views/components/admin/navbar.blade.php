<nav class="bg-white shadow-sm border-b-2 border-green-50/50">
    <div class="px-6">
        <div class="relative flex items-center justify-between h-16">
            <!-- Hamburger button -->
            <button
                @click="sidebarOpen = !sidebarOpen"
                class="text-gray-500 focus:outline-none focus:text-gray-700 md:hidden"
            >
                <svg
                    class="w-6 h-6"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M4 6H20M4 12H20M4 18H20"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    ></path>
                </svg>
            </button>

            <!-- Search bar -->
            <div class="relative w-full max-w-xs text-gray-400 focus-within:text-gray-600">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input
                    class="block w-full py-2 pl-10 pr-3 text-sm placeholder-gray-500 bg-gray-100 border border-transparent rounded-lg focus:outline-none focus:bg-white focus:border-primary-green focus:ring-primary-green"
                    placeholder="Search..."
                    aria-label="Search"
                />
            </div>

            <!-- Right side -->
            <div class="flex items-center">
                <div class="relative">
                    <button class="flex items-center text-sm focus:outline-none">
                        <span class="mr-3 font-semibold text-gray-700">{{ Auth::user()->name }}</span>
                        <img
                            class="w-8 h-8 rounded-full"
                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=EBF4FF&color=0D6EFD"
                            alt="Avatar"
                        />
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>
