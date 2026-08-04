<x-public-layout>
    {{-- Page Header --}}
    <x-hero-banner
        title="Contact Us"
        subtitle="We are here to help. Reach out to the Langtang Local Government Council with your questions, feedback, or inquiries."
    />

    <div class="py-12 bg-light-gray">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-3 lg:gap-8">
                {{-- Contact Information --}}
                <div class="lg:col-span-1 mb-8 lg:mb-0">
                    <div class="bg-white rounded-xl shadow-sm p-6 space-y-6">
                        <h2 class="font-heading text-lg font-bold text-primary-green uppercase tracking-wide border-b pb-3">Contact Information</h2>
                        <div class="space-y-4">
                            {{-- Address --}}
                            <div class="flex items-start space-x-3">
                                <svg class="w-6 h-6 text-gold-accent flex-shrink-0 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                                <div>
                                    <h3 class="text-sm font-semibold text-gray-900">Council Secretariat</h3>
                                    <p class="text-sm text-gray-600">No. 1 Council Drive, Langtang, Plateau State, Nigeria.</p>
                                </div>
                            </div>
                            {{-- Email --}}
                            <div class="flex items-start space-x-3">
                                <svg class="w-6 h-6 text-gold-accent flex-shrink-0 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                                <div>
                                    <h3 class="text-sm font-semibold text-gray-900">General Inquiries</h3>
                                    <a href="mailto:info@langtangcouncil.gov.ng" class="text-sm text-gray-600 hover:underline">info@langtangcouncil.gov.ng</a>
                                </div>
                            </div>
                            {{-- Phone --}}
                            <div class="flex items-start space-x-3">
                                <svg class="w-6 h-6 text-gold-accent flex-shrink-0 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                </svg>
                                <div>
                                    <h3 class="text-sm font-semibold text-gray-900">Phone Support</h3>
                                    <p class="text-sm text-gray-600">+234 (0) 800 000 0000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Contact Form --}}
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-sm p-6 sm:p-10">
                        <h2 class="font-heading text-lg font-bold text-primary-green uppercase tracking-wide border-b pb-3 mb-6">Send Us a Message</h2>
                        
                        @if(session('success'))
                            <div class="bg-green-50 border-l-4 border-primary-green p-4 rounded-r-lg mb-6">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-primary-green" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm3.707-9.293a1 1 0 0 0-1.414-1.414L9 10.586 7.707 9.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-primary-green">{{ session('success') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                            @csrf
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <x-form-input name="full_name" label="Full Name" required />
                                <x-form-input name="email" type="email" label="Email Address" required />
                            </div>
                            <x-form-input name="phone" label="Phone Number (Optional)" />
                            <x-form-input name="subject" label="Subject" required />
                            <x-form-textarea name="message" label="Your Message" rows="6" required />
                            <div>
                                <x-button type="submit" class="w-full sm:w-auto">
                                    Send Message
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
