<!-- Sidebar -->
<aside
    class="flex-shrink-0 hidden w-64 bg-white border-r-2 border-green-50/50 md:block"
    aria-label="Sidebar"
>
    <div class="flex flex-col h-full">
        <!-- Logo -->
        <div class="flex items-center justify-center h-20 border-b">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2">
                <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}" class="h-8">
                <span class="font-heading font-bold text-lg text-gray-800">Admin Panel</span>
            </a>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-4 py-4 space-y-2 overflow-y-auto">
            <x-admin.nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" icon="dashboard">
                Dashboard
            </x-admin.nav-link>

            <p class="px-4 pt-4 font-sans text-xs font-semibold text-gray-400 uppercase">Content Management</p>
            <x-admin.nav-link :href="route('admin.news-articles.index')" :active="request()->routeIs('admin.news-articles.*') || request()->routeIs('admin.news-categories.*')" icon="news">News Articles</x-admin.nav-link>
            <x-admin.nav-link :href="route('admin.projects.index')" :active="request()->routeIs('admin.projects.*')" icon="projects">Projects</x-admin.nav-link>
            <x-admin.nav-link :href="route('admin.gallery-albums.index')" :active="request()->routeIs('admin.gallery-albums.*') || request()->routeIs('admin.gallery-images.*')" icon="gallery">Gallery</x-admin.nav-link>
            <x-admin.nav-link :href="route('admin.documents.index')" :active="request()->routeIs('admin.documents.*') || request()->routeIs('admin.document-categories.*')" icon="downloads">Downloads</x-admin.nav-link>

            <p class="px-4 pt-4 font-sans text-xs font-semibold text-gray-400 uppercase">Council</p>
            <x-admin.nav-link :href="route('admin.departments.index')" :active="request()->routeIs('admin.departments.*')" icon="departments">Departments</x-admin.nav-link>
            <x-admin.nav-link :href="route('admin.leadership.index')" :active="request()->routeIs('admin.leadership.*')" icon="leadership">Leadership</x-admin.nav-link>
            <x-admin.nav-link :href="route('admin.public-notices.index')" :active="request()->routeIs('admin.public-notices.*')" icon="notices">Public Notices</x-admin.nav-link>

            <p class="px-4 pt-4 font-sans text-xs font-semibold text-gray-400 uppercase">Administration</p>
            <x-admin.nav-link :href="route('admin.contact-messages.index')" :active="request()->routeIs('admin.contact-messages.*')" icon="messages">Messages</x-admin.nav-link>
            <x-admin.nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')" icon="users">Users</x-admin.nav-link>
            <x-admin.nav-link :href="route('admin.settings.edit')" :active="request()->routeIs('admin.settings.*')" icon="settings">Settings</x-admin.nav-link>
        </nav>

        <!-- Sidebar footer -->
        <div class="flex-shrink-0 px-4 py-4 border-t">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-admin.nav-link
                    :href="route('logout')"
                    onclick="event.preventDefault(); this.closest('form').submit();"
                    icon="logout"
                >
                    Logout
                </x-admin.nav-link>
            </form>
        </div>
    </div>
</aside>
