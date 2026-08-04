{{--
    Footer Component

    The site-wide footer for the public-facing pages.
    Displays the council's office address, phone number,
    email, office hours, social media links, and copyright notice.
--}}
<footer class="bg-primary-green text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            {{-- Column 1: About --}}
            <div>
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
                        <span class="text-primary-green font-heading font-bold text-lg">L</span>
                    </div>
                    <span class="font-heading font-bold text-lg">Langtang Council</span>
                </div>
                <p class="text-green-100 text-sm leading-relaxed">
                    The official website of Langtang Local Government Council, dedicated to serving
                    the people of Langtang and promoting transparency in governance.
                </p>
            </div>

            {{-- Column 2: Quick Links --}}
            <div>
                <h3 class="font-heading font-semibold text-gold-accent mb-4">Quick Links</h3>
                <ul class="space-y-2 text-sm">
                    <li>
                        <a href="{{ url('/about') }}" class="text-green-100 hover:text-white transition-colors duration-200">
                            About the Council
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/departments') }}" class="text-green-100 hover:text-white transition-colors duration-200">
                            Departments
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/news') }}" class="text-green-100 hover:text-white transition-colors duration-200">
                            News & Updates
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/projects') }}" class="text-green-100 hover:text-white transition-colors duration-200">
                            Projects
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/downloads') }}" class="text-green-100 hover:text-white transition-colors duration-200">
                            Downloads
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/contact') }}" class="text-green-100 hover:text-white transition-colors duration-200">
                            Contact Us
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Column 3: Contact Info --}}
            <div>
                <h3 class="font-heading font-semibold text-gold-accent mb-4">Contact Information</h3>
                <ul class="space-y-3 text-sm">
                    <li class="flex items-start space-x-2">
                        <svg class="w-5 h-5 text-gold-accent flex-shrink-0 mt-0.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                        <span class="text-green-100">Langtang Local Government Secretariat, Langtang, Plateau State, Nigeria</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-gold-accent flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                        </svg>
                        <span class="text-green-100">+234 800 000 0000</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-gold-accent flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                        <span class="text-green-100">info@langtangcouncil.gov.ng</span>
                    </li>
                </ul>
            </div>

            {{-- Column 4: Office Hours --}}
            <div>
                <h3 class="font-heading font-semibold text-gold-accent mb-4">Office Hours</h3>
                <ul class="space-y-2 text-sm text-green-100">
                    <li class="flex justify-between">
                        <span>Monday - Friday</span>
                        <span>8:00 AM - 4:00 PM</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Saturday</span>
                        <span>Closed</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Sunday</span>
                        <span>Closed</span>
                    </li>
                </ul>

                {{-- Social Media Links --}}
                <h3 class="font-heading font-semibold text-gold-accent mt-6 mb-3">Follow Us</h3>
                <div class="flex space-x-3">
                    <a href="#" aria-label="Facebook" class="w-9 h-9 bg-white/10 rounded-full flex items-center justify-center hover:bg-gold-accent transition-colors duration-200">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="#" aria-label="Twitter" class="w-9 h-9 bg-white/10 rounded-full flex items-center justify-center hover:bg-gold-accent transition-colors duration-200">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                    <a href="#" aria-label="Instagram" class="w-9 h-9 bg-white/10 rounded-full flex items-center justify-center hover:bg-gold-accent transition-colors duration-200">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678a6.162 6.162 0 100 12.324 6.162 6.162 0 100-12.324zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405a1.441 1.441 0 11-2.882 0 1.441 1.441 0 012.882 0z"/></svg>
                    </a>
                </div>
            </div>
        </div>

        {{-- Copyright Bar --}}
        <div class="mt-10 pt-6 border-t border-green-700">
            <p class="text-center text-sm text-green-200">
                &copy; {{ date('Y') }} Langtang Local Government Council. All rights reserved.
            </p>
        </div>
    </div>
</footer>
