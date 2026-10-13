<x-public-layout>
    {{-- Page Header --}}
    <x-hero-banner
        :compact="true"
        eyebrow="LANGTANG SOUTH LOCAL GOVERNMENT COUNCIL"
        title="Public Notices & Announcements"
        subtitle="Stay informed on official announcements, notices, and publications from Langtang South Local Government Council."
    />

    <div class="py-12 bg-light-gray min-h-[60vh]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-6">
                @forelse($notices as $notice)
                    <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-start justify-between flex-wrap gap-4">
                            <div class="flex-grow">
                                <div class="flex items-center space-x-2 mb-2">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full bg-primary-green/10 text-primary-green text-xs font-bold uppercase tracking-wider">
                                        Notice
                                    </span>
                                    <span class="text-xs text-gray-500">
                                        Published {{ $notice->published_at ? $notice->published_at->format('M d, Y') : $notice->created_at->format('M d, Y') }}
                                    </span>
                                </div>
                                <h2 class="font-heading text-xl font-bold text-gray-900 mb-3">{{ $notice->title }}</h2>
                                <p class="text-sm text-gray-600 leading-relaxed mb-4 whitespace-pre-line">{{ $notice->description }}</p>
                                
                                @if($notice->attachment_path)
                                    <div class="flex items-center space-x-2 mt-4 pt-4 border-t border-gray-100">
                                        <svg class="w-5 h-5 text-primary-green" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                        </svg>
                                        <a href="{{ asset('storage/' . $notice->attachment_path) }}" target="_blank" class="text-sm font-semibold text-primary-green hover:underline">
                                            Download Notice Attachment
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-white rounded-xl shadow-sm p-12 text-center">
                        <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                        </svg>
                        <h3 class="font-heading font-semibold text-gray-900 text-lg mb-1">No Active Notices</h3>
                        <p class="text-gray-500">There are no announcements or notices currently active. Please check back later.</p>
                    </div>
                @endforelse

                {{-- Pagination Links --}}
                <div class="mt-8">
                    {{ $notices->links() }}
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
