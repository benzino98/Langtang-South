<x-public-layout
    :title="$project->title . ' | Langtang South Area Council'"
    :meta-description="\Illuminate\Support\Str::limit(strip_tags($project->description), 160)"
    :og-title="$project->title"
    :og-type="'article'"
    :og-image="$project->featured_image ? asset('storage/' . $project->featured_image) : null"
>
    {{-- Project Header --}}
    <section class="bg-primary-green relative overflow-hidden py-16 sm:py-20">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-gold-accent rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
        </div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="flex items-center justify-center space-x-2 mb-4 text-sm">
                @php
                    $badgeColors = [
                        'planned' => 'bg-blue-600',
                        'ongoing' => 'bg-yellow-600',
                        'completed' => 'bg-green-600',
                    ];
                    $badgeColor = $badgeColors[$project->status] ?? 'bg-gray-600';
                @endphp
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider text-white {{ $badgeColor }}">
                    {{ $project->status }}
                </span>
                <span class="text-green-300">•</span>
                <span class="text-green-100">Community/Ward: {{ $project->community_ward ?? 'N/A' }}</span>
            </div>
            <h1 class="font-heading text-3xl md:text-5xl font-bold text-white leading-tight">
                {{ $project->title }}
            </h1>
        </div>
    </section>

    {{-- Project Content --}}
    <div class="py-12 bg-light-gray min-h-[60vh]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                {{-- Featured Image --}}
                @if($project->featured_image)
                    <div class="aspect-video w-full">
                        <img src="{{ asset('storage/' . $project->featured_image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                    </div>
                @endif

                <div class="p-6 sm:p-10">
                    {{-- Project Description --}}
                    <div class="prose prose-green max-w-none text-gray-600 leading-relaxed">
                        <h2 class="font-heading text-xl font-bold text-gray-900 mb-4 border-b pb-2">Project Description</h2>
                        {!! nl2br(e($project->description)) !!}
                    </div>

                    {{-- Completion Date --}}
                    @if($project->completion_date)
                        <div class="mt-8 pt-6 border-t border-gray-200">
                             <div class="flex items-center space-x-2 text-sm text-gray-600">
                                <svg class="w-5 h-5 text-gold-accent" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0h18" />
                                </svg>
                                <span>Expected Completion: <strong>{{ $project->completion_date->format('F Y') }}</strong></span>
                            </div>
                        </div>
                    @endif

                    {{-- Back Link --}}
                    <div class="mt-10 pt-6 border-t border-gray-200">
                        <a href="{{ route('projects.index') }}" class="inline-flex items-center text-sm font-semibold text-primary-green hover:underline">
                            <svg class="mr-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                            </svg>
                            Back to All Projects
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
