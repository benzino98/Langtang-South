<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-heading text-xl font-bold text-gray-900">Dashboard</h1>
    </x-slot>

    <div class="space-y-6">
        {{-- Stats Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <x-admin.stat-card title="Total Users" :value="$stats['total_users']" icon="users" />
            <x-admin.stat-card title="Total Projects" :value="$stats['total_projects']" icon="projects" />
            <x-admin.stat-card title="News Articles" :value="$stats['total_news']" icon="news" />
            <x-admin.stat-card title="Unread Messages" :value="$stats['unread_messages']" icon="messages" />
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Recent Messages --}}
            <div class="lg:col-span-2 bg-white rounded-xl shadow-sm">
                <div class="border-b p-4">
                    <h2 class="font-heading font-semibold text-gray-900">Recent Messages</h2>
                </div>
                <div class="divide-y">
                    @forelse($recentMessages as $message)
                        <div class="p-4 hover:bg-gray-50 transition-colors duration-200">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="font-semibold text-gray-800">{{ $message->subject }}</p>
                                    <p class="text-sm text-gray-500">From: {{ $message->full_name }} ({{ $message->email }})</p>
                                </div>
                                <span class="text-xs text-gray-400 flex-shrink-0 ml-4">{{ $message->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    @empty
                        <div class="p-6 text-center text-gray-500">
                            No recent messages.
                        </div>
                    @endforelse
                </div>
                <div class="border-t p-3 text-center">
                    <a href="#" class="text-sm font-semibold text-primary-green hover:underline">View All Messages</a>
                </div>
            </div>

            {{-- Recent Projects --}}
            <div class="bg-white rounded-xl shadow-sm">
                <div class="border-b p-4">
                    <h2 class="font-heading font-semibold text-gray-900">Recent Projects</h2>
                </div>
                <div class="divide-y">
                    @forelse($recentProjects as $project)
                        <div class="p-4 hover:bg-gray-50 transition-colors duration-200">
                            <p class="font-semibold text-gray-800 truncate">{{ $project->title }}</p>
                            <div class="flex items-center justify-between text-xs text-gray-500 mt-1">
                                <span>{{ $project->community_ward }}</span>
                                <span class="font-bold uppercase px-2 py-0.5 rounded-full text-white text-[10px]
                                    @switch($project->status)
                                        @case('planned') bg-blue-600 @break
                                        @case('ongoing') bg-yellow-600 @break
                                        @case('completed') bg-green-600 @break
                                    @endswitch">
                                    {{ $project->status }}
                                </span>
                            </div>
                        </div>
                    @empty
                         <div class="p-6 text-center text-gray-500">
                            No recent projects.
                        </div>
                    @endforelse
                </div>
                <div class="border-t p-3 text-center">
                    <a href="#" class="text-sm font-semibold text-primary-green hover:underline">View All Projects</a>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
