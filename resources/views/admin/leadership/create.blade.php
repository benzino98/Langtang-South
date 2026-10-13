<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-heading text-xl font-bold text-gray-900">Add New Leadership Member</h1>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm p-6 sm:p-10">
        <form action="{{ route('admin.leadership.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <x-form-input name="full_name" label="Full Name" required />

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Position / Title</label>
                <select name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-green focus:ring-primary-green sm:text-sm" required>
                    <option value="">Select a position...</option>
                    <option value="Executive Chairman" {{ old('title') == 'Executive Chairman' ? 'selected' : '' }}>Executive Chairman</option>
                    <option value="Vice Chairman" {{ old('title') == 'Vice Chairman' ? 'selected' : '' }}>Vice Chairman</option>
                    <option value="Council Secretary" {{ old('title') == 'Council Secretary' ? 'selected' : '' }}>Council Secretary</option>
                    <option value="Supervisory Councillor" {{ old('title') == 'Supervisory Councillor' ? 'selected' : '' }}>Supervisory Councillor</option>
                </select>
                @error('title')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <x-form-input name="portfolio" label="Portfolio (for Supervisory Councillors)" placeholder="e.g. Education, Health, Works" />

            <x-form-textarea name="biography" label="Biography" rows="8" />

            <x-form-textarea name="welcome_message" label="Welcome Message (Chairman only)" rows="4" />

            <x-form-input name="sort_order" type="number" label="Display Order" value="0" required />

            <div>
                <label for="profile_image" class="block text-sm font-medium text-gray-700">Profile Image</label>
                <div class="mt-1 flex items-center">
                    <input type="file" name="profile_image" id="profile_image" class="w-full">
                </div>
                @error('profile_image')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end space-x-4 pt-6 border-t">
                <a href="{{ route('admin.leadership.index') }}" class="btn-secondary">
                    Cancel
                </a>
                <button type="submit" class="btn-primary">
                    Save Member
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
