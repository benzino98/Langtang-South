<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h2 class="section-title font-heading text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                            Welcome to your dashboard
                        </h2>
                        <p class="section-subtitle text-lg text-gray-600 max-w-2xl mx-auto">
                            Your comprehensive overview of council operations and performance metrics.
                        </p>
                    </div>
                    
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                        @php
                        $quickStats = [
                            [
                                'title' => 'Active Users',
                                'value' => 1543,
                                'icon' => 'users',
                            ],
                            [
                                'title' => 'Active Projects',
                                'value' => 87,
                                'icon' => 'projects',
                            ],
                            [
                                'title' => 'News Items',
                                'value' => 23,
                                'icon' => 'news',
                            ],
                            [
                                'title' => 'Events This Month',
                                'value' => 12,
                                'icon' => 'calendar',
                            ],
                            [
                                'title' => 'Pending Requests',
                                'value' => 5,
                                'icon' => 'messages',
                            ],
                            [
                                'title' => 'Active Users',
                                'value' => 1543,
                                'icon' => 'users',
                            ],
                        ];
                        
                        @foreach($quickStats as $stat)
                        <div class="card">
                            <div class="stat-card">
                                <div class="flex items-start">
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">
                                            {{ $stat['title'] }}
                                        </p>
                                        <p class="text-3xl font-bold text-gray-900 mt-1">
                                            {{ $stat['value'] }}
                                        </p>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-primary-green/10 text-primary-green">
                                            <x-icon :name="$stat['icon']" class="h-6 w-6" />
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
