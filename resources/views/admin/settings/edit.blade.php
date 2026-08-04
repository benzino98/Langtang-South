<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-heading text-xl font-bold text-gray-900">Website Settings</h1>
    </x-slot>

    <div class="max-w-4xl mx-auto" x-data="{ activeTab: 'general' }">
        <!-- Tabs -->
        <div class="mb-6 border-b border-gray-200">
            <nav class="-mb-px flex space-x-8" aria-label="Settings tabs">
                <button @click="activeTab = 'general'" :class="activeTab === 'general' ? 'border-primary-green text-primary-green' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="py-2 px-1 border-b-2 font-medium text-sm">
                    General
                </button>
                <button @click="activeTab = 'contact'" :class="activeTab === 'contact' ? 'border-primary-green text-primary-green' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="py-2 px-1 border-b-2 font-medium text-sm">
                    Contact
                </button>
                <button @click="activeTab = 'social'" :class="activeTab === 'social' ? 'border-primary-green text-primary-green' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="py-2 px-1 border-b-2 font-medium text-sm">
                    Social
                </button>
            </nav>
        </div>

        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-xl shadow-sm p-6 sm:p-10">
            @csrf
            @method('PUT')

            @foreach (['general', 'contact', 'social'] as $group)
                <div x-show="activeTab === '{{ $group }}'" x-cloak class="space-y-6">
                    @foreach ($settingDefinitions as $key => $definition)
                        @if ($definition['group'] === $group)
                            @php
                                $setting = $settings->get($key);
                                $value = $setting ? $setting->value : '';
                            @endphp

                            @if ($definition['type'] === 'image')
                                <div>
                                    <label for="{{ $key }}" class="block text-sm font-medium text-gray-700">{{ $definition['label'] }}</label>
                                    <div class="mt-1 flex items-center space-x-4">
                                        <input type="file" name="{{ $key }}" id="{{ $key }}" class="w-full">
                                        @if ($value)
                                            <img src="{{ asset('storage/' . $value) }}" alt="{{ $definition['label'] }}" class="w-16 h-16 rounded-lg object-cover">
                                        @endif
                                    </div>
                                </div>
                            @elseif ($definition['type'] === 'text')
                                <x-form-textarea name="{{ $key }}" :label="$definition['label']" rows="4" :value="old($key, $value)" />
                            @else
                                <x-form-input name="{{ $key }}" :label="$definition['label']" :value="old($key, $value)" />
                            @endif
                        @endif
                    @endforeach
                </div>
            @endforeach

            <div class="flex items-center justify-end pt-6 border-t mt-8">
                <button type="submit" class="btn-primary">
                    Save Settings
                </button>
            </div>
        </form>
    </div>

    @push('scripts')
        <style>
            [x-cloak] { display: none !important; }
        </style>
    @endpush
</x-admin-layout>
